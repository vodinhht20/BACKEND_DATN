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
        <div class="tab-pane" id="messages5" role="tabpanel">
            <div class="col-md-6">
                <div class="card1">
                    <div class="card-header">
                        <h5>Cập nhật thông tin công ty</h5>
                    </div>
                    <div class="card-block">
                        <form class="form-material" method="post">
                            <div class="form-group form-default">
                                <input type="text" name="name" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Tên công ty</label>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Địa chỉ email công ty</label>
                            </div>
                            <div class="form-group form-default">
                                <input type="number" name="hotline" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Hotline công ty</label>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="footer-email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Website công ty</label>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="footer-email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Fanpage công ty</label>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="footer-email" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Địa chỉ trụ sở chính công ty</label>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="footer-email" class="form-control" required="" maxlength="6">
                                <span class="form-bar"></span>
                                <label class="float-label">Mã số thuế</label>
                            </div>
                            <div class="form-group form-default">
                                <textarea class="form-control" required=""></textarea>
                                <span class="form-bar"></span>
                                <label class="float-label">Mô tả</label>
                            </div>
                            <button class="btn btn-info waves-effect waves-light">Cập nhật</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
