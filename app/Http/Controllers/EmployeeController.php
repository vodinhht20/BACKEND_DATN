<?php

namespace App\Http\Controllers;

use App\Models\AttribuiteEmployee;
use App\Models\Branch;
use App\Models\Attribute;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use App\Models\Position;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use Google\Service\ServiceControl\Auth;
use Illuminate\Support\Facades\Validator;

class EmployeeController extends Controller
{
    public function __construct(
        private EmployeeRepository $employeeRepo,
        private DepartmentRepository $departmentRepo,
        private PositionRepository $positionRepo
    )
    {
        //
    }

    public function index(Request $request)
    {
        $take = 5;
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
            } else {
                $departmentIds[] = $requestKey;
            }
        }
        $positionIdsByDepartments = $this->positionRepo->query(["department_ids" => $departmentIds])->pluck('id')->toArray();
        $positionIds = array_merge($positionIdsByDepartments, $positionIds);
        $options = [...$request->all(),
            "with" => ['position.department'],
            "position_ids" => $positionIds
        ];
        if ($request->departments && count($positionIds) == 0) {
            $options['position_ids'] = array(-9999);
        }
        $employees = $this->employeeRepo
            ->paginate($options, $take)
            ->appends($request->query());
        $this->formatData($employees);
        $branchs = Branch::all();
        $departments = $this->departmentRepo->formatVueSelect();
        return view('admin.user.list', compact('employees', 'branchs', 'departments', 'requestDepartments'));
    }

    public function dataReponse(Request $request)
    {
        $take = 5;
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
            } else {
                $departmentIds[] = $requestKey;
            }
        }
        $positionIdsByDepartments = $this->positionRepo->query(["department_ids" => $departmentIds])->pluck('id')->toArray();
        $positionIds = array_merge($positionIdsByDepartments, $positionIds);
        $options = [...$request->all(),
            "with" => ['position.department'],
            "position_ids" => $positionIds
        ];
        if ($request->departments && count($positionIds) == 0) {
            $options['position_ids'] = array(-9999);
        }
        $employees = $this->employeeRepo
            ->paginate($options, $take)
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
        return view('admin.user.create', compact('branchs','positions','attributes'));
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'birth_day' => 'required|date',
        ], [
            'fullname.required' => 'Họ và Tên không được để trống',
            'fullname.max' => 'Họ và Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập',
            'email.email' => 'Email không đúng định dạng',
            'personal_email.required' => "Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập",
            'personal_email.email' => 'Email không đúng định dạng',
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
            'email' => $request->email,
            'personal_email' => $request->personal_email,
            'employee_code' => $request->branch.'-'.Str::slug($request->fullname),
            'password' => $passWord,
            'status' => $request->status,
            'gender' => $request->gender,
            'branch_id' => $request->branch,
            'position_id' => $request->position,
            'is_checked' => $request->is_checked,
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

        $employee = $this->employeeRepo->register($option);


        $attributes = Attribute::all();
        foreach($attributes as $attribute){
            $attriName = $attribute->name;
            if($request->$attriName != ''){
                $exitAttribute = AttribuiteEmployee::where('attribute_id','=',$attribute->id)
                ->where('employee_id','=', $employee->id)
                ->where('data','=',$request->$attriName)->get();
                if(sizeof($exitAttribute) == 0){
                    var_dump('abc');
                    $dataAtribute = [];
                    $dataAtribute['attribute_id'] = $attribute->id;
                    $dataAtribute['employee_id'] = $employee->id;
                    $dataAtribute['data'] = $request->$attriName;
                    $dataAtribute['raw_data'] = 'awdbayw awydagwd';
                    $newAttribute = AttribuiteEmployee::create($dataAtribute);
                }

              }
        }
        die;
        if ($employee) {
            return response()->json([
                'success' => true,
                'data' => [
                    'email' => $request->email,
                    'password' => $passWord
                ]
            ], 200);
        }



        return response()->json([
            'success' => false,
            'message' => "Không thể tạo mới thành viên"
        ], 440);
    }

    public function showFormUpdate($id)
    {
        $employee = Employee::with('branch', 'position', 'attributes')->find($id);
        $branchs = Branch::all();
        $positions = Position::all();
        $attributes = Attribute::all();
        if (!$employee) {
            return abort(404);
        }

        return view('admin.user.update', compact('employee', 'branchs', 'positions','attributes'));
    }



    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users,email',
        ], [
            'fullname.required' => 'Họ và Tên không được để trống',
            'fullname.max' => 'Họ và Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique:users,email' => 'Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập',
            'email.email' => 'Email không đúng định dạng',
            'personal_email.required' => "Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập",
            'personal_email.email' => 'Email không đúng định dạng',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $employee = Employee::find($id);

        $employee->fullname = $request->fullname;
        $employee->email = $request->email;
        $employee->birth_day = $request->birth_day;
        $employee->phone = $request->phone;
        $employee->status = $request->status;
        $employee->position_id = $request->position;
        $employee->gender = $request->gender;
        $employee->branch_id = $request->branch;
        $employee->is_checked = $request->is_checked;

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $employee->avatar = $urlImage;
            $employee->type_avatar = 1;
        }

        $employee->update();
        return redirect()->route('admin-list-user')->with('message.success', 'Cập nhật thông tin thành viên thành công !');

        // if ($employee) {
        //     return redirect()->route('admin-list-user')->with('message.success', 'Cập nhật thông tin thành viên thành công !');
        // }
        // return redirect()->back()->with('message.error', 'Cập nhật thông tin thành viên thất bại')->withInput();
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
            'id' => 'required',
        ], [
            'id.required' => 'Không tìm được thành viên cần chặn vì thiếu ID',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }

        $result = $this->employeeRepo->blockUser($request->id);
        if ($result) {
            $employees = $this->employeeRepo->getAllUserByPublic();
            $pages = $employees->total()/10;
            $viewData = view('admin.user._partials.base_table', compact('employees','pages'))->render();
            return response()->json([
                'data' => $viewData,
                'success' => true
            ]);
        }
        return response()->json([
            'success' => false,
            'message' => 'Không thế chặn thành viên này'
        ], 404);
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
            $employee->status = $employee->getStatusStr();
            return $employee;
        });
        $employees->setCollection($dataFormat);
    }
}
