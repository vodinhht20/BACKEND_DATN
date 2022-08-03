<?php

namespace App\Http\Controllers\Api;

use App\Events\HandleCreateRequest;
use App\Http\Controllers\Controller;
use App\Models\Noti;
use App\Models\Request as ModelsRequest;
use App\Models\RequestDetail;
use App\Repositories\NotifycationRepository;
use App\Repositories\RequestRepository;
use App\Repositories\SingleTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class SingleWordController extends Controller
{
    public function __construct(
        private SingleTypeRepository $singleTypeRepo,
        private RequestRepository $requestRepo,
        private NotifycationRepository $notifycationRepo
        )
    {

    }

    public function getListSingleType(){
        $singleType = $this->singleTypeRepo->getPublicSingleType();
        return response()->json([
            "status" => "200",
            "payload" => $singleType,
        ]);
    }

    public function getListSingleTypeId($id){
        $singleType = $this->singleTypeRepo->getPublicSingleTypeOne($id);
        return response()->json([
            "status" => "200",
            "payload" => $singleType,
        ]);
    }

    public function GetApprover(Request $request, $id){
        $employee = JWTAuth::toUser($request->access_token);
        $approver = $this->singleTypeRepo->getInforEmployeeById($employee, $id);
        return response()->json([
            "status" => "200",
            "payload" => $approver,
        ]);
    }

    public function requestsAdd(Request $request)
    {
        $employee = JWTAuth::toUser($request->access_token);
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'lydo' => 'required',
            'id' => 'required',
        ],[
            'date.required' => 'Ngày nghỉ không được để trống',
            'lydo.required' => 'Lý do không được để trống',
            'id.required' => 'Không lấy được loại đơn',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->messages()->first()
            ], 403);
        }

        try {
            DB::beginTransaction();
            $ModelRequest = new ModelsRequest();
            $Request_detail = new RequestDetail();

            $Request_detail->fill([
                'content' => $request->lydo,
                'quit_work_from_at' => $request->date[0],
                'quit_work_to_at' => $request->date[1]
            ])->save();

            $ModelRequest->fill([
                'employee_id' => $employee->id,
                'single_type_id' => $request->id,
                'request_detail_id' => $Request_detail->id,
            ])->save();
            DB::commit();

            // Gửi thông báo cho các bộ phận duyệt
            $requestApproves = $this->requestRepo->getApprover($ModelRequest);
            $employeeIds = $requestApproves->pluck('id')->toArray();
            $requestName = $ModelRequest->singleType->name;
            $fcmTokens = $requestApproves->pluck('fcm_token')->toArray();
            $options = [
                "title" => "Bạn có đơn cần phê duyệt",
                "employee_ids" => $employeeIds,
                "content" => "Nhân viên $employee->fullname vừa tạo đơn $requestName",
                "request_domain" => config('notification.domain.BE'),
                "request_type" => config('notification.type.personal'),
                "link" => "/admin/application/request-detail/$ModelRequest->id",
                "fcm_tokens" => $fcmTokens
            ];
            $result = $this->notifycationRepo->pushNotifications($options);
            event(new HandleCreateRequest($options));
            if (!$result) {
                $message = "Không thể gửi noti cho người cần duyệt - mã đơn ($ModelRequest->id)";
                \Log::error($message);
                Noti::telegramLog('Tạo gửi noti thất bại ', $message);
            }

            return response()->json([
                'error_code' => 'success',
                'message' => 'gửi đơn thành công!',
            ], 200);

        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Tạo đơn lỗi ', $message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $e->getMessage()
            ], 442);
        }
    }
}
