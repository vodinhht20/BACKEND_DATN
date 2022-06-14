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
    <div class="col-lg-12 col-xl-6">
        <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
            <li class="nav-item active">
                <a class="nav-link" href="#home5" role="tab" aria-expanded="false">
                    <i class="ti-layout-media-overlay"></i><br>
                    Thông tin <br> công ty</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("company.branchs")}}" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Hệ thống <br> chi nhánh</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{route("company.structure")}}" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Cơ cấu <br> tổ chức</a>
            </li>
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabs-left-content card-block">
            <div class="tab-pane active" id="home5" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5>Thông tin công ty</h5>
                        <div style="display: block;" class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li class="nav-item"><i class="fa fa fa-wrench open-card-option"></i>
                                    @foreach ($company as $com)
                                        <a href="{{route("company.updatecompany",$com->id)}}" role="tab">Sửa thông tin</a>
                                    @endforeach
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive scrollbar-custom">
                            <table class="table table-hover">
                                <tbody>
                                    @foreach ($company as $com)
                                    <tr>
                                        <td><i class="ti-agenda"></i> Tên công ty: {{$com->name_company}}</td>
                                        <td><i class="ti-google"></i> Website: {{$com->website}}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-email"></i>  Email: {{$com->email}}</td>
                                        <td><i class="ti-facebook"></i> Fanpage: {{$com->fanpage}}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-layout-column4-alt"></i> Mã số thuế: {{$com->tax_code}}</td>
                                        <td><i class="ti-home"></i> Trụ sở chính: {{$com->head_quater}}</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-mobile"></i>Hotline: {{$com->hotline}}</td>
                                        <td><i class="ti-view-list"></i> Mô tả: {{$com->desc}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')

@endsection

