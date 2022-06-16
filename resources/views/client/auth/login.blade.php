@section('title', 'Đăng Nhập')
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
                <a href="{{route('login-github')}}" class="login-google"><img src="{{asset('frontend')}}/image/login-github.png" alt=""></a>
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

{{-- <!doctype html>
<html lang="en">

<head>
    <title>Login 10</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="{{ asset('frontend/login') }}/css/style.css">
</head>

<body class="img js-fullheight" style="background-image: url({{ asset('frontend/login') }}/images/bg.jpg);">
    <section class="ftco-section">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6 text-center mb-5">
                    <h2 class="heading-section">Đăng nhập với Camel</h2>
                </div>
            </div>
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="login-wrap p-0">
                        <h3 class="mb-4 text-center">Have an account?</h3>
                        <form action="#" class="signin-form">
                            <div class="form-group">
                                <input type="text" class="form-control" placeholder="Username" required>
                            </div>
                            <div class="form-group">
                                <input id="password-field" type="password" class="form-control" placeholder="Password"
                                    required>
                                <span toggle="#password-field"
                                    class="fa fa-fw fa-eye field-icon toggle-password"></span>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="form-control btn btn-primary submit px-3">Sign In</button>
                            </div>
                            <div class="form-group d-md-flex">
                                <div class="w-50">
                                    <label class="checkbox-wrap checkbox-primary">Remember Me
                                        <input type="checkbox" checked>
                                        <span class="checkmark"></span>
                                    </label>
                                </div>
                                <div class="w-50 text-md-right">
                                    <a href="#" style="color: #fff">Forgot Password</a>
                                </div>
                            </div>
                        </form>
                        <p class="w-100 text-center">&mdash; Or Sign In With &mdash;</p>
                        <div class="social d-flex text-center">
                            <a href="#" class="px-2 py-2 mr-md-1 rounded"><span
                                    class="ion-logo-facebook mr-2"></span> Google</a>
                            <a href="#" class="px-2 py-2 ml-md-1 rounded"><span
                                    class="ion-logo-twitter mr-2"></span> Github</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="{{ asset('frontend/login') }}/js/jquery.min.js"></script>
    <script src="{{ asset('frontend/login') }}/js/popper.js"></script>
    <script src="{{ asset('frontend/login') }}/js/bootstrap.min.js"></script>
    <script src="{{ asset('frontend/login') }}/js/main.js"></script>
</body>

</html> --}}
