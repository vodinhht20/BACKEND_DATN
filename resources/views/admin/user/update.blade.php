@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Sửa thông tin</title>
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
            <div class="card">
                <div class="card-header">
                    <h5>Cập nhật thông tin thành viên</h5>
                    <span>Thay đổi thông tin thành viên</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="{{ route('post-update-user', ['id' => $user->id]) }}" method="POST" id="form-create"  enctype="multipart/form-data">
                        @csrf
                        <div class="row">
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Họ & Tên<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->name }}" name="name" placeholder="Nhập họ và tên thành viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Chứng minh nhân dân<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->name }}" name="name" placeholder="Nhập số chứng minh thư">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->email }}" name="email" placeholder="Nhập email thành viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Trường học<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->name }}" name="name" placeholder="Nhập tên trường học">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Chuyên ngành<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->name }}" name="name" placeholder="Nhập chuyên ngành học">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Năm tốt nghiệp<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $user->name }}" name="name" placeholder="Nhập năm tốt nghiệp">
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
                                    <label class="col-form-label">Giới tính</span></label>
                                    <div class="">
                                        <input type="date" class="form-control data-input" value="{{ $user->birth_day }}" name="birth_day" placeholder="Nhập giới tính">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                    <label class="col-form-label">Phòng ban</label>
                                    <select name="" id="" class="form-control data-input border">
                                        <option value="1">Phòng ban</option>
                                    </select>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Địa chỉ</label>
                            <div class="col-sm-12">
                                <input type="text" class="form-control data-input" value="{{ $user->address }}" name="address" placeholder="Nhập địa chỉ nhà">
                            </div>
                        </div>
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
