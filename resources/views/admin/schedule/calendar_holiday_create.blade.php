@extends('admin.layouts.main')
@section('title')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <title>Thêm ngày nghỉ lễ</title>
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
    <div class="row" id="app">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm ngày nghỉ lễ</h5>
                    <span>Ngày nghỉ lễ hàng năm</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="{{ route('schedule-calendar-holiday-insert') }}" method="POST" id="form-create">
                        @csrf
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Tên ngày lễ <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Nhập tên ngày lễ ...">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-2 col-form-label">Ngày nghỉ lễ <span class="text-danger">*</span></label>
                            <div class="col-sm-10">
                                <date-picker v-model="intervalDay" lang="vn" range value-type="YYYY-MM-DD" format="DD-MM-YYYY"  placeholder="Lựa chọn khoảng thời gian"></date-picker>
                                <input type="hidden" name="interval_day" :value="intervalDay" />
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Tạo mới</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script  type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                intervalDay: ""
            }
        });
        const objData = {
            rules: {
                name: "required",
                date: "required",
            },
            messages: {
                name: `<span class="text-validate">Vui lòng nhập tên ngày nghỉ lễ</span>`,
                date: `<span class="text-validate">Vui lòng lựa chọn khoảng ngày nghỉ</span>`,
            }
        }
        validateForm("#form-create", objData);
    </script>
@endsection