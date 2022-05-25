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
@section('content')
<div class="">
    <div class="sub-title">Left Tab</div>
    <!-- Nav tabs -->
    <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
        <li class="nav-item">
            <a class="nav-link active" data-toggle="tab" href="#home5" role="tab">Home</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#profile5" role="tab">Profile</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#messages5" role="tab">Messages</a>
            <div class="slide"></div>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#settings5" role="tab">Settings</a>
            <div class="slide"></div>
        </li>
    </ul>
    <!-- Tab panes -->
    <div class="tab-content tabs-left-content card-block">
        <div class="tab-pane active" id="home5" role="tabpanel">
           @include('admin.application.form')
        </div>
        <div class="tab-pane" id="profile5" role="tabpanel">
            @include('admin.application.nest')
        </div>
        <div class="tab-pane" id="messages5" role="tabpanel">
            <p class="m-0">3. This is Photoshop's version of Lorem IpThis is Photoshop's version of Lorem Ipsum. Proin gravida nibh vel velit auctor aliquet. Aenean sollicitudin, lorem quis bibendum auctor, nisi elit consequat ipsum, nec sagittis sem nibh id elit. Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean mas Cum sociis natoque penatibus et magnis dis.....</p>
        </div>
        <div class="tab-pane" id="settings5" role="tabpanel">
            <p class="m-0">4.Cras consequat in enim ut efficitur. Nulla posuere elit quis auctor interdum praesent sit amet nulla vel enim amet. Donec convallis tellus neque, et imperdiet felis amet.</p>
        </div>
    </div>
</div>
@endsection


