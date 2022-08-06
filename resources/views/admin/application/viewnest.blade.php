@extends('admin.layouts.main')
@section('title')
    <title>Loại Sản Phẩm | Danh sách</title>
@endsection
@section('style-page')
    <style>
        th, td {
            white-space: unset;
        }
        .slider.round {
            height: 28px;
        }
        .slider:before {
            left: 5px;
            bottom: 2px;
            height: 24px;
        }

        .text-description {
            border: 1px dashed #d3caca;
            background-color: #efefed;
            padding: 10px;
            border-radius: 5px;
        }
        .mytooltip:hover .tooltip-content4 {
            padding-top: 30px !important;
        }

        body {
            padding-right: unset !important;
        }
    </style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản Lý Đơn Từ</h5>
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
                <h5 class="card-header-text">Danh sách các loại đơn</h5>
            </div>
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-10">
                        <p>Có <b>{{ $singleTypes->total() }}</b> loại đơn trong danh sách</p>
                    </div>
                    <div class="col-2" style="float: right;">
                        <a href="{{ route('application-nest-create') }}" class="btn btn-outline-primary btn-round waves-effect btn-sm waves-light mr-3" style="padding-top: 10px; float: right;">
                            <i class="ti-plus"></i>
                            Thêm mới
                        </a>
                    </div>
                </div>
                @include('admin.layouts.messages')
                <div class="table-border-style mt-2">
                    <div class="scrollbar-custom" style="width:100%;">
                        <table class="table align-middle-td">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Tên loại đơn</th>
                                    <th>Người duyệt đơn</th>
                                    <th>Loại Template</th>
                                    <th>Mô tả</th>
                                    <th>Quy định tạo đơn</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($singleTypes as $singleType)
                                    <tr class={{ (Session::has('message.success') && session('id_new') && session('id_new') == $singleType->id ) ?'bg-green':'' }}>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td style="width: 200px;">{{ $singleType->name }}</td>
                                        <td style="width: 300px;">
                                            @if ($singleType->required_leader)
                                                <label for="" class="label label-primary" > Yêu cầu leader duyệt
                                                </label>
                                            @endif
                                            <ul class="mt-2 list-tag" style="list-style-type: circle;">
                                                @foreach ($singleType->approvers as $approver)
                                                    <li class="ellipsis">
                                                        <a href="" style="color: #448aff;" title="{{ $approver->employee->fullname }}">[{{ $approver->employee->employee_code }}]
                                                            {{ $approver->employee->fullname }}
                                                        </a>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            @if (count($singleType->approvers) == 0)
                                                <p>Người duyệt đơn chưa thiết lập</p>
                                            @endif
                                        </td>
                                        <td style="width: 200px;">
                                            <label for="" class="label label-inverse-primary">{{ config("singletype.type_info.$singleType->type.title") }}</label>
                                        </td>
                                        <td style="width: 400px;">
                                            {{ formartString($singleType->description, 100) }}
                                            @if (strlen($singleType->description) > 50)
                                                <span class="mytooltip tooltip-effect-1" style="color: #6d95dd;">
                                                    <span class="tooltip-item2" style="font-weight: 500;">Xem thêm</span>
                                                    <span class="tooltip-content4 scrollbar-right-custom" style="height: 210px; overflow-y: auto; border-bottom-color: #88b3fb;">
                                                        {{ $singleType->description }}
                                                    </span>
                                                </span>
                                            @endif
                                        </td>
                                        <td style="width: 400px;">
                                            {{ formartString($singleType->regulation, 100) }}
                                            @if (strlen($singleType->regulation) > 50)
                                                <span class="mytooltip tooltip-effect-1" style="color: #6d95dd;">
                                                    <span class="tooltip-item2" style="font-weight: 500;">Xem thêm</span>
                                                    <span class="tooltip-content4 scrollbar-right-custom" style="height: 210px; overflow-y: auto; border-bottom-color: #88b3fb;">
                                                        {{ $singleType->regulation }}
                                                    </span>
                                                </span>
                                            @endif
                                        </td>
                                        <td style="width: 100px;">
                                            <label class="switch">
                                                <input type="checkbox" class="value-status change-status" data-id="{{$singleType->id}}" @if ($singleType->status) checked @else @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td></td>
                                    </tr>
                                @endforeach
                                @if (count($singleTypes) == 0)
                                    <tr>
                                        <td colspan="6" class="box_data_empty">
                                            <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div style="float: right;" class="pagination_cutomize">
                        {{ $singleTypes->links() }}
                    </div>
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
    <script>
        $(document).ready(function () {
            $('.change-status').on('click', async function (e) {
                Swal.fire({
                    title: '<h3 class="mt-2">Xác nhận thay đổi trạng thái</h3>',
                    showCancelButton: true,
                    confirmButtonText: 'Đồng ý'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $('.overlay-load').css('display', 'flex');
                        let data = {
                            id: $(this).attr("data-id"),
                            status: e.target.checked ? 1 : 0
                        }
                        axios.post("{{route('application-nest-change-status')}}", data).then(res => {
                            Swal.fire({
                                title: 'Thành công',
                                text: 'Trạng thái đã được thay đổi',
                                icon: 'success'
                            })
                            $('.overlay-load').css('display', 'none');
                        }).catch(({response}) => {
                            e.target.checked = !e.target.checked;
                            Swal.fire(
                                'Thất bại',
                                response.data.message,
                                'error'
                            );
                            $('.overlay-load').css('display', 'none');
                        })
                        return;
                    }
                    e.target.checked = !e.target.checked;
                })
            })
        });
    </script>
@endsection
