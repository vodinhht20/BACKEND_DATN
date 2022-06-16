@extends('layouts.main')
@section('title', 'Camel - Quản lý nhân sự hàng đầu Việt Nam')
@section('content')
    <!--====== SERVICES PART START ======-->

    <section id="why" class="services-area pt-110 pb-120">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-7">
                    <div class="section-title text-center pb-25">
                        <h3 class="title">Tại sao doanh nghiệp nên sử dụng <span style="color: #F16D15">Camel</span> ngay hôm nay?</h3>
                        {{-- <p class="text">Alii nusquam cu duo, vim eu consulatu percipitur, meis dolor comprehensam at vis.
                            Vel ut percipitur dignissim signiferumque.</p> --}}
                    </div> <!-- section title -->
                </div>
            </div> <!-- row -->
            <div class="row">
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-1 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.2s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layers"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="{{ asset('frontend/index') }}/#">Miễn phí</a></h4>
                            <p class="text">Miễn phí sử dụng cho doanh nghiệp quy mô dưới 100 nhân sự</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-2 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.4s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-layout"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="{{ asset('frontend/index') }}/#">Triển khai</a></h4>
                            <p class="text">Triển khai nhanh chóng và đáp ứng được nhiều mô hình doanh nghiệp</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-3 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.6s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-protection"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="{{ asset('frontend/index') }}/#">An toàn</a></h4>
                            <p class="text">Hệ thống bảo mật và lưu trữ dữ liệu an toàn tuyệt đối</p>
                        </div>
                    </div> <!-- single services -->
                </div>
                <div class="col-lg-3 col-sm-6">
                    <div class="single-services services-color-4 text-center mt-30 wow fadeInUpBig" data-wow-duration="1.3s"
                        data-wow-delay="0.8s">
                        <div class="services-icon d-flex align-items-center justify-content-center">
                            <i class="lni lni-bolt"></i>
                        </div>
                        <div class="services-content">
                            <h4 class="services-title"><a href="{{ asset('frontend/index') }}/#">Thân thiện</a></h4>
                            <p class="text">Giao diện người dùng và quản lý dễ sử dụng và thân thiện với người dùng</p>
                        </div>
                    </div> <!-- single services -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== SERVICES PART ENDS ======-->

    <!--====== ABOUT PART START ======-->

    <section id="about" class="about-area pt-70 pb-120">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-8">
                    <div class="about-image mt-50 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <img class="app" src="{{ asset('frontend/index') }}/assets/images/about-app.png" alt="app">
                        {{-- <div class="about-shape"></div> --}}
                    </div> <!-- about image -->
                </div>
                <div class="col-lg-4">
                    <div class="about-content mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <div class="section-title">
                            <h3 class="title">Trải nghiệm mượt mà chuyên nghiệp</h3>
                            <p class="text">Trải nghiện phiên bản Desktop mượt mà và chuyên nghiệp. Tích hợp và đồng bộ dữ liệu với nhiều loại thiết bị chấm công trên thị trường.
                                Tổng hợp và báo cáo số liệu một cách chi tiết.
                                Xuất dữ liệu ra file excel với đầy đủ thông tin cần thiết theo form chuẩn từ số liệu trên hệ thống.</p>
                        </div> <!-- section title -->
                        <a href="https://www.polyf.gq" rel="nofollow" class="main-btn">Trải nghiệp ngay</a>
                    </div> <!-- about content -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== ABOUT PART ENDS ======-->


    <!--====== DOWNLOAD PART START ======-->

    <section id="download" class="download-area pt-70 pb-40">
        <div class="container">
            <div class="row justify-content-center align-items-center">
                <div class="col-lg-6 col-md-9">
                    <div class="download-image mt-50 wow fadeInRightBig" data-wow-duration="1.3s" data-wow-delay="0.2s">
                        <img class="image" src="{{ asset('frontend/index') }}/assets/images/header-app.png"
                            alt="download">

                        <div class="download-shape-1"></div>
                        <div class="download-shape-2">
                            <img class="svg" src="{{ asset('frontend/index') }}/assets/images/download-shape.svg"
                                alt="shape">
                        </div>
                    </div> <!-- download image -->
                </div>
                <div class="col-lg-6">
                    <div class="download-content mt-45 wow fadeInLeftBig" data-wow-duration="1.3s" data-wow-delay="0.5s">
                        <h3 class="download-title">Bắt đầu sử dụng ngay nào!</h3>
                        <p class="text"><span style="color: #F16D15">Camel</span> Giải pháp quản lý, lưu trữ dữ liệu chấm công thông minh, giúp doanh nghiệp số hoá hoạt động quản lý nhân sự. Đồng thời nâng cao trải nghiệm của nhân viên.</p>
                        <ul>
                            <li><a class="app-store" href="#"><img
                                        src="{{ asset('frontend/index') }}/assets/images/app-store.png" alt="store"></a>
                            </li>
                            <li><a class="play-store" href="#"><img
                                        src="{{ asset('frontend/index') }}/assets/images/play-store.png"
                                        alt="store"></a></li>
                        </ul>
                    </div> <!-- download image -->
                </div>
            </div> <!-- row -->
        </div> <!-- container -->
    </section>

    <!--====== DOWNLOAD PART ENDS ======-->
@endsection
