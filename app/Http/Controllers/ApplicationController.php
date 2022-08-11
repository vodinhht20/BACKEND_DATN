<?php

namespace App\Http\Controllers;

use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use App\Repositories\SingleTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use App\Repositories\RequestRepository;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use App\Models\Request as ModelRequest;
use App\Repositories\EmployeeLeavePermissionRepository;
use App\Repositories\NotifycationRepository;
use App\Repositories\TimekeepRepository;
use App\Service\TimesheetService;
use Illuminate\Support\Facades\Notification;


class ApplicationController extends Controller
{
    public function __construct(
        private SingleTypeRepository $singleTypeRepo,
        private EmployeeRepository $employeeRepo,
        private RequestRepository $requestRepo,
        private TimesheetService $timesheetService,
        private EmployeeLeavePermissionRepository $employeeLeavePermissionRepo,
        private NotifycationRepository $notifycationRepo,
        private TimekeepRepository $timekeepRepo
    )
    {
        //
    }

    public function index(Request $request)
    {
        $take = 8;
        $statusPending  = array(config('request.status.processing'), config('request.status.leader_accepted'));
        $statusAccepted = array(config('request.status.accepted'), config('request.status.leader_accepted'));
        $statusUnapproved = config('request.status.unapproved');
        $options = [
            'with' => [
                'employee' => function($query) {
                    $query->select('fullname', 'id', 'position_id');
                },
                'singleType' => function ($query) {
                    $query->select('id', 'required_leader', 'type', 'name');
                },
                'singleType.approvers.employee' => function($query) {
                    $query->select('fullname', 'id', 'type_avatar', 'avatar');
                },
                'employee.position.department',
                'requestDetail',
            ],
            'approver_employee' => Auth::user()
        ];
        $requestProcess = $this->requestRepo->formatDataPaginate($take, [...$options, 'statues' => $statusPending, 'need_browser' => true]);
        $requestAccepted = $this->requestRepo->formatDataPaginate($take, [...$options, 'statues' => $statusAccepted, 'accepted' => true]);
        $requestUnapproved = $this->requestRepo->formatDataPaginate($take, [...$options, 'status' => $statusUnapproved]);
        return view('admin.application.request.request', compact('requestProcess', 'requestUnapproved', 'requestAccepted'));
    }

    public function responseRequestData(Request $request): JsonResponse
    {
        $take = 8;
        $options = [
            'with' => [
                'employee' => function($query) {
                    $query->select('fullname', 'id', 'position_id');
                },
                'singleType' => function ($query) {
                    $query->select('id', 'required_leader', 'type');
                },
                'singleType.approvers.employee' => function($query) {
                    $query->select('fullname', 'id', 'type_avatar', 'avatar');
                },
                'employee.position.department',
                'requestDetail',
            ],
            'approver_employee' => Auth::user()
        ];
        $requestProcess = $this->requestRepo->formatDataPaginate($take, $options);
        return response()->json([
            "processing" => $requestProcess
        ]);
    }

    public function requestDetail(Request $request, $requestId) {

        $requestData = ModelRequest::find($requestId);
        $approvers = $this->requestRepo->getApprover($requestData);
        if (!$requestData) {
            abort(404);
        }
        $requestDetail = $requestData->requestDetail;
        $quitWorkFromAt = Carbon::parse($requestDetail->quit_work_from_at);
        $quitWorkToAt = Carbon::parse($requestDetail->quit_work_to_at);
        $canViewApprover = false;
        $currentAdmin = Auth::user();
        $canViewApprover = $this->requestRepo->canViewApproverRequest($requestData, $currentAdmin, $approvers);
        $leaveDay = $this->timesheetService->getDifferentDay($quitWorkFromAt, $quitWorkToAt);

        $requestType = $requestData?->singleType?->type;
        if ($requestType == config('singletype.type.leave_work')) {
            return view('admin.application.request.detail-leave-work', compact('requestData', 'requestId', 'approvers', 'leaveDay', 'canViewApprover'));
        } else if ($requestType == config('singletype.type.edit_work')) {
            $options = [
                "date" => $requestDetail->quit_work_to_at->format("Y-m-d"),
                "employee_id" => $requestData->employee_id
            ];
            $checkinOld = null;
            $checkoutOld = null;
            $timekeep = $this->timekeepRepo->query($options)->first();
            if ($timekeep) {
                $checkinOld = Carbon::parse($timekeep->timekeepDetail()->min('checkin_at'))?->format("H:i");
                $checkoutOld = Carbon::parse($timekeep->timekeepDetail()->min('checkin_at'))?->format("H:i");
            }
            return view('admin.application.request.detail-edit-work', compact('requestData', 'requestId', 'approvers', 'leaveDay', 'canViewApprover', 'timekeep', 'checkinOld', 'checkoutOld'));
        } else if ($requestType == config('singletype.type.ot')) {
            return view('admin.application.request.detail-ot', compact('requestData', 'requestId', 'approvers', 'leaveDay', 'canViewApprover'));
        }
        abort(404);
    }

