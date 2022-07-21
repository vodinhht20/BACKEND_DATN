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
                    <h5 class="m-b-10">Thiết lập loại đơn từ</h5>
                    <p class="m-b-0">Các đơn này sẽ được các thành viên sử dụng cho các mục đích của loại đơn</p>
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
    <div class="row" id="app">
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h5>Thêm mới loại đơn từ</h5>
                    <span>Thiết lập các thuộc tính cho đơn</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="{{ route('schedule-calendar-holiday-insert') }}" method="POST" id="form-create">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6 col-sx-12">
                                <label class="">Tên loại đơn<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Nhập tên ngày lễ ...">
                            </div>
                            <div class="form-group col-lg-6 col-sx-12">
                                <label class="">Mẫu đơn<span class="text-danger">*</span></label>
                            </div>
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