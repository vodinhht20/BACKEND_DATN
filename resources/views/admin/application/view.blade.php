@extends('admin.layouts.main')
@section('title')
    <title>Loại Sản Phẩm | Danh sách</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản Lý ĐƠn Từ</h5>
                    <p class="m-b-0">Danh sách tất cả các loại đơn từ của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Loại Sản Phẩm</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
{{-- @section('content')
<div class="">
    <div class="sub-title">Left Tab</div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" data-target="#application_list"  aria-controls="application_list" aria-expanded="false" role="tab">Danh Sách Đơn Từ</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-target="#create_application" aria-controls="create_application" aria-expanded="false" role="tab">Thiết Lập Đơn Từ</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-target="#policy" aria-controls="policy" aria-expanded="false" role="tab">Chính Sách nghỉ phép</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" data-target="#procedure" aria-controls="procedure" aria-expanded="false" role="tab">Quy trình</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs-left-content card-block">
        <div class="tab-pane active" id="application_list" role="tabpanel">
           @include('admin.application.form')
        </div>
        <div class="tab-pane" id="create_application" role="tabpanel">
            @include('admin.application.nest')
        </div>
        <div class="tab-pane" id="policy" role="tabpanel">
            <p >3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
        </div>
        <div class="tab-pane" id="procedure" role="tabpanel">
            <p>4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
        </div>
    </div>
</div>

@endsection --}}
@section('content')
    <div class="box-section-timesheet row">
        <div class="col-md-12 col-lg-2 col-sm-12 tabs row">
            <a href="{{ route('application-view') }}" class="col-lg-12 col-md-3 col-sm-4 tab-item active">
                <div class="col-lg-12 col-md-3 col-sm-4 ">
                    <i class=" ti-clipboard"></i>
                    <p>Bảng công</p>
                </div>
            </a>
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <i class=" ti-settings"></i>
                <p>Cài đặt ngày chốt công</p>
            </div>
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <i class=" ti-settings"></i>
                <p>Cài đặt ngày chốt công</p>
            </div>
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <i class=" ti-settings"></i>
                <p>Cài đặt ngày chốt công</p>
            </div>
        </div>
        <div class="col-md-12 col-lg-10 col-sm-12 card">
            <div class="tab-pane active card-header">
                @include('admin.application.form')
            </div>
            <div class="tab-pane card-block">
                @include('admin.application.nest')
            </div>
            <div class="tab-pane card-block">
                CÒN TEN 3
            </div>
            <div class="tab-pane card-block">
                CÒN TEN 4
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script>

    const tabs = document.querySelectorAll(".tab-item");
    const panes = document.querySelectorAll(".tab-pane");
    tabs.forEach((tab, index) => {
        const pane = panes[index];

        tab.onclick = function() {
            document.querySelector(".tab-item.active").classList.remove("active");
            document.querySelector(".tab-pane.active").classList.remove("active");
            this.classList.add("active");
            pane.classList.add("active");
        };
    })

// if(document.querySelector('.item').checked) {
//     document.querySelector(".item.active").classList.add("active");

// }else {
//     document.querySelector(".item.active").classList.remove("active");
// }
</script>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css">
@endsection


