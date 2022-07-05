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
                    <form action="{{ route('post-update-user', ['id' => $employee->id]) }}" method="POST" id="form-create"  enctype="multipart/form-data">
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
                                    <img id="preview_image" src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}"/>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-2">
                                <div class="form-group">
                                    <label class="col-form-label">Trạng thái</label>
                                    <div class="">
                                        <select name="status" id="" class="form-control data-input border">
                                            @foreach (config('global.employeeStatus') as $statusName => $key)
                                                <option value="{{$key}}" {{$key == $employee->status ? "selected" : ""}} >{{$statusName}}</option>
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
                                    <label class="col-form-label">Vị trí</label>
                                    <div class="">
                                        <select name="position" id="" class="form-control data-input border">
                                           @foreach ($positions as $position)
                                           <option value="{{$position->id}}">{{$position->name}}</option>
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
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Họ & Tên<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $employee->fullname }}" name="fullname" placeholder="Nhập họ và tên thành viên">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Ngày sinh<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="date" class="form-control data-input" value="{{  $employee->birth_day }}" name="birth_day" placeholder="Nhập ngày sinh">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email công ty<span class="text-danger">*</span></label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{ $employee->email }}" name="email" placeholder="Nhập email công ty">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Email cá nhân</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{  $employee->personal_email }}" name="personal_email" placeholder="Nhập email cá nhân">
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Số điện thoại</label>
                                    <div class="">
                                        <input type="text" class="form-control data-input" value="{{  $employee->phone }}" name="phone" placeholder="+84 329766459">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <p><strong>Thông tin thêm</strong></p>
                            </div>
                            @foreach ($attributes as $attribute)

                                @foreach ($employee->attributes as $employee_attribute)
                                    @if ($employee_attribute->attribute_id == $attribute->id)
                                        <div class="col-sm-6">
                                            <div class="form-group">
                                                <label class="col-form-label">{{$attribute->name}}</label>
                                                <div class="">
                                                    <input type="{{$attribute->data_type}}" class="form-control data-input" name="data" value="{{$employee_attribute->data}}">
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endforeach
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label class="col-form-label">{{$attribute->name}}</label>
                                        <div class="">
                                            <input type="{{$attribute->data_type}}" class="form-control data-input" name="data">
                                        </div>
                                    </div>
                                </div>
                            
                            @endforeach
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
        fullname: "required",
        email: {
            required: true,
            email: true
        },
        phone: {
            phoneVN: true
        },
        personal_email:{
            email:true
        },
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
    validateForm("#form-create",objData);
</script>
@endsection
