@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Thêm Mới</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/branchs.css">
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
    <div class="">
        <div class="card">
            <div class="card-header" style="box-shadow: unset;">
                <h5>Hệ thống chi nhánh</h5>
                <p>Hệ thống các chi nhánh trong công ty của bạn</p>
                <div style="display: block;" class="card-header-right">
                    <a href="{{route("setting.branch.addbranch")}}" class="btn btn-outline-primary btn-round waves-effect btn-sm waves-light mr-3">
                        <i class="ti-plus" style="color: unset;"></i> Thêm mới
                    </a>
                </div>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block table-border-style">
                <div class="table-responsive scrollbar-custom">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tên chi nhánh</th>
                                <th>Địa chỉ nhánh</th>
                                <th>Vị trí</th>
                                <th>Hotline</th>
                                <th>Bán kính</th>
                                <th class="text-center">Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($bran as $b)
                            <tr>
                                <td>
                                    <label for="" class="label label-primary">code: {{$b->code_branch}}</label> <p class="ellipsis">{{$b->name}}</p>
                                </td>
                                <td><p class="ellipsis">{{$b->address}}</p></td>
                                <td>
                                    Kinh độ: <label for="" class="label label-inverse-success">{{$b->longtitude}}</label>
                                    <br>
                                    Vĩ độ: <label for="" class="label label-inverse-success ml-3">{{$b->latitude}}</label>
                                </td>
                                <td>{{$b->hotline}}</td>
                                <td><label for="" class="label label-inverse-info">{{$b->radius}} Meter</label></td>
                                <td class="text-center">
                                    <a href="{{route("setting.branch.updatebranch", $b->id)}}" title="Chỉnh sửa">
                                        <i class="ti-pencil icon-edit-primary"></i>
                                    </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div style="float: right;" class="pagination_cutomize">
                    {{$bran->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection
