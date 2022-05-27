<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Tymon\JWTAuth\Facades\JWTAuth;
class AuthController extends Controller
{

    protected $user;
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(Request $request)
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
        try {
            if (!$token = JWTAuth::attempt($credentials)) {
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
        return $this->respondWithToken($token);
    }

    /**
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(Request $request)
    {
        JWTAuth::invalidate($request->access_token);
        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param  string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            // 'token_type' => 'bearer',
            // 'expires_in' => Auth::guard('api')->factory()->getTTL() * 1
        ]);
    }
}
