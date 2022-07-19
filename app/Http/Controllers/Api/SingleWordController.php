<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noti;
use App\Models\Request as ModelsRequest;
use App\Models\Request_detail;
use App\Repositories\SingleTypeRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class SingleWordController extends Controller
{
    public function __construct(private SingleTypeRepository $singleTypeRepo)
    {
        $this->singleTypeRepo = $singleTypeRepo;
    }

    public function getListSingleType(){
        $singleType = $this->singleTypeRepo->getPublicSingleType();
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
            $Request_detail = new Request_detail();

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

        return response()->json([
            'error_code' => 'success',
            'message' => 'gửi đơn thành công!',
        ], 200);
    }
}
