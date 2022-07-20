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
    <div class="box-section-timesheet">
        <div class="card">
            <div class="active card-header">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs default-tab tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" data-toggle="tab" data-target="#type" aria-controls="type" aria-expanded="true" role="tab" >Danh Sách Các Loại Đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#deathline" aria-controls="deathline" aria-expanded="false" role="tab" >Thiết Lập Hạn Chốt Đơn</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-toggle="tab" href="#dafuk" aria-controls="dafuk" aria-expanded="false" role="tab" >Thiết lập hạn chốt đơn OT</a>
                    </li>
                </ul>
            </div>
            <div class="tab-content tabs card-block">
                <div class="main-search morphsearch-search open">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Enter Keyword" style="width: 200px; background: transparent">
                        <button style="background: none; border: none; margin-left: -30px " > <span class="input-group-append "><i class="ti-search input-group-text"></i></span></button>

                    </div>
                </div>
               <div class="form-group row">
                <div class="col-sm-2">
                    <select name="" id="" class="form-control">
                        <option value="opt 1">Lựa chọn 1</option>
                        <option value="opt 2"></option>
                        <option value="opt 3"></option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select name="" id="" class="form-control">
                        <option value="opt 1">Lựa chọn 1</option>
                        <option value="opt 2"></option>
                        <option value="opt 3"></option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select name="" id="" class="form-control">
                        <option value="opt 1">Lựa chọn 1</option>
                        <option value="opt 2"></option>
                        <option value="opt 3"></option>
                    </select>
                </div>
                <div class="col-sm-3">
                    <select name="" id="" class="form-control">
                        <option value="opt 1">Lựa chọn 1</option>
                        <option value="opt 2"></option>
                        <option value="opt 3"></option>
                    </select>
                </div>
               </div>
               <div class="form-froup row">
                <div class="col-sm-12 col-xl-4 m-b-30">
                    <h4 class="sub-title">Thời Gian Tạo ĐƠn</h4>
                    <input class="form-control" type="date">
                </div>
                <div class="col-sm-12 col-xl-4 m-b-30">
                    <h4 class="sub-title">Thời Gian Áp Dụng</h4>
                    <input class="form-control" type="date">
                </div>
               </div>
               <h5>Có .... Đơn </h5>
               <div class="table-responsive">
                <table id="simpletable" class="table table-striped table-bordered nowrap ">
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>
                                <div class="dropdown">
                                    <button class="btn btn-primary" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <i class="fa-solid fa-ellipsis m-0"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton" x-placement="bottom-start" style="position: absolute; transform: translate3d(0px, 20px, 0px); top: 0px; left: 0px; will-change: transform;">
                                        <a class="dropdown-item" href="#">Xem Chi Tiết Đơn</a>
                                    </div>
                                </div>
                            </td>
                        </tr>

                    </tbody>
                </table>
               </div>
            </div>
        </div>
    </div>
@endsection

@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css">
@endsection


