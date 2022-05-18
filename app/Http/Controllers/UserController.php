<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\Request;
use \Illuminate\Support\Str;
use Validator;

class UserController extends Controller
{
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
    }

    public function index()
    {
        $users = $this->userRepo->getAllUserByPublic();
        return view('admin.user.list', compact('users'));
    }
    
    public function confirmEmail(Request $request)
    {
        $result = $this->userRepo->confirmEmail($request->id);
        
        if ($result) {
            $users = $this->userRepo->getAllUserByPublic()->withPath($request->pathname);
            $dataView = view('admin.user._partials.base_table', compact('users'))->render();
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
        $result = $this->userRepo->changePasssword($request->password, $request->id);
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
        return view('admin.user.create');
    }

    public function addUser(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users',
        ], [
            'name.required' => 'Họ và Tên không được để trống',
            'name.max' => 'Họ và Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập',
            'email.email' => 'Email không đúng định dạng',
        ]);
        
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'message' => $validator->messages()->first()
            ], 404);
        }

        $passWord = Str::random(12);
        $option = [
            'fullname' => $request->name,
            'email' => $request->email,
            'password' => $passWord,
            'email_verified_at' => now()
        ];

        if (isset($request->birth_day)) {
            $option['birth_day'] = $request->birth_day;
        }

        if (isset($request->phone)) {
            $option['phone'] = $request->phone;
        }

        if (isset($request->address)) {
            $option['address'] = $request->address;
        }

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $option['avatar'] = $urlImage;
            $option['type_avatar'] = 1;
        }

        $user = $this->userRepo->register($option);

        if ($user) {
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
        $user = $this->userRepo->find($id);
        if (!$user) {
            return abort(404);
        }

        return view('admin.user.update', compact('user'));
    }

    public function updateUser(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $id,
        ], [
            'name.required' => 'Họ và Tên không được để trống',
            'name.max' => 'Họ và Tên không được quá 255 ký tự',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại vui lòng lựa chọn email khác',
            'email.email' => 'Email không đúng định dạng',
        ]);
        
        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }

        $option = [
            'name' => $request->name,
            'email' => $request->email,
        ];

        if (isset($request->birth_day)) {
            $option['birth_day'] = $request->birth_day;
        }

        if (isset($request->phone)) {
            $option['phone'] = $request->phone;
        }

        if (isset($request->address)) {
            $option['address'] = $request->address;
        }

        if ($request->hasFile('avatar')) {
            $urlImage = $this->storeImage($request, 'avatar');
            $option['avatar'] = $urlImage;
            $option['type_avatar'] = 1;
        }

        $user = $this->userRepo->update($id, $option);

        if ($user) {
            return redirect()->route('admin-list-user')->with('message.success','Cập nhật thông tin thành viên thành công !');
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

        $result = $this->userRepo->delete($request->id);
        if ($result) {
            $users = $this->userRepo->getAllUserByPublic();
            $viewData = view('admin.user._partials.base_table', compact('users'))->render();
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

        $result = $this->userRepo->blockUser($request->id);
        if ($result) {
            $users = $this->userRepo->getAllUserByPublic();
            $viewData = view('admin.user._partials.base_table', compact('users'))->render();
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
        $users = $this->userRepo->getUserBlock();
        return view('admin.user.black_list', compact('users'));
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

        $result = $this->userRepo->unBlockUser($request->id);
        if ($result) {
            $users = $this->userRepo->getUserBlock();
            $viewData = view('admin.user._partials.black_table', compact('users'))->render();
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

    protected function storeImage(Request $request, $name = 'image') {
        $path = $request->file($name)->store('public/avatars');
        return substr($path, strlen('public/'));
    }
}
