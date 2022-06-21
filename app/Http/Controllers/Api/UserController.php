<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepositoryInterface;
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
                "avatar" => $profile->avatar,
                "gender" => "2",
                "birth_day" => $profile->birth_day,
                "phone" => $profile->phone,
                "TIN" => "547464564",
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
            'avatar' => 'required|mimes:jpeg,jpg,png',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'message' => 'Vui lòng chọn file ảnh !'
            ], 403);
        }

        if ($request->hasFile('avatar')) { 
            $urlImage = $this->storeImage($request, 'avatar');
            $employee->fill([
                'avatar' => $urlImage
            ])->save();
            
            return response()->json([
                'error_code' => 'success',
                'message' => 'update avatar thành công!',
                'image_links' => $urlImage
            ], 200);
        }

        return response()->json([
            'error_code' => 'error',
            'message' => 'update avatar thất bại!'
        ], 403);
    }

    protected function storeImage(Request $request, $name = 'image')
    {
        $path = $request->file($name)->store('public/avatars');
        return substr($path, strlen('public/'));
    }
}
