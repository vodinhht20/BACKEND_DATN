<?php

namespace App\Http\Controllers;

use App\Imports\EmployeeImport;
use App\Imports\TimekeepImport;
use App\Models\AttribuiteEmployee;
use App\Models\Branch;
use App\Models\Attribute;
use App\Models\Employee;
use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use App\Models\Position;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use App\Service\EmployeeService;
use Google\Service\ServiceControl\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class EmployeeController extends Controller
{
    const TAKE = 10;

    public function __construct(
        private EmployeeRepository $employeeRepo,
        private DepartmentRepository $departmentRepo,
        private PositionRepository $positionRepo,
        private EmployeeService $employeeService
    )
    {
        //
    }

    public function index(Request $request)
    {
        $requestDepartments = explode(",", $request->departments);
        $departmentIds = [];
        $positionIds = [];
        $requestDepartments = array_filter($requestDepartments, function($e) {
            return (($e != "") || ($e != null));
        });
        foreach ($requestDepartments as $requestKey) {
            $regex = "/^position_+[0-9]*$/"; // định dạng phù hơp:  position_12
            if (preg_match($regex, $requestKey)) {
                $positionIds[] = trim($requestKey, "position_");
            }
        }
        if ($request->status) {
            $status = $request->status;
        } else {
            $status = config('employee.status');
            unset($status['block']);
        }

        $options = [...$request->all(),
            "with" => ['position.department'],
            "position_ids" => $positionIds,
            "status" => $status
        ];

        $employees = $this->employeeRepo
            ->paginate($options, self::TAKE)
            ->appends($request->query());
        $this->formatData($employees);
        $branchs = Branch::all();
        $departments = $this->departmentRepo->formatVueSelect();
        return view('admin.user.list', compact('employees', 'branchs', 'departments', 'requestDepartments'));
    }

    public function dataReponse(Request $request)
    {
        $requestDepartments = explode(",", $request->departments);
        $positionIds = [];
        foreach ($requestDepartments as $requestKey) {
            $regex = "/^position_+[0-9]*$/"; // định dạng phù hơp:  position_12
            if (preg_match($regex, $requestKey)) {
                $positionIds[] = trim($requestKey, "position_");
            }
        }
        if ($request->status) {
            $status = $request->status;
        } else {
            $status = config('employee.status');
            unset($status['block']);
        }
        $options = [...$request->all(),
            "with" => ['position.department'],
            "position_ids" => $positionIds,
            "status" => $status
        ];

        $employees = $this->employeeRepo
            ->paginate($options, self::TAKE)
            ->appends($request->query());
        $this->formatData($employees);

        return response()->json([
            'data' => $employees
        ]);
    }

    public function confirmEmail(Request $request)
    {
        $result = $this->employeeRepo->confirmEmail($request->id);

        if ($result) {
            $employees = $this->employeeRepo->getAllUserByPublic()->withPath($request->pathname);
            $pages = $employees->total()/10;
            $dataView = view('admin.user._partials.base_table', compact('employees','pages'))->render();
            return response()->json([
                "success" => true,
                "data" => $dataView
            ], 200);
        }
        return response()->json([
            "success" => false,
            "message" => "Không thể xác thực email"
        ], 442);
    }

    public function changePasssword(Request $request)
    {
        if (!($request->password && $request->id)) {
            return response()->json([
                "success" => false,
                "message" => "Vui lòng nhập đầy đủ các trường"
            ], 404);
        }
        $result = $this->employeeRepo->changePasssword($request->password, $request->id);
        if ($result) {
            return response()->json([
                "success" => true,
                "data" => $result,
            ], 200);
        }
        return response()->json([
            "success" => false,
            "message" => "Không thể thay đổi password cho thành viên này !"
        ], 442);
    }

    public function showFormCreate()
    {
        $branchs = Branch::all();
        $positions = Position::all();
        $attributes = Attribute::all();
        $departments = $this->departmentRepo->formatVueSelect();
        return view('admin.user.create', compact('branchs', 'positions', 'attributes', 'departments'));
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'birth_day' => 'required|date',
            'phone' => 'required',
            'is_checked' => 'required',
            'branch_id' => 'required',
            'address' => 'required',
            'atribute' => 'required|array',
        ], [
            'fullname.required' => 'Họ và Tên không được để trống',
            'fullname.max' => 'Họ và Tên không được quá 255 ký tự',
            'personal_email.required' => "Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập",
            'personal_email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'is_checked.required' => 'Trạng thái điểm danh không được trống',
            'branch_id.required' => 'Chi nhánh không được để trống',
            'address.required' => 'Địa chỉ hiện tại không được để trống',
            'atribute.required' => 'Thông tin thêm bị thiếu',
            'atribute.array' => 'Thông tin thêm không đúng kiểu dữ liệu',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }

        $passWord = Str::random(12);
        $option = [
            'fullname' => $request->fullname,
            'personal_email' => $request->personal_email,
            'password' => $passWord,
            'status' => config('employee.status.upcoming'),
            'gender' => $request->gender,
            'branch_id' => $request->branch_id,
            'position_id' => ltrim($request->position, 'position_'),
            'is_checked' => $request->is_checked,
            'address' => $request->address,
            'email_verified_at' => now(),
        ];

        if (isset($request->birth_day)) {
            $option['birth_day'] = $request->birth_day;
        }

        if (isset($request->phone)) {
            $option['phone'] = $request->phone;
        }

        if (isset($request->note)) {
            $option['note'] = $request->note;
        }

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $option['avatar'] = $urlImage;
            $option['type_avatar'] = 1;
        }

        // make email
        $employeeCode = $this->employeeService->makeEmployeeCode();
        $prefix = "$employeeCode@camel.vn";
        $email = makeEmail($request->fullname, $prefix);
        $option['email'] = $email;
        $option['employee_code'] = $employeeCode;

        DB::beginTransaction();
        try {
            $employee = $this->employeeRepo->register($option);
            $requestAttributes = $request->atribute;
            $attributes = Attribute::whereIn('name', array_keys($requestAttributes))->get()->keyBy('name');
            foreach ($requestAttributes as $attribute => $value) {
                if (empty($value)) {
                    continue;
                }

                if (isset($attributes[$attribute])) {
                    $attribute = $attributes[$attribute];
                    $dataAtribute = [
                        'attribute_id' => $attribute->id,
                        'employee_id' => $employee->id,
                        'data' => $value,
                        'raw_data' => $value
                    ];
                    AttribuiteEmployee::create($dataAtribute);
                }
            }

            if ($employee) {
                DB::commit();
                return response()->json([
                    'success' => true,
                    'data' => [
                        'email' => $employee->email,
                        'password' => $passWord
                    ]
                ], 200);
            }
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            Noti::telegramLog('Create Employee', $message);
        }
        DB::rollBack();

        return response()->json([
            'success' => false,
            'message' => "Không thể tạo mới thành viên"
        ], 422);
    }

    public function showFormUpdate($id)
    {
        $employee = Employee::with('branch', 'position', 'attributes')->find($id);
        $branchs = Branch::all();
        $positions = Position::all();
        $departments = $this->departmentRepo->formatVueSelect();
        $attributes = Attribute::all();
        $attributeEmployees = AttribuiteEmployee::with('attribute')->where('employee_id', $id)->get()->keyBy('attribute_id');
        if (!$employee) {
            return abort(404);
        }

        return view('admin.user.update', compact('employee', 'branchs', 'positions', 'attributeEmployees', 'departments', 'attributes'));
    }



    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'birth_day' => 'required|date',
            'phone' => 'required',
            'is_checked' => 'required',
            'branch_id' => 'required',
            'address' => 'required',
            'atribute' => 'required|array',
        ], [
            'fullname.required' => 'Họ và Tên không được để trống',
            'fullname.max' => 'Họ và Tên không được quá 255 ký tự',
            'personal_email.required' => "Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập",
            'personal_email.email' => 'Email không đúng định dạng',
            'phone.required' => 'Số điện thoại không được để trống',
            'is_checked.required' => 'Trạng thái điểm danh không được trống',
            'branch_id.required' => 'Chi nhánh không được để trống',
            'address.required' => 'Địa chỉ hiện tại không được để trống',
            'atribute.required' => 'Thông tin thêm bị thiếu',
            'atribute.array' => 'Thông tin thêm không đúng kiểu dữ liệu',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $employee = Employee::find($id);
        if (!$employee) {
            return abort(404);
        }

        $option = [
            'fullname' => $request->fullname,
            'personal_email' => $request->personal_email,
            'gender' => $request->gender,
            'branch_id' => $request->branch_id,
            'position_id' => ltrim($request->position, 'position_'),
            'is_checked' => $request->is_checked,
            'address' => $request->address
        ];
        if (isset($request->birth_day)) {
            $option['birth_day'] = $request->birth_day;
        }

        if (isset($request->phone)) {
            $option['phone'] = $request->phone;
        }

        if (isset($request->note)) {
            $option['note'] = $request->note;
        }

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $option['avatar'] = $urlImage;
            $option['type_avatar'] = 1;
        }

        DB::beginTransaction();
        try {
            $employee->update($option);
            $requestAttributes = $request->atribute;
            $attributes = Attribute::whereIn('name', array_keys($requestAttributes))->get()->keyBy('name');
            foreach ($requestAttributes as $attribute => $value) {
                if (empty($value)) {
                    continue;
                }
                if (isset($attributes[$attribute])) {
                    $attribute = $attributes[$attribute];
                    $attributeEmployee = AttribuiteEmployee::where('employee_id', $employee->id)
                        ->where('attribute_id', $attribute->id)
                        ->first();
                    $dataAtribute = [
                        'attribute_id' => $attribute->id,
                        'employee_id' => $employee->id,
                        'data' => $value,
                        'raw_data' => $value
                    ];
                    if ($attributeEmployee) {
                        $attributeEmployee->update($dataAtribute);
                    } else {
                        AttribuiteEmployee::create($dataAtribute);
                    }
                }
            }

            if ($employee) {
                DB::commit();
                return redirect()->route('admin-list-user')->with('message.success', 'Cập nhật thông tin thành viên thành công !');
            }
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            Noti::telegramLog('Update Employee', $message);
        }
        DB::rollBack();

        return redirect()->back()->with('message.error', 'Cập nhật thông tin thành viên thất bại')->withInput();
    }

    public function showInfoUser($id)
    {
        $employee = Employee::with('position', 'branch')->find($id);
        $attributes = AttribuiteEmployee::with('attribute')->where('employee_id', $id)->get();
        if (!$employee) {
            return abort(404);
        }

        return view('admin.user.show', compact('employee', 'attributes'));
    }

    public function ajaxRemove(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Không tìm được thành viên cần xóa vì thiếu ID',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }

        $result = $this->employeeRepo->delete($request->id);
        if ($result) {
            $employees = $this->employeeRepo->getAllUserByPublic();
            $viewData = view('admin.user._partials.base_table', compact('employees'))->render();
            return response()->json([
                'data' => $viewData,
                'success' => true
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không thế xóa thành viên này'
        ], 404);
    }

    public function ajaxBlock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
        ], [
            'employee_id.required' => 'Không tìm được thành viên cần chặn vì thiếu ID',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }
        $result = $this->employeeRepo->blockUser($request->employee_id);
        if ($result) {
            return $this->dataReponse($request);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không thế chặn thành viên này'
        ], 404);
    }

    public function ajaxChangeStatus(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'employee_id' => 'required',
            'status' => 'required',
        ], [
            'employee_id.required' => 'Không tìm được thành viên cần chặn vì thiếu ID',
            'status.required' => 'Không tìm thấy trạng thái này',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 422);
        }

        $result = $this->employeeRepo->changeStatus($request->status, $request->employee_id);
        if ($result) {
            return response()->json([
                'success' => true,
                'data' => [
                    'id' => $result->id,
                    'status' => $result->status,
                    'status_str' => $result->getStatusStr()
                ]
            ], 200);
        }
        return response()->json([
            'success' => false,
            'message' => "Không thể thay đổi trạng thái vào lúc này"
        ], 422);
    }

    public function handleImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'file' => 'required|mimes:xlsx|max:10000',
        ], [
            'date.required' => 'Vui lòng lựa chọn ngày',
            'file.required' => 'Vui lòng chọn file',
            'file.mimes' => 'Định dạng file không hợp lệ',
            'file.max' => 'Dung lượng file không quá 10MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 422);
        }
        DB::beginTransaction();
        try {
            $import = new EmployeeImport();
            Excel::import($import, $request->file('file'));
            $dataImports = $import->dataImport;
            $dataValidate = $import->validateFile;
            if ($dataValidate) {
                return response()->json([
                    'status' => 'failed',
                    'messages' => $dataValidate
                ], 422);
            }
            $this->employeeRepo->insertMutiple($dataImports);
            DB::commit();
            return response()->json([
                "status" => "success",
                "message" => "Import data thành công !"
            ]);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            DB::rollBack();
            Noti::telegramLog('Import Employee', $message);
            return response()->json([
                'error_code' => 'exception_error',
                'message' => $e->getMessage()
            ], 442);
        }
    }
    public function blackList()
    {
        $employees = $this->employeeRepo->getUserBlock();
        return view('admin.user.black_list', compact('employees'));
    }

    public function ajaxUnBlock(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'id' => 'required',
        ], [
            'id.required' => 'Không thể bỏ chặn thành viên vì thiếu ID',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }

        $result = $this->employeeRepo->unBlockUser($request->id);
        if ($result) {
            $employees = $this->employeeRepo->getUserBlock();
            $viewData = view('admin.user._partials.black_table', compact('employees'))->render();
            return response()->json([
                'data' => $viewData,
                'success' => true
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không thế bỏ chặn thành viên này'
        ], 404);
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/avatars');
        return substr($path, strlen('public/'));
    }

    private function formatData(&$employees)
    {
        $dataFormat = $employees->map(function($employee) {
            $employee->avatar = $employee->getAvatar();
            $employee->status_str = $employee->getStatusStr();
            return $employee;
        });
        $employees->setCollection($dataFormat);
    }
}
