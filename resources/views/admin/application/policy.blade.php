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
    <div class="box-section-timesheet row">
        <div class="col-md-12 col-lg-2 col-sm-12 tabs row">
            <a href="{{ route('application-view') }}" class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <div class="col-lg-12 col-md-3 col-sm-4 ">
                    <i class=" ti-clipboard"></i>
                    <p>Danh Sách Đơn Từ</p>
                </div>
            </a>
            <a href="{{ route('application-nestView') }}" class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <div class="col-lg-12 col-md-3 col-sm-4 ">
                    <i class=" ti-clipboard"></i>
                    <p>Danh Sách Đơn Từ</p>
                </div>
            </a>
            <a href="{{ route('application-policy') }}" class="col-lg-12 col-md-3 col-sm-4 tab-item active">
                <div class="col-lg-12 col-md-3 col-sm-4 ">
                    <i class=" ti-clipboard"></i>
                    <p>Danh Sách Đơn Từ</p>
                </div>
            </a>
            <a href="{{ route('application-procedure') }}" class="col-lg-12 col-md-3 col-sm-4 tab-item">
                <div class="col-lg-12 col-md-3 col-sm-4 ">
                    <i class=" ti-clipboard"></i>
                    <p>Danh Sách Đơn Từ</p>
                </div>
            </a>
        </div>
        <div class="col-md-12 col-lg-10 col-sm-12 card">
            <div class="tab-pane card-header">
                {{-- @include('admin.application.form') --}}
            </div>
            <div class="tab-pane card-block">
                {{-- @include('admin.application.nest') --}}
            </div>
            <div class="tab-pane active card-block">
                Còn Ten 3
            </div>
            <div class="tab-pane card-block">
               Còn Ten 4
            </div>
            
        </div>
    </div>
@endsection

@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css">
@endsection


