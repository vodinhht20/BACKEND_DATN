@extends('admin.layouts.main')
@section('title')
    <title>Chi tiết đơn từ</title>
@endsection
@section('style-page')
    <script src="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/@goongmaps/goong-js@1.0.9/dist/goong-js.css" rel="stylesheet" />
    <style>
        .text-info {
            color: #5c5a5acc !important;
        }

        #googleMap .mapboxgl-canvas {
            width: unset !important;
        }

        .image-load-center {
            display: flex;
            justify-content: center;
            align-items: center;
            flex-direction: column;
        }
        .image-load-center img {
            width: 70px;
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
    @php
        $employee = $requestData->employee;
        $requestDetail = $requestData->requestDetail;
        $singleType = $requestData->singleType;
        $requestApproveHistories = $requestData->requestApproveHistories;
    @endphp
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
                                <img src="{{ $employee->getAvatar() }}" alt="" class="avatar_list">
                                <div>
                                    <b>{{ $employee->fullname }}</b>
                                    <p style="margin: 0; color: var(--ui-outline);">{{ $employee->position->name }}</p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <div>
                                    <label for="" class="text-info">Ngày sửa công: </label><b> {{  $requestDetail->quit_work_from_at->format("d-m-Y") }}</b>
                                </div>
                                <div>
                                    <label for="" class="text-info">Bắt đầu: </label>
                                    <b>{{ $checkinOld ?: "N/A" }}</b>
                                    <i class="ti-arrow-right icon-theme" style="font-size: 12px; padding: 5px;"></i>
                                    <b>{{ $requestDetail->quit_work_from_at->format('H:i') }}</b>
                                </div>
                                <div>
                                    <label for="" class="text-info">Kết thúc: </label>
                                    <b>{{ $checkoutOld ?: "N/A" }}</b>
                                    <i class="ti-arrow-right icon-theme" style="font-size: 12px; padding: 5px;"></i>
                                    <b>{{ $requestDetail->quit_work_to_at->format('H:i') }}</b>
                                </div>
                            </div>
                            <hr>
                            <h6 class="d-flex align-items-center" style="grid-column-gap: 5px;">
                                <i class="ti-timer text-info mt-1" style="font-size: 20px;"></i>
                                <div class="mt-1">
                                    <span>Số công: </span>
                                    <strong class="" style="color: var(--ui-outline);">{{ $leaveDay }} </strong>
                                    <i class="ti-arrow-right icon-theme" style="font-size: 12px; padding: 5px;"></i>
                                    <strong class="" style="color: var(--ui-outline);">{{ $newLeaveDay }} </strong>
                                </div>
                            </h6>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <b>{{ $singleType->name }}</b>
                                    <p class="text-info">Loại đơn</p>
                                </div>
                                <div class="col-6">
                                    <b class="{{ $requestData->renderClassNameByStatus() }}">{{ $requestData->getStatusStr() }}</b>
                                    <p class="text-info">Trạng thái đơn</p>
                                </div>
                                <div class="col-6">
                                    <b>{{ $requestData->created_at->format('H:i d-m-Y') }}</b>
                                    <p class="text-info">Thời gian tạo đơn</p>
                                </div>
                                <div class="col-6">
                                    <b>#{{ $requestData->id }}</b>
                                    <p class="text-info">Mã đơn</p>
                                </div>
                            </div>
                            <hr>
                            <div>
                                <b>Lý do tạo đơn</b>
                                <p>{{ $requestDetail->content }}</p>
                            </div>
                            <hr>
                            <div>
                                <h6>Cấp duyệt</h6>
                                <div>
                                    @foreach ($approvers as $approver)
                                        <span class="mytooltip tooltip-effect-5 pt-2 pl-2" style="display: inline-block;" v-for="approver in record.approvers">
                                            <img src="{{ $approver['avatar'] }}" alt="" class="avatar_list">
                                            <span class="tooltip-content clearfix">
                                                <span class="tooltip-text text-center">{{ $approver['fullname'] }}</span>
                                            </span>
                                        </span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-xs-12">
                        @if ($requestDetail->image)
                            <div>
                                <h5>Tài liệu</h5>
                                <p>Hình ảnh, tài liệu liên quan: </p>
                                <div class="mt-2">
                                    <img src="{{ $requestDetail->getImage() }}" alt="" style="vertical-align: middle;
                                        border-style: none;
                                        width: 100%;
                                        height: 250px;
                                        border-radius: 5px;
                                        object-fit: cover;"
                                    >
                                </div>
                            </div>
                        @endif
                        <div class="mt-3">
                            <div>
                                <b>Lịch sử chấm công</b>
                            </div>
                            <div class="mt-2 scrollbar-right-custom" style="max-height: 100px;overflow-y: auto;border: 1px dashed #50b3ad;padding: 5px;border-radius: 5px;">
                                @if ($timekeep && count($timekeep->timekeepDetail) > 0)
                                    <ul>
                                        @foreach ($timekeep->timekeepDetail as $history)
                                            <li>
                                                @php
                                                    $checkin = Carbon\Carbon::parse($history->checkin_at)->format("H:i");
                                                @endphp
                                                @if ($loop->index == 0)
                                                    <span><b class="text-primary">{{ $checkin }}</b> CheckIn</span>
                                                    <span class="ml-3 text-primary" style="cursor: pointer;" onclick="showCheckinDetail({{ json_encode($history) }})" data-toggle="modal" data-target="#modal_checkin_detail">Xem chi tiết</span>
                                                @else
                                                    <span><b class="text-primary">{{ $checkin }}</b> CheckOut</span>
                                                    <span class="ml-3 text-primary" style="cursor: pointer;" onclick="showCheckinDetail({{ json_encode($history) }})" data-toggle="modal" data-target="#modal_checkin_detail">Xem chi tiết</span>
                                                @endif
                                            </li>
                                        @endforeach
                                    </ul>
                                @else
                                    <p>Không có giữ liệu chấm công</p>
                                @endif
                            </div>
                        </div>
                        <div class="mt-3">
                            <div>
                                <b>Lịch sử phê duyệt</b>
                            </div>
                            <div class="mt-2">
                                <h6>Phê duyệt</h6>
                                @if (count($requestApproveHistories) > 0)
                                    <ul>
                                        @foreach ($requestApproveHistories as $history)
                                            <li>
                                                @if ($history->status == config('request_approve_history.status.accepted'))
                                                    <span><b class="text-primary">{{ $history->employee->fullname }}</b> đã phê duyệt</span>
                                                @elseif($history->status == config('request_approve_history.status.unapproved'))
                                                    <li>
                                                        <span><b class="text-primary">{{ $history->employee->fullname }}</b> đã từ chối</span>
                                                        <p class="pl-2">Lý do: <span class="text-danger">{{ $history->reason }}</span></p>
                                                    </li>
                                                @endif
                                            </li>
                                        @endforeach
                                        @if ($requestData->status == config('request.status.accepted') || $requestData->status == config('request.status.unapproved'))
                                            <li><p class="text-primary">Hoàn tất duyệt đơn !</p></li>
                                        @endif
                                    </ul>
                                @else
                                    <p>Hiện tại chưa có thông tin phê duyệt</p>
                                @endif
                            </div>
                            <hr>
                            <div>
                                <h6>Lịch sử cập nhật đơn</h6>
                                <ul>
                                    <li>
                                        <label for="" class="text-custom">{{ $requestData->created_at->format('H:i:s d-m-Y') }}</label>
                                        <span>Đã tạo đơn</span>
                                    </li>
                                    @foreach ($requestApproveHistories as $history)
                                        <li>
                                            @if ($history->status == config('request_approve_history.status.accepted'))
                                                <label for="" class="text-custom">{{ $history->created_at->format('H:i:s d-m-Y') }}</label>
                                                <span>Đơn đã được duyệt bởi <b class="text-primary">{{ $history->employee->fullname }}</b></span>
                                            @elseif($history->status == config('request_approve_history.status.unapproved'))
                                                <li>
                                                    <label for="" class="text-custom">{{ $history->created_at->format('H:i:s d-m-Y') }}</label>
                                                    <span>Đơn đã bị từ chối bởi <b class="text-primary">{{ $history->employee->fullname }}</span>
                                                </li>
                                            @endif
                                        </li>
                                    @endforeach
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="mt-3 d-flex justify-content-center align-items-center" style="grid-column-gap: 10px;">
                    @if ($canViewApprover)
                        <button class="btn btn-primary btn-round waves-effect waves-light" id="approve">Phê duyệt</button>
                        <button class="btn btn-danger btn-round waves-effect waves-light" data-toggle="modal" data-target="#modal_unapproved">Từ chối</button>
                    @endif
                    <a href="{{ url()->previous() }}" class="btn btn-inverse btn-round waves-effect waves-light" style="color: #fff; !important">Quay lại</a>
                </div>
            </div>
        </div>
        <div class="overlay-load">
            <img src="{{asset('frontend')}}/image/loading.gif" alt="">
            <p>Vui lòng chờ ...</p>
        </div>
    </div>
    @include('admin.application.request.modal-checkin-detail')
@endsection
@section('page-script')
    <script>
        const REQUEST_ID = {{ $requestId }};
        const ACCEPT_REQUEST_URL = `{{ route('ajax-approve-request') }}`;
        $(document).ready(function () {
            $("#approve").on('click', function() {
                Swal.fire({
                    title: 'Xác nhận',
                    text: "Bạn có chắc chắn muốn phê duyệt đơn này ?",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Phê duyệt'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let data = {
                            id: REQUEST_ID,
                            status: {{ config('request_approve_history.status.accepted') }}
                        }
                        axios.post(ACCEPT_REQUEST_URL, data)
                            .then(({data}) => {
                                location.reload();
                                Swal.fire(
                                    'Thành công',
                                    'Đơn của bạn đã được duyệt',
                                    'success'
                                )
                            })
                            .catch(({response}) => {
                                Swal.fire(
                                    'Lỗi ',
                                    'Không thể duyệt đơn vào lúc này',
                                    'error'
                                )
                            })
                    }
                })
            })

            $("#submit_unapproved").on('click', function() {
                Swal.fire({
                    title: 'Xác nhận',
                    text: "Bạn chắc chắn muốn từ chối đơn này !",
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let data = {
                            id: REQUEST_ID,
                            status: {{ config('request_approve_history.status.unapproved') }},
                            reason: $("#text_reason").val()
                        }
                        axios.post(ACCEPT_REQUEST_URL, data)
                            .then(({data}) => {
                                location.reload();
                                Swal.fire(
                                    'Thành công',
                                    'Bạn đã từ chối đơn này !',
                                    'success'
                                )
                            })
                            .catch(({response}) => {
                                Swal.fire(
                                    'Lỗi ',
                                    data.message || 'Không thể từ chối đơn này',
                                    'error'
                                )
                            })
                    }
                })
            })
        });

        function showCheckinDetail(data) {
            $("#IP").text(data.ip);
            $("#checkinAt").text(data.checkin_at);
            $("#googleMap").html(`<img src="{{asset('frontend')}}/image/loading.gif" alt=""><span>Đang tải dữ liệu từ Google Map ...</span>`);
            $("#googleMap").addClass("image-load-center");
            setTimeout(() => {
                $("#googleMap").html("");
                $("#googleMap").removeClass("image-load-center");
                goongjs.accessToken = '{{ env('GOONG_IO_MAP_KEY') }}';
                var map = new goongjs.Map({
                    container: 'googleMap',
                    style: 'https://tiles.goong.io/assets/goong_map_web.json',
                    center: [data.longitude, data.latitude],
                    zoom: 17
                });

                var marker = new goongjs.Marker()
                    .setLngLat([data.longitude, data.latitude])
                    .addTo(map);
            }, 2000);
        }
    </script>
@endsection
