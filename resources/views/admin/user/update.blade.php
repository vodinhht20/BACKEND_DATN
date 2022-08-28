@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Sửa thông tin</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.min.css">
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị thành viên</h5>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Thành viên</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="row">
        <div class="col-sm-12">
            <div class="card" id="app">
                <div class="card-header">
                    <h5>Cập nhật thông tin thành viên</h5>
                    <span>Thay đổi thông tin thành viên</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="" method="POST" id="form-create"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-12 form-group mb-2">
                                <label class="col-form-label">Ảnh đại diện</label>
                                <div style="width: 300px;margin: auto;text-align: center;">
                                    <img id="preview_image" src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}"  class="mb-2"/>
                                    <input type="file" name="avatar" id="avatar" onchange="loadFile(event)">
                                </div>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Mã nhân viên</label>
                                <input type="text" class="form-control data-input" value="{{ $employee->employee_code }}" disabled>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Họ & Tên <span class="text-danger">*</span></label>
                                <input type="text" class="form-control data-input" name="fullname" value="{{ $employee->fullname }}" placeholder="Nhập họ và tên thành viên">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Ngày sinh <span class="text-danger">*</span></label>
                                <input type="date" class="form-control data-input" value="{{ $employee->birth_day }}" name="birth_day" placeholder="Nhập ngày sinh">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Email công ty</label>
                                <input type="text" class="form-control data-input" value="{{ $employee->email }}" name="email" placeholder="Nhập email công ty">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Số điện thoại <span class="text-danger">*</span></label>
                                <input type="text" class="form-control data-input" value="{{ $employee->phone }}" name="phone" placeholder="0912345678">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Email cá nhân</label>
                                <input type="text" class="form-control data-input" value="{{ $employee->personal_email }}" name="personal_email" placeholder="Nhập email cá nhân">
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Giới tính <span class="text-danger">*</span></label>
                                <select name="gender" id="" class="form-control data-input">
                                    @foreach (config('global.gender') as $key => $gender)
                                        <option value="{{$gender}}" @if($employee->gender == $gender) selected="selected" @endif>{{$key}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label for="" class="col-form-label">Vị trí phòng ban <span class="text-danger">*</span></label>
                                <input type="hidden" name="position" :value="departmentValue">
                                <treeselect v-model="departmentValue" :options="departments" :disable-branch-nodes="true"/>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Chi nhánh <span class="text-danger">*</span></label>
                                <select name="branch_id" id="" class="form-control data-input">
                                    @foreach ($branchs as $branch)
                                        <option value="{{ $branch->id }}" @if($employee->branch_id == $branch->id) selected="selected" @endif>{{ $branch->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label class="col-form-label">Trạng thái điểm danh <span class="text-danger">*</span></label>
                                <select name="is_checked" id="" class="form-control data-input">
                                    <option value="1">Được phép điểm danh</option>
                                    <option value="0" @if(!$employee->is_checked) selected="selected" @endif>Không được phép điểm danh</option>
                                </select>
                            </div>
                            <div class="col-sm-12 form-group">
                                <label class="col-form-label">Địa chỉ <span class="text-danger">*</span></label>
                                <textarea class="form-control data-input" cols="30" rows="1" name="address" placeholder="Nhập địa chỉ hiện tại ...">{{ $employee->address }}</textarea>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p class="text-primary"><strong>Thông tin thêm</strong></p>
                            </div>

                            @foreach ($attributes as $attribute)
                                @php
                                    $attributeValue = '';
                                    if (isset($attributeEmployees[$attribute->id])) {
                                        $attributeValue = $attributeEmployees[$attribute->id]?->data ?: '';
                                    }
                                @endphp
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{ $attribute->description }}</label>
                                        <input name="atribute[{{ $attribute->name }}]" value="{{ $attributeValue }}" type="{{getDataType($attribute->data_type)}}" class="form-control data-input" placeholder="Vui lòng nhập thông tin ...">
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p class="text-primary"><strong>Giới thiệu bản thân</strong></p>
                            </div>
                            <div class="col-sm-12">
                                <div class="form-group">
                                    <textarea name="note" class="form-control data-input" cols="30" rows="5" placeholder="Giới thiệu bản thân ..."></textarea>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Cập nhật</button>
                        </div>
                    </form>
                    <div class="overlay-load">
                        <img src="{{asset('frontend')}}/image/loading.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.umd.min.js"></script>
<script>
    Vue.component('treeselect', VueTreeselect.Treeselect);
    var app = new Vue({
        el: '#app',
        data: {
            departmentValue: '{{ "position_" . $employee->position_id }}',
            departments: {!! json_encode($departments) !!}
        },
        methods: {

        }
    });
    var loadFile = function(event) {
        var reader = new FileReader();
        reader.onload = function(){
            var output = document.getElementById('preview_image');
            output.src = reader.result;
        };
        reader.readAsDataURL(event.target.files[0]);
    };

    const objData = {
      rules: {
        fullname: "required",
        phone: "required",
        personal_email: {
            email: true
        },
        birth_day: {
            required:true,
            date: true
        },
        gender: "required",
        branch_id: "required",
        address: "required",
      },
      messages: {
        fullname: `<span class="text-validate">Vui lòng nhập họ và tên</span>`,
        personal_email: {
            email: `<span class="text-validate">Vui lòng nhập đúng định dạng email</span>`
        },
        phone: {
            required: `<span class="text-validate">Vui lòng nhập số điện thoại</span>`
        },
        birth_day:{
            required: `<span class="text-validate">Vui lòng nhập ngày sinh</span>`,
            date: `<span class="text-validate">Vui lòng nhập đúng định dạng ngày tháng</span>`
        },
        gender: `<span class="text-validate">Vui lòng chọn trạng thái</span>`,
        is_checked: `<span class="text-validate">Trạng thái điểm danh không được để trống</span>`,
        branch_id: `<span class="text-validate">Vui lòng chọn chi nhánh</span>`,
        address: `<span class="text-validate">Vui lòng nhập địa chỉ hiện tại</span>`,
      }
    }
    validateForm("#form-create", objData);
</script>
@endsection
