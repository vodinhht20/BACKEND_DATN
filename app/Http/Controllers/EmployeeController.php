<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use Validator;

class EmployeeController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepo)
    {
        //
    }

    public function index()
    {
        $employees = $this->employeeRepo->getAllUserByPublic();
        return view('admin.user.list', compact('employees'));
    }

    public function confirmEmail(Request $request)
    {
        $result = $this->employeeRepo->confirmEmail($request->id);

        if ($result) {
            $employees = $this->employeeRepo->getAllUserByPublic()->withPath($request->pathname);
            $dataView = view('admin.user._partials.base_table', compact('employees'))->render();
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
        return view('admin.user.create',compact('branchs'));
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'personal_email' =>'required|email|unique:users',
            'employee_code' => 'required',


        ], [
            'fullname.required' => 'Họ và Tên không được để trống',
            'fullname.max' => 'Họ và Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập',
            'email.email' => 'Email không đúng định dạng',
            'personal_email.required'=> "Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập",
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
            'employee_code' => $request->employee_code,
            'password' => $passWord,
            'status' => $request->status,
            'gender' => $request->gender,
            'branch_id' => $request->branch,
            'position_id' => $request->position,
            'is_checked' => $request->is_checked,
            'email_verified_at' => now()
        ];

        if (isset($request->birth_day)) {
            $option['birth_day'] = $request->birth_day;
        }

        if (isset($request->phone)) {
            $option['phone'] = $request->phone;
        }

        if (isset($request->note)) {
            $option['phone'] = $request->phone;
        }

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $option['avatar'] = $urlImage;
            $option['type_avatar'] = 1;
        }

        $employee = $this->employeeRepo->register($option);

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
        $employee = $this->employeeRepo->find($id);
        if (!$employee) {
            return abort(404);
        }

        return view('admin.user.update', compact('employee'));
    }

    public function showInfoUser($id)
    {
        $employee = $this->employeeRepo->find($id);
        if (!$employee) {
            return abort(404);
        }

        return view('admin.user.show', compact('employee'));
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ], [
            'fullname.required' => 'Họ và Tên không được để trống',
            'fullname.max' => 'Họ và Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại vui lòng lựa chọn email khác',
            'email.email' => 'Email không đúng định dạng',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $option = [
            'fullname' => $request->fullname,
            'email' => $request->email,
        ];

        if (isset($request->birth_day)) {
            $option['birth_day'] = $request->birth_day;
        }

        if (isset($request->phone)) {
            $option['phone'] = $request->phone;
        }

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $option['avatar'] = $urlImage;
            $option['type_avatar'] = 1;
        }

        $employee = $this->employeeRepo->update($id, $option);

        if ($employee) {
            return redirect()->route('admin-list-user')->with('message.success', 'Cập nhật thông tin thành viên thành công !');
        }
        return redirect()->back()->with('message.error', 'Cập nhật thông tin thành viên thất bại')->withInput();
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
            $viewData = view('admin.user._partials.base_table', compact('employees'))->render();
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
}
