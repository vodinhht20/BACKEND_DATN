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
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Ảnh đại diện</label>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="col-sm-5" style="height: auto; min-height: 100px">
                                    <img id="preview_image" src="{{ $user->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" height="100px"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Họ & Tên:</label>
                                    <div class="">
                                        <p>{{ $user->name }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Chứng minh nhân dân:</label>
                                    <div class="">
                                        <p>036482377523</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email:</label>
                                    <div class="">
                                        <p>{{ $user->email }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Trường học:</label>
                                    <div class="">
                                        <p>Cao đẳng FPT Polytechnic</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Chuyên ngành:</label>
                                    <div class="">
                                        <p>Thiết kế website</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Năm tốt nghiệp:</label>
                                    <div class="">
                                        <p>2022</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Ngày sinh:</label>
                                    <div class="">
                                        {{ $user->birth_day }}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Số điện thoại:</label>
                                    <div class="">
                                       <p>093126213512</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Giới tính:</label>
                                    <div class="">
                                        <p>Nam</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                    <label class="col-form-label">Phòng ban:</label>
                                    <p>Developer</p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label class="col-sm-12 col-form-label">Địa chỉ:</label>
                            <div class="col-sm-12">
                                <p>16 Trịnh Văn Bô - Nam Từ Liêm - Hà Nội - Việt Nam</p>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Chỉnh sửa</button>
                        </div>
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
