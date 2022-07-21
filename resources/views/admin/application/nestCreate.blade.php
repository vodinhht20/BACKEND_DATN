@extends('admin.layouts.main')
@section('title')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <title>Thêm loại đơn</title>
@endsection
@section('style-page')
    <style>
        .mx-datepicker-range, .mx-datepicker {
        width: 100%;
        }
        .modal-create-schedule input{
            text-align: center;
        }
        .select2-container {
            z-index: 99999999;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #11c15b !important;
            border: none !important;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove {
            border-right: none !important;
        }

        .select2-container--default.select2-container--focus .select2-selection--multiple {
            border: solid var(--ui-outline) 1px !important;
        }

        .select2-container--default .select2-selection--multiple {
            border-color: #cccccc !important;
            height: 35.5px !important;
        }

        .select2-container--default .select2-selection--multiple .select2-selection__choice__remove:hover {
            background-color: rgb(240, 44, 44) !important;
        }

        .select2-container {
            z-index: 99 !important;
        }
    </style>
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
    <div id="app">
        <div class="card">
            <div class="card-header">
                <h5>Thêm mới loại đơn từ</h5>
                <span>Thiết lập các thuộc tính cho đơn</span>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block row">
                <div class="col-lg-7 col-xs-12">
                    <form action="{{ route('application-nest-post-create') }}" method="POST" id="form-create">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-6 col-sx-12">
                                <label class="">Tên loại đơn <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" value="{{ old('name') }}" name="name" placeholder="Nhập tên loại đơn ...">
                            </div>
                            <div class="form-group col-lg-6 col-sx-12">
                                <label class="">Mẫu đơn <span class="text-danger">*</span></label>
                                <select name="type" class="form-control" id="">
                                    @foreach (config('singletype.type') as  $id => $typeName)
                                        <option value="{{ $id }}" @checked(old('type') == $id)>{{ $typeName }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12">
                                <label class="">Người duyệt đơn <span class="text-danger">*</span></label>
                                <select name="employee_id[]" class="form-control" id="select_approvers" multiple="multiple">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">[{{ $employee->id }}] {{ $employee->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-12 d-flex">
                                <input type="checkbox" @checked(old('required_leader')) value='1' name="required_leader" class="mr-2" style="
                                    width: 18px;
                                    height: 18px;
                                    cursor: pointer;
                                ">
                                <label class="">Cho phép quản lý trực tiếp của người tạo đơn phê duyệt</label>
                            </div>
                            <div class="form-group col-12">
                                <label class="">Quy trình duyệt đơn <span class="text-danger">*</span></label>
                                <textarea name="regulation" class="form-control" cols="30" rows="7" placeholder="Mô tả quy trình duyệt loại đơn này ...">{{ old('regulation') }}</textarea>
                            </div>
                            <div class="form-group col-12">
                                <label class="">Mô tả <span class="text-danger">*</span></label>
                                <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Thông tin loại đơn này dùng để làm gì ...">{{ old('description') }}</textarea>
                            </div>
                            <div class="text-center form-group col-12">
                                <button type="submit"class="btn btn-primary btn-round waves-effect waves-light">Thêm mới</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-lg-5 col-xs-12">
                    <blockquote class="blockquote">
                        <p class="m-b-0">Thông tin các mẫu đơn:</p>
                        <ul class="mt-2">
                            @foreach (config('singletype.type') as $key => $singleTypeName)
                                <li>
                                    <p style="margin: 0;"><b>{{ $singleTypeName }}</b></p>
                                    <p>{{ config('singletype.type_info.' . $key) }}</p>
                                </li>
                            @endforeach
                        </ul>
                    </blockquote>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script  type="text/javascript">
        $(document).ready(function () {
            $('#select_approvers').select2({
                placeholder: "Lựa chọn người duyệt đơn ..."
            });

            const objData = {
                rules: {
                    name: "required",
                    type: "required",
                    regulation: "required",
                    description: "required",
                },
                messages: {
                    name: `<span class="text-validate">Vui lòng nhập tên loại đơn !</span>`,
                    type: `<span class="text-validate">Vui lòng lựa chọn mẫu đơn !</span>`,
                    regulation: `<span class="text-validate">Vui lòng nhập thông tin trình duyệt đơn !</span>`,
                    description: `<span class="text-validate">Vui lòng nhập thông tin mô tả !</span>`,
                }
            }
            validateForm("#form-create", objData);
        });
    </script>
@endsection