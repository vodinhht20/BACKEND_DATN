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
            <div class="card-header" style="box-shadow: unset;">
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
            <!-- Tab panes -->
            <div class="tab-content tabs card-block">
                <div class="tab-pane active" id="type" role="tabpanel">
                    <div>
                        <p>Có 10 loại đơn trong danh sách</p>
                    </div>
                    <div class="table-border-style">
                        <div class="table-responsive scrollbar-custom" style="width:100%;">
                            <table class="table align-middle-td">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Tên loại đơn</th>
                                        <th>Mô tả</th>
                                        <th>Quy định tạo đơn</th>
                                        <th>Người duyệt đơn</th>
                                        <th>Trạng thái áp dụng</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($singleTypes as $singleType)
                                        <tr></tr>
                                    @endforeach
                                    @if (true)
                                        <tr>
                                            <td colspan="6" class="box_data_empty">
                                                <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                <div class="tab-pane" id="deathline" role="tabpanel">

                </div>
                <div class="tab-pane" id="dafuk" role="tabpanel">

                </div>
            </div>
        </div>
    </div>
@endsection
