<?php
namespace App\Repositories;

use App\Models\Employee;
use App\Repositories\BaseRepository;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Collection;

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
                $approverInfos = $item?->singleType?->approvers?->pluck('employee') ?: collect();
                $item = collect($item);

                if (isset($item['single_type']['required_leader']) && $item['single_type']['required_leader']) {
                    $departmentId = $item['employee']['position']['department_id'] ?? null;
                    $leader = $departmentWithLeader[$departmentId]['employee'] ?? null;
                    if ($leader) {
                        $approverInfos[] = $leader;
                    }
                }

                if (isset($item['single_type'])) {
                    $item->put('type', $item['single_type']['type']);
                }

                // format avatar
                $approverInfos = $approverInfos->unique('id')->map(function ($record) {
                    $avatar = $record->getAvatar();
                    $record = collect($record);
                    $record->put('avatar', $avatar);
                    return $record;
                });
                $item->put('approvers', $approverInfos);
                $item->forget('single_type');
                return $item;
            });
        $requestProcess->setCollection($dataPaginate);
        return $requestProcess;
    }
}
