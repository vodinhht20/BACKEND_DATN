<header class="header-area">
    <div class="navbar-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <nav class="navbar navbar-expand-lg">
                        <a class="navbar-brand" href="{{route('home.index')}}">
                            <img src="{{asset('frontend/index')}}/assets/images/logocamel.png" alt="Logo">
                        </a>
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                            <span class="toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse sub-menu-bar" id="navbarSupportedContent">
                            <ul id="nav" class="navbar-nav ml-auto">
                                <li class="nav-item active">
                                    <a class="page-scroll" href="{{route('home.index')}}">Trang chủ</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#why">Tại sao?</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#features">Báo giá</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#screenshots">Blog</a>
                                </li>
                                <li class="nav-item">
                                    <a class="page-scroll" href="#download">Tải về</a>
                                </li>
                                <li class="nav-item">
                                    @if (Auth::check())
                                        <a class="page-scroll" href="{{route('logout')}}">Đăng xuất</a>
                                    @else
                                        <a class="page-scroll" href="{{route('login')}}">Đăng nhập</a>
                                    @endif
                                </li>
                            </ul>
                        </div> <!-- navbar collapse -->
                    </nav> <!-- navbar -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </div> <!-- navbar area -->

    <div id="home" class="header-hero bg_cover d-lg-flex align-items-center">

        <div class="shape shape-1"></div>
        <div class="shape shape-2"></div>
        <div class="shape shape-3"></div>
        <div class="shape shape-4"></div>
        <div class="shape shape-5"></div>
        <div class="shape shape-6"></div>

        <div class="container">
            <div class="row align-items-center justify-content-center justify-content-lg-between">
                <div class="col-lg-6 col-md-10">
                    <div class="header-hero-content">
                        <h3 class="header-title wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.2s"><span>Camel</span> nền tảng quản lý chấm công trực tuyến dành cho doanh nghiệp </h3>
                        <p class="text wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.6s">Giải pháp quản lý, lưu trữ dữ liệu chấm công thông minh, giúp doanh nghiệp số hoá hoạt động quản lý nhân sự. Đồng thời nâng cao trải nghiệm của nhân viên.</p>
                        <ul class="d-flex">
                            <li><a href="{{route('login')}}" rel="nofollow" class="main-btn wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.8s">Trải nghiệm miễn phí ngay</a></li>
                        </ul>
                    </div> <!-- header hero content -->
                </div>
                <div class="col-lg-4 col-md-6 col-sm-6 col-10">
                    <div class="header-image">
                        <img src="{{asset('frontend/index')}}/assets/images/header-app.png" alt="app" class="image wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="image-shape wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.8s">
                            <img src="{{asset('frontend/index')}}/assets/images/image-shape.svg" alt="shape">
                        </div>
                    </div> <!-- header image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
        <div class="header-shape-1"></div> <!-- header shape -->
        <div class="header-shape-2">
            <img src="{{asset('frontend/index')}}/assets/images/header-shape-2.svg" alt="shape">
        </div> <!-- header shape -->
    </div> <!-- header hero -->
</header>