    public function nestView()
    {
        $options = [
            'with' => 'approvers.employee'
        ];
        $take = 10;
        $singleTypes = $this->singleTypeRepo->query($options)->paginate($take);
        return view('admin.application.singleType.viewnest', compact('singleTypes'));
    }

    public function createSingleType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(config('singletype.type'))
            ],
            'employee_id' => 'required|array',
            'regulation' => 'required',
            'description' => 'required',
        ], [
            'name.required' => 'Tên loại đơn không được để trống',
            'name.max' => 'Tên loại loại đơn quá dài',
            'type.required' => 'Loại mẫu đơn không được để trống',
            'type.in' => 'Không xác định được mẫu đơn này',
            'employee_id.required' => 'Người duyệt đơn không được để trống',
            'employee_id.array' => 'Định dạng không hợp lệ',
            'regulation.required' => 'Quy trình duyệt đơn không được để trống',
            'description.required' => 'Mô tả không được để trống'
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $options = $request->all();

        if ($request->required_leader) {
            $options['required_leader'] = $request->required_leader;
        } else {
            unset($options['required_leader']);
        }

        try {
            DB::beginTransaction();
            $result = $this->singleTypeRepo->createWithApprover($options);
            DB::commit();
            return redirect()->route('application-nest-view')->with('message.success', 'Thêm loại đơn thành công')->with('id_new', $result->id);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Create Single Type', $message);
            return redirect()->back()->with('message.error', 'Thêm thất bại vui lòng liên hệ quản trị viên !')->withInput();
        }
    }

    public function showFormCreateSingleType(Request $request)
    {
        $rootDepartmentId = config('department.root.hr');
        $employees = $this->employeeRepo->getEmployeeByDepartmentIds(array($rootDepartmentId));

        return view('admin.application.singleType.nestCreate', compact('employees'));
    }

    public function changeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => Rule::in(config('singletype.status')),
        ], [
            'id.required' => 'Không tìm thấy loại đơn này',
            'status.in' => 'Trạng thái không hợp lệ',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }

        $result = $this->singleTypeRepo->changeStatus($request->id, $request->status);
        if ($result) {
            return response()->json([
                'success' => true
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Cập nhật trạng thái thất bại'
        ], 404);
    }

    public function ajaxAcceptRequest(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
            'status' => ['required', Rule::in(config('request_approve_history.status'))]
        ], [
            "id.require" => "Không tìm thấy loại đơn này",
            "status.require" => "Trạng thái không được để trống",
            "status.in" => "Trạng thái không đơn không hợp lệ"
        ]);

        if ($validator->fails()) {
            return response()->json([
                "status" => "validate_failed",
                "message" => $validator->messages()->first()
            ], 442);
        }

        $modelRequest = $this->requestRepo->find($request->id);
        $currentAdmin = Auth::user();
        if (!$modelRequest) {
            return response()->json([
                "status" => "failed",
                "message" => "Không tìm thấy đơn này"
            ], 442);
        }
        DB::beginTransaction();
        try {
            $data = [
                'status' => $request->status,
                'employee_id' => $currentAdmin->id
            ];
            $result = $this->requestRepo->handleApprove($data, $modelRequest);
            if ($result) {
                if ($result->status == config('request.status.accepted')) {
                    // Lưu thông tin cho đơn nghỉ phép
                    $this->employeeLeavePermissionRepo->enforcementRequest($result);
                }

                // Gửi thông báo
                $content = $result->singleType->name . " của bạn đã được duyệt bởi " . $currentAdmin->fullname;
                $options = [
                    'title' => "Đơn của bạn đã được phê duyệt",
                    'content' => $content,
                    'request_domain' => config('notification.domain.FE'),
                    'request_type' => config('notification.type.personal'),
                    'employee_ids' => array($result->employee_id),
                    'link' => '/more/don-tu-cua-ban',
                ];
                $this->notifycationRepo->pushNotifications($options);

                // Gửi realtime
                $fcmTokens = array($result->employee->fcm_token ?? null);
                $dataNoti = json_encode(["title" => $options['title'], "content" => $options['content']]);
                Notification::send(null, new \App\Notifications\SendPushNotification("noti_request_done", $dataNoti, $fcmTokens));

                DB::commit();
                return response()->json([
                    "status" => "success",
                    "message" => "Đã duyệt đơn thành công"
                ]);
            }
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Approver Request', $message);
        }

        return response()->json([
            "status" => "failed",
            "message" => "Không thể duyệt đơn vào lúc này !"
        ], 442);
    }
}
