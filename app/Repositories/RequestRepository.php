<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Models\Noti;
use App\Models\Request;
use App\Models\RequestApproveHistories;
use App\Repositories\BaseRepository;
use Carbon\Carbon;
use Exception;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class RequestRepository extends BaseRepository
{
    public function getModel()
    {
        return \App\Models\Request::class;
    }

    /**
     *
     * @param array $options
     * @return Builder
     */
    public function query(array $options = []): Builder
    {
        $modelRequest = $this->model->query();

        if (isset($options['with'])) {
            $modelRequest->with($options['with']);
        }

        if (isset($options['statues'])) {
            $modelRequest->whereIn('status', $options['statues']);
        }

        if (isset($options['status'])) {
            $modelRequest->where('status', $options['status']);
        }

        // Hiển thị những đơn mà mình có quyền duyệt
        if (isset($options['approver_employee'])) {
            $modelRequest->where(function($query) use($options) {
                // Cho phép những người được duyệt có thể xem
                $query->whereHas('singleType', function($singleTypeQuery) use($options) {
                    $singleTypeQuery->whereHas('approvers', function ($approverQuery) use($options) {
                        $approverQuery->where('employee_id', $options['approver_employee']->id);
                    });
                });
                // Cho phép leader có thể xem
                $query->orWhere(function ($subQuery) use($options){
                    $subQuery->orWhereHas('employee', function($employeeQuery) use($options) {
                        $employeeQuery->whereHas('position', function($positionQuery) use($options) {
                            $positionQuery->whereHas('department', function($departmentQuery) use($options) {
                                $position = $options['approver_employee']?->position;
                                if ($position && $position->is_leader == config('position.is_leader.yes')) {
                                    $departmentQuery->where('id', $position?->department?->id);
                                } else {
                                    $departmentQuery->whereRaw('1 = 0');
                                }
                            });
                        });
                    });
                    $subQuery->whereHas('singleType.approvers');
                });
            });
        }
        return $modelRequest->orderBy('id', 'desc');
    }

    /**
     *
     * @param integer $take
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function paginate(int $take = 10, array $options = []): LengthAwarePaginator
    {
        return $this->query($options)->paginate($take);
    }


    /**
     * Hàm format data kết hợp phân trang
     *
     * @param integer $take
     * @param array $options
     * @return LengthAwarePaginator
     */
    public function formatDataPaginate(int $take = 10, array $options = []): LengthAwarePaginator
    {
        $departmentRepo = app(DepartmentRepository::class);
        $requestProcess = $this->paginate($take, $options);

        // Lấy ra danh sách các phòng ban và leader của phòng ban đó
        $departmentIds = $requestProcess->pluck('employee.position.department_id')->unique()->toArray();
        $departmentWithLeader = $departmentRepo->getDepartmentWithLeader($departmentIds);

        // Format data paginate
        $dataPaginate = $requestProcess->map(function ($item) use($departmentWithLeader) {
                $approverInfos = $this->getApprover($item, $departmentWithLeader);
                $getStatusStr = $item->getStatusStr();
                $renderClassNameByStatus = $item->renderClassNameByStatus();
                $item = collect($item);
                if (isset($item['single_type'])) {
                    $item->put('type', $item['single_type']['type']);
                }
                $item->put('getStatusStr', $getStatusStr);
                $item->put('class_status', $renderClassNameByStatus);
                $item->put('approvers', $approverInfos);
                $item->forget('single_type');
                return $item;
        });
        $requestProcess->setCollection($dataPaginate);
        return $requestProcess;
    }

    /**
     * Hàm lấy ra danh sách người phê duyệt của đơn từ
     *
     * @param Request $request
     * @param Collection|null $departmentWithLeader
     * @return Collection
     */
    public function getApprover(Request $request, Collection $departmentWithLeader = null): Collection
    {
        $departmentRepo = app(DepartmentRepository::class);
        $approverInfos = $request?->singleType?->approvers?->pluck('employee') ?: collect();
        $requiredLeader = $request?->singleType?->required_leader;
        if ($requiredLeader) {
            $departmentId = $request?->employee?->position?->department_id;
            if ($departmentWithLeader) {
                $leader = $departmentWithLeader[$departmentId]['employee'] ?? null;
            } else {
                $departmentWithLeader = $departmentRepo->getDepartmentWithLeader(array($departmentId));
                $leader = $departmentWithLeader[$departmentId]['employee'] ?? null;
            }
            if ($leader) {
                $leader->is_leader = true;
                $approverInfos[] = $leader;
            }
        }

        return $approverInfos = $approverInfos->unique('id')->map(function ($record) {
            $avatar = $record->getAvatar();
            $record = collect($record);
            $record->put('avatar', $avatar);
            return $record;
        });
    }

    /**
     * Hàm duyệt đơn từ
     *
     * @param array $data
     * @return Request
     */
    public function handleApprove(array $data, Request $request)
    {
        try {
            DB::beginTransaction();
            $requestApproveHistory = new RequestApproveHistories;
            $requestApproveHistory->employee_id = $data['employee_id'];
            $requestApproveHistory->request_id = $request->id;

            if ($data['status'] == config('request_approve_history.status.accepted')) {
                $requiredLeader = $request->singleType->required_leader;
                $requestStatusOld = $request->status;
                // khiểm tra xem đơn này có cho phép leader duyệt không
                if ($requiredLeader) {
                    if ($requestStatusOld == config('request.status.processing')) {
                        $request->status = config('request.status.leader_accepted');
                    } else if ($requestStatusOld == config('request.status.leader_accepted')) {
                        $request->status = config('request.status.accepted');
                    }
                } else {
                    $request->status = config('request.status.accepted');
                }
                $requestApproveHistory->status = $data['status'];
            } else if ($data['status'] == config('request_approve_history.status.unapproved')) {
                $requestApproveHistory->status = $data['status'];
                $requestApproveHistory->reason = $data['reason'];
                $request->status = config("request.status.unapproved");
            }

            if ($request->save() && $requestApproveHistory->save()) {
                DB::commit();
                return $request;
            }
            throw new Exception("Duyệt đơn thất bại");
        } catch (Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Approve Request', $message);
            return;
        }
    }

    /**
     * Cho phép duyệt đơn
     *
     * @param Request $request
     * @param Employee $employee admin hiện tại đang login
     * @param Collection $approvers danh sách người duyệt đơn
     * @return boolean
     */
    public function canViewApproverRequest(Request $request, Employee $employee, Collection $approvers): bool
    {
        $canViewApprover = false;

        if ($request->status == config('request.status.processing')) {
            if ($request->singleType->required_leader) {
                $leaderAccepted = $approvers->where('id', $employee->id)->where('is_leader', true)->first();
                if ($leaderAccepted) $canViewApprover = true;
            }
        } else if ($request->status == config('request.status.leader_accepted')) {
            $approverIds = $approvers->pluck('id')->toArray();
            if (in_array($employee->id, $approverIds)) {
                $canViewApprover = true;
                if ($request->status == config('request.status.leader_accepted')) {
                    $leaderAccepted = $approvers->where('id', $employee->id)->where('is_leader', true)->first();
                    if ($leaderAccepted) $canViewApprover = false;
                }
            }
        }

        return $canViewApprover;
    }
}
