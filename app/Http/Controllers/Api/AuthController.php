<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Repositories\UserRepositoryInterface;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{

    protected $userRepo;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
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
        return $this->responseAuth($token);
    }

    public function logout(Request $request): JsonResponse
    {
        JWTAuth::invalidate($request->access_token);
        return response()->json(['message' => 'Successfully logged out']);
    }

    protected function responseAuth($token): JsonResponse
    {
        return response()->json([
            'access_token' => $token
        ], 200);
    }

    public function googleLogin(Request $request): JsonResponse
    {
        $validator = Validator::make($request->all(), [
            'client_id' => 'required',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'TOKEN REQUIRED',
                'message' => $validator->messages()->first()
            ], 403);
        }

        $clientId = $request->input('client_id');
        $idToken =  config('services.google.client_id');
        $client = new \Google_Client(['client_id' => $idToken]);
        $payload = $client->verifyIdToken($clientId);

        if (isset($payload['email'])) {
            $email = $payload['email'];
            $user = $this->userRepo->getUserByEmail($email);
            if ($user) {
                $token = JWTAuth::fromUser($user);
                return $this->responseAuth($token);
            } else {
                return response()->json([
                    'error_code' => 'ACCOUNT_NOT_EXIST',
                    'message' => 'Account does not exist'
                ], 403);
            }
        }

        return response()->json([
            'error_code' => 'LOGIN_FAILED',
            'message' => 'Login failed',
            'email' => $payload['email']
        ], 403);
    }
}
