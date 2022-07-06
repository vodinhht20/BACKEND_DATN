@extends('admin.layouts.main')
@section('title')
<title>Lịch nghỉ lễ</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <style>
        .mx-datepicker {
            width: 100% !important;
        }
    </style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản lý ngày nghỉ lễ</h5>
                    <p class="m-b-0">Thiết lập các ngày nghỉ lễ trong năm</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Lịch nghỉ lễ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div id="app">
        <div class="card">
            <div class="card-header">
                <div class="row align-items-center unset-width">
                    <div class="col-8">
                        <h4>Danh sách ngày nghỉ lễ</h4>
                    </div>
                    <div class="col-4">
                        <a href="{{ route("schedule-calendar-holiday-create") }}" class="btn btn-outline-primary btn-round waves-effect waves-light" style="float: right; margin-right: 10px;">
                            <i class="ti-plus"></i>
                            Thêm mới
                        </a>
                    </div>
                </div>
                <form action="" class="mt-3">
                    <div class="row unset-width">
                        <div class="form-group col-lg-12">
                            <input type="text" name="name" placeholder="Nhập tên ngày nghỉ lễ..." filter="name" class="form-control filter-data" value="{{ request()->name }}">
                        </div>
                        <div class="col-lg-4">
                            <date-picker v-model="inpYear" lang="vn" value-type="YYYY" format="YYYY" type="year" placeholder="Lựa chọn năm"></date-picker>
                        </div>
                        <div class="form-group col-lg-4">
                            <button class="btn btn-primary btn-sm">Tìm Kiếm</button>
                        </div>
                    </div>
                </form>
                <p>Có <b>{{ $holidaySchedules->total() }}</b> ngày nghỉ lễ</p>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block table-border-style" id="data-table">
                <div class="">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th class="text-center">STT</th>
                                <th class="text-center">Tên ngày nghỉ lễ</th>
                                <th class="text-center">Ngày nghỉ lễ</th>
                                <th class="text-center">Hành động</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($holidaySchedules as $holidaySchedule)
                                <tr class={{ (Session::has('message.success') && session('id_new') && session('id_new') == $holidaySchedule->id ) ?'bg-green':'' }} >
                                    <td class="text-center">{{ $loop->index+1 }}</td>
                                    <td class="text-center">{{ $holidaySchedule->name }}</td>
                                    <td class="text-center">
                                        {{ $holidaySchedule->date_from }}
                                        @if ($holidaySchedule->date_from != $holidaySchedule->date_to)
                                            -
                                            {{ $holidaySchedule->date_to }}
                                        @endif
                                    </td>
                                    <td class="text-center">
                                        <div class="dropdown">
                                            <button class="btn btn-sm btn-show-more" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Xem thêm" style="padding-bottom: 4px !important;">
                                                <i class="ti-more-alt"></i>
                                            </button>
                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                <a class="dropdown-item" href="">Chỉnh sửa</a>
                                                <a class="dropdown-item" href="">Xóa ngày nghỉ</a>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                            @if (count($holidaySchedules) == 0)
                                <tr>
                                    <td colspan="4" class="box_data_empty">
                                        <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="paginate row justify-content-center mt-3">
                    {{ $holidaySchedules->appends(request()->all()) }}
                </div>
                <div class="overlay-load">
                    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script>
        var app = new Vue({
            el: '#app',
            data: {
                current_tab: "timesheet",
                inpYear: `{{ request()->date && request()->date != '' ? request()->date : '' }}`
            }
        });
    </script>
@endsection