<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Đăng nhập Camel</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/login.css">
</head>

<body>

    <body id="particles-js"></body>
    <div class="animated bounceInDown">
        <div class="container">
            <span class="error animated tada" id="msg"></span>
            <div id="notify" class="mt-2">
                @if (Session::has('message.error'))
                    <p class="error2 text-validate">{{ Session::get('message.error') }}</p>
                @endif
                @if (Session::has('message.success'))
                    <p class="error2 text-success">{{ Session::get('message.success') }}</p>
                @endif
            </div>
            <form name="form1" method="POST" class="box" onsubmit="return checkStuff()">
                @csrf
                <h4>Camel<span> Dashboard</span></h4>
                <h5>Đăng nhập vào tài khoản của bạn.</h5>
                <input type="text" name="email" value="{{ old('email') }}" placeholder="Email" autocomplete="off">
                <i class="typcn typcn-eye" id="eye"></i>
                <input type="password" name="password" placeholder="Passsword" id="pwd" autocomplete="off">
                <a href="#" class="forgetpass">Quên mật khẩu?</a>
                <input type="submit" value="Đăng nhập" class="btn1">
            </form>
            <div class="login-social-network mt-5 mb-5">
                <a href="{{route('login-google')}}" class="login-google"><img src="{{asset('frontend')}}/image/login-google.png" alt=""></a>
                <a href="{{route('login-github')}}" class="login-google"><img src="{{asset('frontend')}}/image/login-github.png" alt=""></a>
            </div>
            <a href="#" class="dnthave">Không có tài khoản? Đăng ký</a>
        </div>
    </div>

    <script>
        var pwd = document.getElementById("pwd");
        var eye = document.getElementById("eye");

        eye.addEventListener("click", togglePass);

        function togglePass() {
            eye.classList.toggle("active");

            pwd.type == "password" ? (pwd.type = "text") : (pwd.type = "password");
        }

        // Form Validation

        function checkStuff() {
            var email = document.form1.email;
            var password = document.form1.password;
            var msg = document.getElementById("msg");

            if (email.value == "") {
                msg.style.display = "block";
                msg.innerHTML = "Vui lòng nhập email của bạn";
                email.focus();
                return false;
            } else {
                msg.innerHTML = "";
            }

            if (password.value == "") {
                msg.innerHTML = "Vui lòng nhập mật khẩu của bạn";
                password.focus();
                return false;
            } else {
                msg.innerHTML = "";
            }
            var re =
                /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
            if (!re.test(email.value)) {
                msg.innerHTML = "Vui lòng nhập email hợp lệ";
                email.focus();
                return false;
            } else {
                msg.innerHTML = "";
            }
        }
    </script>
</body>

</html>
