@extends('admin.layouts.main')
@section('title')
    <title>Nhân viên | Thay đổi thông tin nhân viên</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị nhân viên</h5>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Nhân viên</a>
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
            <div class="card">
                <div class="card-header">
                    <h5>Cập nhật thông tin nhân viên</h5>
                    <span>Thay đổi thông tin nhân viên</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="{{ route('post-update-user', ['id' => $user->id]) }}" method="POST" id="form-create"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Họ & Tên<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->name }}" name="name" placeholder="Nhập họ và tên nhân viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->email }}" name="email" placeholder="Nhập email nhân viên">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Ngày sinh</span></label>
                                    <div class="">
                                        <input type="date" class="form-control data-input" value="{{ $user->birth_day }}" name="birth_day" placeholder="Nhập ngày sinh">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Số điện thoại</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->phone }}" name="phone" placeholder="+84 329766459">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Ảnh đại diện</label>
                                    <div class="ellipsis" style="max-width: none !important;margin: 5px 0;">
                                        <input type="file" name="avatar" id="avatar" onchange="loadFile(event)">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-sm-5">
                                    <img id="preview_image" src="{{ $user->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Địa chỉ thường trú</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control data-input" value="{{ $user->address }}" name="address" placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Quê quán</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control data-input" value="{{ $user->address }}" name="address" placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Người giám hộ</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->phone }}" name="phone" placeholder="Số điện thoại người giám hộ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Chức vụ</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->phone }}" name="phone" placeholder="Chọn chức vụ">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Bằng cấp</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->phone }}" name="phone" placeholder="Chọn bằng cấp">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Ghi chú</label>
                            <div class="col-sm-12">
                                <textarea name="" id="" cols="34" rows="5" placeholder="Nhập ghi chú"></textarea>
                            </div>
                        </div>
                        <!-- <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Quê quán</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control data-input" value="{{ $user->address }}" name="address" placeholder="Nhập quê quán">
                            </div>
                        </div> -->
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Cập nhật</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>
<script>
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
        name: "required",
        email: {
            required: true,
            email: true
        },
        phone: {
            phoneVN: true
        }
      },
      messages: {
        name: `<span class="text-validate">Vui lòng nhập họ và tên</span>`,
        email: {
            required: `<span class="text-validate">Vui lòng nhập email</span>`,
            email: `<span class="text-validate">Vui lòng nhập đúng định dạng email</span>`
        },
        phone: {
            phoneVN: `<span class="text-validate">Vui lòng nhập đúng số điện thoại</span>`
        }
      }
    }
    validateForm("#form-create",objData);
</script>
@endsection