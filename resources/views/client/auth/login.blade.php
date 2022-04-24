@section('title')
    <title>Đăng Nhập</title>
@endsection
@extends('layouts.main')
@section('content')
<main class="account-page">
    <div class="container">
        <div class="account-main">
            <div class="tab-account">
                <ul>
                    <li class="active"><a href="{{route('login')}}">Đăng nhập</a></li>
                    <li><a href="{{route('show-form-register')}}">Đăng ký</a></li>
                </ul>
            </div>
            <div class="form-login">
                <form action="{{route('post-login')}}" method="POST" id="login">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="text" class="form-control" name="email" id="email" value="{{ old('email') }}" placeholder="Nhập địa chỉ email">
                    </div>
                    <div class="form-group">
                        <label for="password">Mật Khẩu</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Nhập mật khẩu">
                    </div>
                    <div class="form-group">
                        <a href="">Quên mật khẩu ?</a>
                    </div>
                    <button type="submit" class="btn btn-dark">Đăng nhập</button>
                </form>
                <div id="notify" class="mt-2">
                    @if (Session::has('message.error'))
                        <p class="text-validate">{{ Session::get('message.error') }}</p>
                    @endif
                    @if (Session::has('message.success'))
                        <p class="text-success">{{ Session::get('message.success') }}</p>
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
        email: "required",
        password: "required",
    },
    messages: {
        email: `<span class="text-validate">Vui lòng nhập email</span>`,
        password: `<span class="text-validate">Vui lòng nhập password</span>`,
    }
  }
  validateForm("#login",objData);
</script>
@endsection