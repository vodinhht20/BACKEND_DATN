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
    <div class="branchs">
        <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
            <li class="nav-item">
                <a class="nav-link" href="{{ route('company.info') }}" role="tab" aria-expanded="false">
                    <i class="ti-layout-media-overlay"></i><br>
                    Thông tin <br> công ty</a>
            </li>
            <li class="nav-item btn-item active">
                <a class="nav-link" href="{{ route('company.branchs') }}" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Hệ thống <br> chi nhánh</a>
            </li>
            <li class="nav-item btn-item">
                <a class="nav-link" href="{{ route('company.structure') }}" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Cơ cấu <br> tổ chức</a>
            </li>
        </ul>
        <div class="tab-pane" id="profile5" role="tabpanel">
            <div style="overflow-x: auto;" class="card">
                <div class="card-header">
                    <h5>Hệ thống chi nhánh</h5>
                    <div style="display: block;" class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li class="nav-item">
                                <i class="fa fa fa-wrench open-card-option"></i>
                                <a href="{{route("company.addbranch")}}" role="tab">Thêm chi nhánh</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card-block table-border-style">
                    <div class="table-responsive scrollbar-custom">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>Tên chi nhánh</th>
                                    <th>Mã chi nhánh</th>
                                    <th>Địa chỉ nhánh</th>
                                    <th>Hotline</th>
                                    <th>Vĩ độ</th>
                                    <th>Kinh độ</th>
                                    <th>Bán kính</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($bran as $b)
                                <tr>
                                    <td>{{$b->name}}</td>
                                    <td>{{$b->code_branch}}</td>
                                    <td>{{$b->address}}</td>
                                    <td>{{$b->hotline}}</td>
                                    <td>{{$b->latitude}}</td>
                                    <td>{{$b->longtitude}}</td>
                                    <td>{{$b->radius}}</td>
                                    <td><a href="{{route('company.delete',$b->id)}}"><i class="ti-trash"></i></a> <a href="{{route("company.updatebranch", $b->id)}}"><i style="float: right" class="ti-pencil"></i></a></td>
                                    {{-- <td><form class="delete-form" href="{{route('company.delete',$b->id)}}" method="POST">
                                        @method('DELETE')
                                        @csrf
                                        <i class="ti-trash"></i>
                                    </form></td> --}}
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    {{$bran->links()}}
                </div>
            </div>
        </div>
    </div>
@endsection