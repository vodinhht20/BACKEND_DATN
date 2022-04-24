<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" href="//bizweb.dktcdn.net/100/431/449/themes/834425/assets/favicon.png?1642042407923" type="image/x-icon" />
    @include('layouts.style')
    @yield('title')
</head>

<body>
        @include('layouts.header')
        @yield('content')
        @include('layouts.footer')
        @include('layouts.script')
        @yield('script-page')
</body>
</html>