<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(EmployeeRepository $employeeRepo)
    {
        $this->employeeRepo = $employeeRepo;
    }

    public function login(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required',
            'password' => 'required',
        ]);
        if ($validator->fails()) {
            return response()->json([
                'status' => 'success',
                'message' => $validator->messages()->first()
            ], 404)->withInput();
        }
        $credentials = request(['email', 'password']);
        $token = JWTAuth::attempt($credentials);
        try {
            if (!$token) {
             return response()->json([
                'status' => 'failed',
                'message' => 'Tài khoản hoặc mật khẩu không chính xác'
             ], 422);
            }
        } catch (\Exception $e) {
            return response()->json([
                 'status' => 'failed',
                 'message' => 'Đã có lỗi xảy ra'
            ], 500);
        }
        Noti::telegram('Login thường - Client', $request->all());
        return $this->responseToken($token);
    }

    public function logout(Request $request): JsonResponse
    {
        JWTAuth::getToken();
        JWTAuth::invalidate($request->access_token);
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function responseToken($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token
        ], 200);
    }

    public function googleLogin(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'token_id' => 'required',
        ],[
            'token_id.required' => "token id không được để trống"
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'TOKEN REQUIRED',
                'message' => $validator->messages()->first()
            ], 403);
        }

        $tokenId = $request->input('token_id');
        $idToken =  config('services.google.client_id');
        $client = new \Google_Client(['client_id' => $idToken]);
        $payload = $client->verifyIdToken($tokenId);

        if (isset($payload['email'])) {
            $email = $payload['email'];
            $employee = $this->employeeRepo->getUserByEmail($email);
            if ($employee) {
                $token = JWTAuth::fromUser($employee);
                Noti::telegram('Login GG - Client', $payload);
                return $this->responseToken($token);
            } else {
                return response()->json([
                    'error_code' => 'ACCOUNT_NOT_EXIST',
                    'message' => 'Account does not exist'
                ], 442);
            }
        }

        return response()->json([
            'error_code' => 'LOGIN_FAILED',
            'message' => 'Login failed'
        ], 442);
    }

    public function isValidToken()
    {
        try {
            JWTAuth::parseToken()->authenticate();
        } catch (\Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

            return response()->json([
                'message' => 'Token đã hết hạn',
                'error_code' =>  71
            ], 401);

        } catch (\Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

            return response()->json([
                'message' => 'Token không hợp lệ',
                'error_code' =>  70
            ], 401);

        }
    }
}
