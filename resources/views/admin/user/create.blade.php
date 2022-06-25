@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Thêm Mới</title>
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
                    <h5>Thêm thành viên</h5>
                    <span>Nhập thông tin thành viên để tạo mới</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <form action="" method="POST" id="form-create"  enctype="multipart/form-data">
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
                                <div class="col-sm-5" style="height: auto; min-height: 100px">
                                    <img id="preview_image" src="{{ asset('frontend/image/avatar_empty.jfif') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Họ & Tên<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ old('fullname') }}" name="fullname" placeholder="Nhập họ và tên thành viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Ngày sinh</span></label>
                                    <div class="">
                                        <input type="date" class="form-control data-input" value="{{ old('birth_day') }}" name="birth_day" placeholder="Nhập ngày sinh">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email công ty<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ old('email') }}" name="email" placeholder="Nhập email công ty">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email cá nhân<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ old('email') }}" name="personal_email" placeholder="Nhập email cá nhân">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Mã nhân viên<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ old('email') }}" name="employee_code" placeholder="Nhập mã nhân viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Số điện thoại</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ old('phone') }}" name="phone" placeholder="+84 329766459">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Ghi chú</label>
                                    <div class="">
                                        <textarea class="form-control data-input" name="note"  cols="30" rows="10">{{ old('note') }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">Trạng thái</label>
                                    <div class="">
                                        <select name="status" id="" class="form-control data-input border">
                                            @foreach (config('global.employeeStatus') as $key => $statusName)
                                                <option value="{{$statusName}}">{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">Giới tính</span></label>
                                    <div class="">
                                        <select name="gender" id="" class="form-control data-input border">
                                            @foreach (config('global.gender') as $key => $gender)
                                                <option value="{{$gender}}">{{$key}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">Chi nhánh</label>
                                    <div class="">
                                        <select name="branch" id="" class="form-control data-input border">
                                           @foreach ($branchs as $branch)
                                           <option value="{{$branch->id}}">{{$branch->name}}</option>
                                           @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">Phòng ban</label>
                                    <div class="">
                                        <select name="position" id="" class="form-control data-input border">
                                            <option value="1">Lập trình viên</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">Trạng thái điểm danh</label>
                                    <div class="">
                                        <select name="is_checked" id="" class="form-control data-input border">
                                            <option value="1">Được phép điểm danh</option>
                                            <option value="2">Không được phép điểm danh</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group row justify-content-center">
                            <button class="btn btn-primary btn-round waves-effect waves-light ">Tạo mới</button>
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
        fullname: "required",
        email: {
            required: true,
            email: true
        },
        phone: {
            phoneVN: true
        }
      },
      messages: {
        fullname: `<span class="text-validate">Vui lòng nhập họ và tên</span>`,
        email: {
            required: `<span class="text-validate">Vui lòng nhập email</span>`,
            email: `<span class="text-validate">Vui lòng nhập đúng định dạng email</span>`
        },
        phone: {
            phoneVN: `<span class="text-validate">Vui lòng nhập đúng số điện thoại</span>`
        }
      }
    }
    const funcAjax = () => {
        $('.overlay-load').css('display', 'flex');
        var file_data = $('#avatar').prop('files')[0];
        var form_data = new FormData();
        form_data.append('_token', '{{ csrf_token() }}');
        if (file_data) {
            form_data.append('avatar', file_data);
        }
        $('.data-input').map((index, val) => {
         if (val.value.trim() != "") {
            form_data.append(val.name, val.value);
         }
        });

        axios.post("{{route('ajax-create-user')}}", form_data)
            .then(({data}) => {
                console.log("data", data);
                Swal.fire({
                    title: 'Thành công !',
                    html: `
                        <div class="show-account">
                            <div class="account-group account-email">
                                <label for="">Tài khoản:</label>
                                <p>${data.data.email}</p>
                            </div>
                            <div class="account-group account-password">
                                <label for="">Mật khẩu:</label>
                                <p>${data.data.password}</p>
                            </div>
                        </div>`,
                    icon: 'success',
                }).then((result) => {
                    window.location.href = '{{ route("admin-list-user") }}';
                })
            })
            .catch((err) => {
                $('.overlay-load').css('display', 'none');
                Swal.fire(
                    'Thất bại',
                    err.response.data.message,
                    'error'
                )
            })

    }
    validateForm("#form-create",objData, funcAjax ,true);
</script>
@endsection
