<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Libs\Slack;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepositoryInterface;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;

class UserController extends Controller
{
    public function __construct(private EmployeeRepository $employeeRepo)
    {
        //
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employee = $this->employeeRepo->getAllUserByPublic(15);
        return response()->json([
            "status" => "200",
            "payload" => $employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function profile(Request $request){
        $employee = JWTAuth::toUser($request->access_token);
        return $this->responseUser($employee);
    }

    protected function responseUser($profile): JsonResponse
    {
        return response()->json([
                "email" => $profile->email,
                "fullname" => $profile->fullname,
                "avatar" => $profile->getAvatar(),
                "gender" => "$profile->gender",
                "birth_day" => $profile->birth_day,
                "phone" => $profile->phone,
                "employee_code" => $profile->employee_code,
                "id" => $profile->id,
                'profile' => $profile
        ], 200);
    }

    protected function changePasssword(Request $request){
        $employee = JWTAuth::toUser($request->access_token);
        if (Hash::check($request->password_old, $employee->password)) {
            $employee->fill([
                'password' => Hash::make($request->password_new)
            ])->save();

            return response()->json([
                'error_code' => 'success',
                'message' => 'Thay đổi mật khẩu thành công!'
            ], 200);
        }

        return response()->json([
            'error_code' => 'error',
            'message' => 'Mật khẩu cũ không đúng!'
        ], 403);
    }

    public function updateAvatar(Request $request): JsonResponse
    {
        $employee = JWTAuth::toUser($request->access_token);
        $validator = Validator::make($request->all(), [
            'avatar' => 'required|mimes:jpeg,jpg,png,gif|max:10000',
        ],[
            'avatar.required' => 'Vui lòng chọn file',
            'avatar.max' => 'File của bạn vượt quá 10MB',
            'avatar.mimes' => 'File bạn chọn không phải file ảnh',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->messages()->first()
            ], 403);
        }

        try {
            $urlImage = $this->storeImage($request, 'avatar');
            $employee->fill([
                'avatar' => $urlImage,
                'type_avatar' => 1
            ])->save();

            return response()->json([
                'error_code' => 'success',
                'message' => 'update avatar thành công!',
                'image_links' => $urlImage
            ], 200);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            Slack::error($message);
            return response()->json([
                'error_code' => 'error',
                'message' => 'update avatar thất bại!'
            ], 403);
        }
    }

    public function updateProfile(Request $request): JsonResponse
    {
        $employee = JWTAuth::toUser($request->access_token);
        $validator = Validator::make($request->all(), [
            'birth_day' => 'required',
            'fullname' => 'required',
            'gender' => 'required',
            'phone' => 'required|regex:/[0-9]{10}/',
        ],[
            'birth_day.required' => 'Ngày sinh không được để trống',
            'fullname.required' => 'Họ tên không được để trống',
            'gender.required' => 'Giới tính không được để trống',
            'phone.required' => 'Số điện thoại không được để trống',
            'phone.regex' => 'Số điện thoại bạn nhập không đúng',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => $validator->messages()->first()
            ], 403);
        }

        $employee->fill([
            'birth_day' => Carbon::create($request->birth_day)->toDateString(),
            'fullname' => $request->fullname,
            'gender' => $request->gender,
            'phone' => $request->phone,
        ])->save();

        return response()->json([
            'error_code' => 'success',
            'message' => 'update thông tin thành công!',
        ], 200);
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/avatars');
        return substr($path, strlen('public/'));
    }
}
