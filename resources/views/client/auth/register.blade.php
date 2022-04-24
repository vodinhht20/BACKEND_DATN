@extends('layouts.main')
@section('content')
<main class="account-page">
    <div class="container">
        <div class="account-main">
            <div class="tab-account">
                <ul>
                    <li><a href="{{route('login')}}">Đăng nhập</a></li>
                    <li class="active"><a href="{{route('show-form-register')}}">Đăng ký</a></li>
                </ul>
            </div>
            <div class="form-login">
                <form action="{{route('register')}}" method="POST" id="form-signin">
                        @csrf
                        <div class="form-group">
                            <label for="fullname">Họ & Tên</label>
                            <input type="text" class="form-control" name="fullname" value="{{ old('fullname') }}" id="fullname" placeholder="Nhập họ & tên " >
                        </div>
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="text" class="form-control" name="email" value="{{ old('email') }}" id="email" placeholder="Nhập địa chỉ email" >
                        </div>
                        <div class="form-group">
                            <label for="password">Mật Khẩu</label>
                            <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu" >
                        </div>
                        <div class="form-group">
                            <span>Đã có tài khoản ?</span>
                            <a href="login">Đăng nhập</a>
                        </div>
                        <div class="form-group">
                        </div>
                    <button type="submit" class="btn btn-dark">Đăng ký</button>
                </form>
                <div class="notify mt-2">
                    @if (Session::has('message.error'))
                        <p class="text-validate">{{ Session::get('message.error') }}</p>
                    @endif
                </div>
            </div>
            <div class="line-break mt-4">
                <span>hoặc đăng nhập bằng</span>
            </div>

            <div class="login-social-network mt-5 mb-5">
                <a href="{{route('login-google')}}" class="login-google"><img src="{{asset('frontend')}}/image/login-google.png" alt=""></a>
            </div>
        </div>

    </div>
</main>
@endsection
@section('script-page')
<!-- validate -->
<script type="text/javascript" src="{{asset('frontend')}}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{asset('frontend')}}/js/validateForm.js"></script>
<script>
    const objData = {
    rules: {
        fullname: "required",
        email: "required",
        password: "required",
    },
    messages: {
        fullname: `<span class="text-validate">Vui lòng nhập họ & tên</span>`,
        email: `<span class="text-validate">Vui lòng nhập email</span>`,
        password: `<span class="text-validate">Vui lòng nhập password</span>`,
    }
  }
  validateForm("#form-signin",objData);
</script>
@endsection