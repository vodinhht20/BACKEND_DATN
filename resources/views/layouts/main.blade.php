<!doctype html>
<html class="no-js" lang="en">
<head>
    <meta charset="utf-8">
    <title>@yield('title')</title>
    <meta name="description" content="Camel - Quản lý nhân sự hàng đầu Việt Nam">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    @include('layouts.style')
</head>
<body>
    <!--====== PRELOADER PART START ======-->
    <div class="preloader">
        <div class="loader">
            <div class="ytp-spinner">
                <div class="ytp-spinner-container">
                    <div class="ytp-spinner-rotator">
                        <div class="ytp-spinner-left">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                        <div class="ytp-spinner-right">
                            <div class="ytp-spinner-circle"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--====== PRELOADER PART ENDS ======-->
    @include('layouts.header')
    @yield('content')
    @include('layouts.footer')
    <a href="#" class="back-to-top"><i class="lni lni-chevron-up"></i></a>
    @include('layouts.script')
    @yield('script_page')
</body>
</html>
