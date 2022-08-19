@extends('admin.layouts.main')
@section('title')
    <title>Setting Company</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/company-info.css">
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
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
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
            <h5>Thông tin công ty</h5>
            <div style="display: block;" class="card-header-right">
                <ul class="list-unstyled card-option">
                    <li class="nav-item"><i class="fa fa fa-wrench open-card-option"></i>
                        @foreach ($company as $com)
                            <a href="{{route("setting.company.updatecompany",$com->id)}}" role="tab">Sửa thông tin</a>
                        @endforeach
                    </li>
                </ul>
            </div>
        </div>
        @include('admin.layouts.messages')
        <div class="card-block table-border-style">
            <div class="table-responsive scrollbar-custom">
                <table class="table table-hover">
                    <tbody>
                        @foreach ($company as $com)
                        <tr>
                            <td><i class="ti-agenda icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i> Tên công ty: {{$com->name_company}}</td>
                            <td><i class="ti-google icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i> Website: {{$com->website}}</td>
                        </tr>
                        <tr>
                            <td><i class="ti-email icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i>  Email: {{$com->email}}</td>
                            <td><i class="ti-facebook icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i> Fanpage: {{$com->fanpage}}</td>
                        </tr>
                        <tr>
                            <td><i class="ti-layout-column4-alt icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i> Mã số thuế: {{$com->tax_code}}</td>
                            <td><i class="ti-home icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i> Trụ sở chính: {{$com->head_quater}}</td>
                        </tr>
                        <tr>
                            <td><i class="ti-mobile icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i>Hotline: {{$com->hotline}}</td>
                            <td><i class="ti-view-list icon-theme mr-2" style="font-size: 16px; padding: 10px;"></i> Mô tả: {{$com->desc}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')

@endsection

