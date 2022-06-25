@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | {{$employee->fullname}}</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị nhân sự</h5>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">{{$employee->fullname}}</a>
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
                    <h5>Chi tiết nhân viên</h5>
                    <span>Nhân viên: {{$employee->fullname}}</span>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                        <div class="row">
                            <div class="col-sm-10 row">
                                <div class="col-sm-2" style="height: auto; min-height: 100px;">
                                    <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" height="100px" style="border-radius: 50%"/>
                                </div>
                                <div class="col-sm-8 row">
                                    <div class="col-sm-12 pt-3">
                                        <p><strong>{{ $employee->fullname }}</strong></p>
                                    </div>
                                    <div class="col-sm-12">
                                        <p>{{$employee->employee_code}}</p>
                                    </div>
                                </div>
                            </div> 
                            <div class="col-sm-2">
                                <a href="{{ route('show-form-update-user', ['id' => $employee->id]) }}" class="btn btn-warning" style="border-radius:5px; color:black">
                                    Chỉnh sửa
                                </a>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-sm-12">
                                <h6> <i class="fa fa-archive" aria-hidden="true"></i> Thông tin công việc </h6>
                            </div>
                            <div class="col-sm-12 row">
                                <div class="col-sm-6 mt-3 row">
                                    <div class="col-sm-6"><p>Vị trí công việc </p></div>
                                    <div class="col-sm-6">
                                        <ul>
                                            @foreach ($employee->positions as $position)
                                            <li>
                                                <strong>{{$position->name}}</strong>
                                            </li>
                                            @endforeach
                                        </ul>
                                    </div>

                                    <div class="col-sm-6"><p>Phòng ban</p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{$employee->branch->name}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Quản lý trực tiếp</p></div>
                                    <div class="col-sm-6">
                                        <p><strong>Hoàng Văn A</strong></p>
                                    </div>
                                    
                                    <div class="col-sm-6"><p>Loại hình nhân sự</p></div>
                                    <div class="col-sm-6">
                                        <p><strong>Chưa cập nhật</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Trạng thái nhân sự</p></div>
                                    <div class="col-sm-6">
                                        <p class="text-success"><strong>Đang làm việc</strong></p>
                                    </div>
                                    
                                    <div class="col-sm-6"><p>Trạng thái sử dụng</p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{getStatusName($employee->status)}}</strong></p>
                                    </div>
                                </div>
                                <div class="col-sm-6 mt-3 row">
                                    <div class="col-sm-6">Ngày bắt đầu đi làm</div>
                                    <div class="col-sm-6"><p><strong>12/2/2020</strong></p></div>

                                    <div class="col-sm-6">Ngày bắt đầu chính thức</div>
                                    <div class="col-sm-6"><p><strong>12/2/2020</strong></p></div>

                                    <div class="col-sm-6">Ngày nghỉ việc</div>
                                    <div class="col-sm-6"><p><strong>12/2/2020</strong></p></div>

                                    <div class="col-sm-6">Số phép năm nay</div>
                                    <div class="col-sm-6"><p><strong>10</strong></p></div>

                                    <div class="col-sm-6">Số phép năm trước</div>
                                    <div class="col-sm-6"><p><strong>0</strong></p></div>
                                </div>
                            </div>
                            <div class="col-sm-12">
                                <h6> <i class="fa fa-archive" aria-hidden="true"></i> Thông tin cá nhân </h6>
                            </div>
                            <div class="col-sm-12 row">
                                <div class="col-sm-6 mt-3 row">
                                    <div class="col-sm-6"><p>Giới tính </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{getGender($employee->gender)}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Ngày sinh </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{$employee->birth_day}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Số điện thoại </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{$employee->phone ? $employee->phone : "Chưa cập nhật"}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Email cá nhân </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{$employee->personal_email ? $employee->personal_email : "Chưa cập nhật"}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Email làm việc </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{$employee->email}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Địa chỉ tạm chú </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>{{$employee->address}}</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Tình trạng hôn nhân </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>Chưa kết hôn</strong></p>
                                    </div>
                                </div>

                                <div class="col-sm-6 mt-3 row">
                                    <div class="col-sm-6"><p>Mã số thuế </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>1731236523</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Số cccd / hộ chiếu </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>1731236523</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Nơi cấp </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>Nam Định</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Ngày cấp </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>1731236523</strong></p>
                                    </div>

                                    <div class="col-sm-6"><p>Địa chỉ thường chú </p></div>
                                    <div class="col-sm-6">
                                        <p><strong>1731236523</strong></p>
                                    </div>
                                </div>
                                <div class="col-sm-12">
                                    <h6> <i class="fa fa-archive" aria-hidden="true"></i> Ghi chú </h6>
                                </div>
                            </div>
                        </div>
                        {{-- <div class="row">
                            
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Số điện thoại</label>
                                    <div class="">
                                        {{ $employee->phone ? $employee->phone : "Chưa cập nhật"}}
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                <div class="form-group">
                                    <label class="col-form-label">Giới tính:</label>
                                    <div class="">
                                        <p>{{getGender($employee->gender)}}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-3">
                                    <label class="col-form-label">Phòng ban:</label>
                                    <p>Developer</p>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label class="col-form-label">Địa chỉ:</label>
                                    <div class="">
                                        <p>{{ $employee->address ? $employee->address : "Chưa cập nhật" }}</p>
                                    </div>
                                </div>
                            </div>
                        </div> --}}
                       
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
    validateForm("#form-create",objData);
</script>
@endsection
