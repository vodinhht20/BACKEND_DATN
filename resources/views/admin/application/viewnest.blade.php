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
                        <p>Có <b>{{ count($singleTypes) }}</b> loại đơn trong danh sách</p>
                    </div>
                    <div class="table-border-style">
                        <div class="table-responsive scrollbar-custom" style="width:100%;">
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
                                        <tr>
                                            <td>{{ $loop->index+1 }}</td>
                                            <td style="width: 200px;">{{ $singleType->name }}</td>
                                            <td style="width: 300px;">
                                                @if ($singleType->required_leader)
                                                    <label for="" class="label label-primary"> Yêu cầu leader duyệt</label>
                                                    <hr>
                                                    Người duyệt cấp 2:
                                                @endif
                                                @foreach ($singleType->approvers as $approver)
                                                    <label for="" class="label label-lg label-inverse-primary mt-2">
                                                        [{{ $approver->employee->employee_code }}]
                                                        {{ $approver->employee->fullname }}
                                                    </label>
                                                @endforeach
                                            </td>
                                            <td style="width: 200px;">
                                                {{ config('singletype.type.' . $singleType->type) }}
                                            </td>
                                            <td style="width: 400px;">
                                                {{ $singleType->description }}
                                            </td>
                                            <td style="width: 400px;">
                                                {{ $singleType->regulation }}</td>
                                            <td>
                                                <label class="switch">
                                                    <input type="checkbox" class="value-status" data-id="{{$singleType->id}}" @if ($singleType->status) checked @else @endif>
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
