<?php

namespace App\Http\Controllers;

use App\Events\UserRegisted;
use App\Models\Employee;
use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepositoryInterface;
use App\Rules\ReCaptcha;
use App\Service\EmployeeService;
use Laravel\Socialite\Facades\Socialite;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Log;

class AuthController extends Controller
{
    public function __construct(
        private EmployeeRepository $employeeRepo,
        private EmployeeService $employeeService
    )
    {
        //
    }
    public function showFormLogin() {
        if (Auth::check()) {
            return redirect()->route('home.index');
        }
        return view("client.auth.login");
    }
    public function login(Request $request) {
        $validator = Validator::make($request->all(), [
            'g-recaptcha-response' => ['required', new ReCaptcha],
            'email' => 'required|email',
            'password' => 'required',
        ], [
            'email.required' => 'Email không được để trống !',
            'email.email' => 'Email không đúng định dạng !',
            'password.required' => 'Vui lòng nhập mật khẩu !',
            'g-recaptcha-response.required' => 'Vui lòng xác minh Recapcha !',
            // 'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->with('message.error', $validator->messages()->first())->withInput();
        }
        $employee = $this->employeeRepo->checkPassword($request->email, $request->password);
        if ($employee) {
            if (!$employee->email_verified_at) {
                return redirect()->back()->with('message.error', 'Tài khoản chưa được xác thực email, vui lòng xác thực để đăng nhập !')->withInput();
            }
            if (!$employee->role == 0) {
                return redirect()->back()->with('message.error', 'Tài khoản của bạn không có quyền truy cập, vui lòng liên hệ quản trị viên để được hỗ trợ !')->withInput();
            }
        } else {
            return redirect()->back()->with('message.error', 'Tài khoản hoặc mật khẩu không chính xác !')->withInput();
        }
        Auth::login($employee, true);
        Noti::telegram('Login thường - Server', $employee);
        return $employee->hasRole('admin') ? redirect()->route('dashboard') : redirect()->route('home.index');

    }

    public function showFromRegister() {
        return redirect()->route('show-form-register')->with('message.error', 'Tính năng đăng ký đang phát triển. Vui lòng đăng nhập !');
        // return view("client.auth.register");
    }
    public function register(Request $request) {
        return redirect()->route('show-form-register')->with('message.error', 'Tính năng đăng ký đang phát triển. Vui lòng đăng nhập !');
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
        $employee = $this->employeeRepo->register($data);
        if ($employee) {
            event(new UserRegisted($employee));
            return redirect()->route('account-verify',['id' => $employee->id]);
        }
        return redirect()->back()->with('message.error', "Đăng ký thất bại. Vui lòng thử lại !")->withInput();
    }
    public function ggLogin() {
        return Socialite::driver('google')->redirect();
    }
    public function ggAuthCallback() {
        $ggUser = Socialite::driver('google')->user();
        $employee = Employee::where('email', $ggUser->email)->first();
        if(isset($employee)){
            $employee->avatar = $ggUser->avatar;
            $employee->fullname = $ggUser->name;
            $employee->save();

            Auth::login($employee);
            Noti::telegram('Login GG - Server', $employee);
            return Auth::user()->hasRole('admin') ? redirect()->route('dashboard') : redirect()->route('home.index');
        }
        // else {
        //     $option = [
        //         'email' => $ggUser->email,
        //         'fullname' => $ggUser->name,
        //         'avatar' => $ggUser->avatar,
        //         'employee_code' => $this->employeeService->makeEmployeeCode(),
        //         'password' => 'thuc-pham-xanh@123',
        //         'email_verified_at' => now(),
        //     ];
        //     $employee = $this->employeeRepo->register($option);
        // }
        return redirect()->route('login')->with('message.error', 'Không tìm thấy tài khoản của bạn trên hệ thống');
    }
    public function notifyConfirmEmail($id) {
        $employee = $this->employeeRepo->find($id);
        if ($employee && !$employee->email_verified_at) {
            return view('client.auth.notifyConfirmEmail',['email' => $employee->email]);
        }
        return redirect()->route('home.index');
    }

    public function verifyTokenEmail($token, $id) {
        $employee = $this->employeeRepo->find($id);
        if ($employee && $employee->email_confirm_token == $token) {
            $employee->email_verified_at = now();
            $employee->save();
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

    public function githubLogin(){
        return Socialite::driver('github')->redirect();
    }
    public function githubCallback() {
        $githubUser = Socialite::driver('github')->user();
        $employee = Employee::where('email', $githubUser->email)->first();
        if(isset($employee)){
            $employee->avatar = $githubUser->avatar;
            $employee->fullname = $githubUser->nickname;
            $employee->save();
            Auth::login($employee);
            Noti::telegram('Login Github - Server', $employee);
            return Auth::user()->hasRole('admin') ? redirect()->route('dashboard') : redirect()->route('home.index');
        }
        // else {
        //     $option = [
        //         'email' => $githubUser->email,
        //         'fullname' => $githubUser->nickname,
        //         'avatar' => $githubUser->avatar,
        //         'password' => 'thuc-pham-xanh@123',
        //         'email_verified_at' => now(),
        //     ];
        //     $employee = $this->employeeRepo->register($option);
        // }
        return redirect()->route('login')->with('message.error', 'Không tìm thấy tài khoản của bạn trên hệ thống');
    }
}
