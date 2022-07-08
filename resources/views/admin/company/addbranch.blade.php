@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Thêm Mới</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/company-info.css">
@endsection
@section('header-page')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Quản lý công ty</h5>
                        <p class="m-b-0">Quản lý công ty của bạn</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Công ty</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('content')
<div class="company-info">
    <div class="card">
        <div class="card-header" style="box-shadow: unset;">
            <h5>Thêm chi nhánh</h5>
        </div>
        <div class="card-block">
            <form class="form-material" method="post">
                @csrf
                <div class="form-group form-default">
                    <input type="text" name="name" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Tên chi nhánh</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="code_branch" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Mã chi nhánh</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="address" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Địa chỉ chi nhánh</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="hotline" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Hotline</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="latitude" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Vĩ độ</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="longtitude" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Kinh độ</label>
                </div>
                <div class="form-group form-default">
                    <input type="text" name="radius" class="form-control" required="">
                    <span class="form-bar"></span>
                    <label class="float-label">Bán kính</label>
                </div>
                <div class="text-center">
                    <button type="submit"class="btn btn-primary btn-round waves-effect waves-light">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
