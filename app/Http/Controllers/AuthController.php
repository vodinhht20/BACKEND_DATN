<?php

namespace App\Http\Controllers;

use App\Events\UserRegisted;
use App\Models\User;
use App\Repositories\UserRepositoryInterface;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Validator;
use Log;

class AuthController extends Controller
{
    protected $userRepo;
    public function __construct(UserRepositoryInterface $userRepo) {
        $this->userRepo = $userRepo;
    }
    public function showFormLogin() {
        return view("client.auth.login");
    }
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|min:8'
        ], [
            'email.required' => 'Email không được để trống',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $user = $this->userRepo->checkPassword($request->email, $request->password);
        if ($user) {
            if (!$user->email_verified_at) {
                return redirect()->back()->with('message.error', 'Tài khoản chưa được xác thực email, vui lòng xác thực để đăng nhập !')->withInput();
            }
            if (!$user->role == 0) {
                return redirect()->back()->with('message.error', 'Tài khoản của bạn không có quyền truy cập, vui lòng liên hệ quản trị viên để được hỗ trợ !')->withInput();
            }
        } else {
            return redirect()->back()->with('message.error', 'Tài khoản hoặc mật khẩu không chính xác !')->withInput();
        }
        Auth::login($user, true);
        return $user->hasRole('admin') ? redirect()->route('dashboard') : redirect()->route('home.index');

    }

    public function showFromRegister() {
        return view("client.auth.register");

    }
    public function register(Request $request) {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|max:255',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ], [
            'fullname.required' => 'Họ và Tên không được đẻ trống',
            'email.required' => 'Email không được để trống',
            'email.unique' => 'Email này đã tồn tại, vui lòng nhập mail khác hoặc đăng nhập',
            'email.email' => 'Email không đúng định dạng',
            'password.required' => 'Vui lòng nhập mật khẩu',
            'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $data = [
            'fullname' => $request->fullname,
            'email' => $request->email,
            'password' => $request->password,
        ];
        $user = $this->userRepo->register($data);
        if ($user) {
            event(new UserRegisted($user));
            return redirect()->route('account-verify',['id' => $user->id]);
        }
        return redirect()->back()->with('message.error', "Đăng ký thất bại. Vui lòng thử lại !")->withInput();
    }
    public function ggLogin() {
        return Socialite::driver('google')->redirect();
    }
    public function ggAuthCallback() {
        $ggUser = Socialite::driver('google')->user();
        $user = User::where('email', $ggUser->email)->first();
        if(isset($user)){
            $user->avatar = $ggUser->avatar;
            $user->name = $ggUser->name;
            $user->save();
        } else {
            $option = [
                'email' => $ggUser->email,
                'fullname' => $ggUser->name,
                'avatar' => $ggUser->avatar,
                'password' => 'thuc-pham-xanh@123',
                'email_verified_at' => now(),
            ];
            $user = $this->userRepo->register($option);
        }
        Auth::login($user);
        return Auth::user()->hasRole('admin') ? redirect()->route('dashboard') : redirect()->route('home.index');
    }
    public function notifyConfirmEmail($id) {
        $user = $this->userRepo->find($id);
        if ($user && !$user->email_verified_at) {
            return view('client.auth.notifyConfirmEmail',['email' => $user->email]);
        }
        return redirect()->route('home.index');
    }

    public function verifyTokenEmail($token, $id) {
        $user = $this->userRepo->find($id);
        if ($user && $user->email_confirm_token == $token) {
            $user->email_verified_at = now();
            $user->save();
            return redirect()->route('login')->with('message.success', 'Xác thực email thành công vui lòng đăng nhập');
        }
        return redirect()->route('home.index');
    }
    public function logout(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('login');
    }
}
