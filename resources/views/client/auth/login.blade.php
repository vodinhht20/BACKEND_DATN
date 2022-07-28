<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Camel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/login.css?v=v1.0.1">
    <script src='https://www.google.com/recaptcha/api.js'></script>
</head>

<body>
    <video class="hero hero-pc" playsinline autoplay muted loop>
        <source src="{{ asset('frontend') }}/image/bg-login.mp4" type="video/mp4">
    </video>
    <div class="login-page container">
        <div class="wrapper-content">
            <form id="form_login" method="POST" class="box">
                @csrf
                <div class="header">
                    <h4>Camel<span> Dashboard</span></h4>
                    <h5>Đăng nhập vào tài khoản của bạn.</h5>
                </div>
                <div class="wrapper-input">
                    <div class="form-group">
                        <input type="text" name="email" value="{{ old('email') }}" placeholder="Email"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" placeholder="Passsword" id="pwd"
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <div class="g-recaptcha" data-sitekey="{{ env('GOOGLE_RECAPTCHA_KEY') }}"></div>
                    </div>
                </div>
                <div id="notify" class="mt-2">
                    @if (Session::has('message.error'))
                        <p class="text-validate">{{ Session::get('message.error') }}</p>
                    @endif
                    @if (Session::has('message.success'))
                        <p class="text-success">{{ Session::get('message.success') }}</p>
                    @endif
                </div>
                <div class="wrapper_btn">
                    <input type="submit" value="Đăng nhập" class="btn-login">
                </div>
            </form>
            <div class="line-break mt-4">
                <span>hoặc đăng nhập bằng</span>
            </div>
            <div class="login-social-network">
                <a href="{{ route('login-google') }}" class="login-google">
                    <img src="{{ asset('frontend') }}/image/logo-google.png" alt="">
                    <span>Đăng nhập với tài khoản Google</span>
                </a>
                {{-- <a href="{{route('login-github')}}" class="login-google"><img src="{{asset('frontend')}}/image/login-github.png" alt=""></a> --}}
            </div>
            <a href="#" class="forgot_password">Quên mật khẩu?</a>
        </div>
    </div>
</body>
<!-- validate -->
<script type="text/javascript" src="{{ asset('assets') }}/js/jquery/jquery.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/js/jquery.validate.min.js"></script>
<script type="text/javascript" src="{{ asset('frontend') }}/js/validateForm.js"></script>
<script>
    const objData = {
        rules: {
            email: {
                required: true,
                email: true
            },
            password: "required",
        },
        messages: {
            email: {
                required: `<span class="text-validate">Vui lòng nhập email</span>`,
                email: `<span class="text-validate">Định dạng email không hợp lệ</span>`
            },
            password: `<span class="text-validate">Vui lòng nhập password</span>`
        }
    }
    validateForm("#form_login", objData);
</script>

</html>
