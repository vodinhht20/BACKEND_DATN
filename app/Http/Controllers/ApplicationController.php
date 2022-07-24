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

class ApplicationController extends Controller
{
    public function __construct(
        private SingleTypeRepository $singleTypeRepo,
        private EmployeeRepository $employeeRepo,
        private RequestRepository $requestRepo
    )
    {
        //
    }

    public function index(Request $request)
    {
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
        $requestProcess = $this->requestRepo->formatDataPaginate(2, $options);
        return view('admin.application.request', compact('requestProcess'));
    }

    public function responseRequestData(Request $request): JsonResponse
    {
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
        $requestProcess = $this->requestRepo->formatDataPaginate(2, $options);
        return response()->json([
            "processing" => $requestProcess
        ]);
    }

    public function requestDetail(Request $request, $requestId) {
        return view('admin.application.request.request-detail');
    }

    public function nestView()
    {
        $options = [
            'with' => 'approvers.employee'
        ];
        $take = 10;
        $singleTypes = $this->singleTypeRepo->query($options)->paginate($take);
        return view('admin.application.viewnest', compact('singleTypes'));
    }

    public function createSingleType(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'type' => [
                'required',
                Rule::in(array_keys(config('singletype.type')))
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

        return view('admin.application.nestCreate', compact('employees'));
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
}
