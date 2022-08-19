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
            <div class="card-header">
                <h5>Cập nhật thông tin công ty</h5>
            </div>
            <div class="card-block">
                @include('admin.layouts.messages')
                <form method="post" action="{{ route('setting.company.post-update-company', ['id' => $company->id]) }}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label class="float-label">Tên công ty</label>
                        <input value={{$company->name_company}} type="text" name="name_company" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Hotline công ty</label>
                        <input value={{$company->hotline}} type="text" name="hotline" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Địa chỉ email công ty</label>
                        <input value={{$company->email}} type="text" name="email" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Website công ty</label>
                        <input value={{$company->website}} type="text" name="website" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Fanpage công ty</label>
                        <input value={{$company->fanpage}} type="text" name="fanpage" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Địa chỉ trụ sở chính công ty</label>
                        <input value={{$company->head_quater}} type="text" name="head_quater" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Mã số thuế công ty</label>
                        <input value={{$company->tax_code}} type="text" name="tax_code" class="form-control" required="">
                    </div>
                    <div class="form-group">
                        <label class="float-label">Mô tả</label>
                        <textarea name="desc" id="" cols="30" rows="10" class="form-control">{{$company->desc}}</textarea>
                    </div>
                    <button class="btn btn-info waves-effect waves-light">Cập nhật</button>
                </form>
            </div>
        </div>
    </div>
@endsection
