@extends('admin.layouts.main')
@section('title')
    <title>Chi nhánh | Thêm Mới</title>
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
            @include('admin.layouts.messages')
            <form method="post" class="row" id="form-create">
                @csrf
                <div class="form-group form-default col-sx-12 col-md-6 col-lg-6">
                    <label class="float-label">Tên chi nhánh</label>
                    <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Nhập tên chi nhánh...">
                </div>
                <div class="form-group form-default col-sx-12 col-md-6 col-lg-6">
                    <label class="float-label">Hotline</label>
                    <input type="text" name="hotline" value="{{ old('hotline') }}" class="form-control" placeholder="Nhập hotline...">
                </div>
                <div class="form-group form-default col-sx-12 col-md-6 col-lg-4">
                    <label class="float-label">Vĩ độ</label>
                    <input type="text" name="latitude" value="{{ old('latitude') }}" class="form-control" placeholder="Nhập vĩ độ...">
                </div>
                <div class="form-group form-default col-sx-12 col-md-6 col-lg-4">
                    <label class="float-label">Kinh độ</label>
                    <input type="text" name="longitude" value="{{ old('longitude') }}" class="form-control" placeholder="Nhập kinh độ...">
                </div>
                <div class="form-group form-default col-sx-12 col-md-6 col-lg-4">
                    <label class="float-label">Bán kính (Đơn vị: <i>meter</i>)</label>
                    <input type="number"  min="100" step="100" max="1000" name="radius" value="{{ old('radius') }}" class="form-control" placeholder="Nhập bán kinh...">
                </div>
                <div class="form-group form-default col-sx-12 col-md-6 col-lg-12">
                    <label class="float-label">Địa chỉ chi nhánh</label>
                    <textarea name="address" id="" cols="30" rows="3" class="form-control" placeholder="Nhập địa chỉ chi nhánh ...">{{ old('address') }}</textarea>
                </div>
                <div class="text-center col-12">
                    <button type="submit"class="btn btn-primary btn-round waves-effect waves-light">Thêm mới</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
@section('page-script')
    <script>
        $(document).ready(function () {
            const objData = {
                rules: {
                    name: "required",
                    hotline: "required",
                    latitude: "required",
                    longitude: "required",
                    radius: "required",
                    address: "required"
                },
                messages: {
                    name: `<span class="text-validate">Vui lòng nhập tên chi nhánh</span>`,
                    hotline: `<span class="text-validate">Vui lòng nhập hotline</span>`,
                    latitude: `<span class="text-validate">Vui lòng nhập vĩ độ</span>`,
                    longitude: `<span class="text-validate">Vui lòng nhập kinh độ</span>`,
                    radius: `<span class="text-validate">Vui lòng nhập bán kính</span>`,
                    address: `<span class="text-validate">Vui lòng nhập địa chỉ chi nhánh</span>`
                }
            }
            validateForm("#form-create", objData);
        });
    </script>
@endsection
