@extends('admin.layouts.main')
@section('title')
    <title>Chi tiết đơn từ</title>
@endsection
@section('style-page')
    <style>
        .text-info {
            color: #5c5a5acc !important;
        }
    </style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Phê duyệt đơn</h5>
                    <p class="m-b-0">Chi tiết đơn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Đơn từ</a>
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
                <h4>Chi tiết đơn</h4>
            </div>
            <div class="card-block">
                <div class="row">
                    <div class="col-lg-6 col-xs-12">
                        <h5>
                            Thông tin đơn
                        </h5>
                        <div>
                            <div class="mt-2 d-flex align-items-center" style="grid-column-gap: 10px;">
                                <img src="" alt="" class="avatar_list">
                                <div>
                                    <b>Võ Văn Định</b>
                                    <p style="margin: 0; color: var(--ui-outline);">Software Engine</p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div>
                                    <label for="" class="text-info">Bắt đầu nghỉ: </label>
                                    <b>23/07/2022</b>
                                </div>
                                <div>
                                    <label for="" class="text-info">Kết thúc nghỉ: </label>
                                    <b>23/07/2022</b>
                                </div>
                            </div>
                            <hr>
                            <h6 class="d-flex align-items-center" style="grid-column-gap: 5px;">
                                <i class="ti-timer text-info mt-1" style="font-size: 20px;"></i>
                                <div class="mt-1">
                                    <span>Tổng số công nghỉ: </span>
                                    <strong class="" style="color: var(--ui-outline);">4</strong>
                                </div>
                            </h6>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <b>Đơn nghỉ không lương</b>
                                    <p class="text-info">Loại đơn</p>
                                </div>
                                <div class="col-6">
                                    <b class="text-primary">Chờ xử lý</b>
                                    <p class="text-info">Trạng thái đơn</p>
                                </div>
                                <div class="col-6">
                                    <b>22/07/2022</b>
                                    <p class="text-info">Thời gian tạo đơn</p>
                                </div>
                                <div class="col-6">
                                    <b>#10703</b>
                                    <p class="text-info">Mã đơn</p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <b>Lý do tạo đơn</b>
                                <p>Xin được nghỉ chăm vợ</p>
                            </div>
                            <hr>
                            <div>
                                <h6>Cấp duyệt</h6>
                                <div>
                                    ádsadd
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        <h5>
                            Lịch sử phê duyệt
                        </h5>
                        <div class="mt-2">
                            <h6>Phê duyệt</h6>
                            <p>Hiện tại chưa có thông tin phê duyệt</p>
                        </div>
                        <hr>
                        <div>
                            <h6>Lịch sử cập nhật đơn</h6>
                            <ul>
                                <li>
                                    <label for="" class="text-custom">20:04:56 24/07/2022</label>
                                    <span>Đã tạo đơn</span>
                                </li>
                                <li>
                                    <label for="" class="text-custom">20:04:56 24/07/2022</label>
                                    <span>Đơn đã được duyệt bởi</span>
                                </li>
                                <li>
                                    <label for="" class="text-custom">20:04:56 24/07/2022</label>
                                    <span>Đơn đã bị từ chối</span>
                                    <p class="text-danger">Lý do: Đơn không hợp lệ</p>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center align-items-center" style="grid-column-gap: 10px;">
                    <button class="btn btn-primary btn-round waves-effect waves-light">Phê duyệt</button>
                    <button class="btn btn-danger btn-round waves-effect waves-light">Từ chối</button>
                    <a href="{{ url()->previous() }}" class="btn btn-inverse btn-round waves-effect waves-light" style="color: #fff; !important">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="overlay-load">
            <img src="{{asset('frontend')}}/image/loading.gif" alt="">
            <p>Vui lòng chờ ...</p>
        </div>
    </div>
@endsection
@section('page-script')

@endsection
