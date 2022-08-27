@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | {{$employee->fullname}}</title>
    <style>
        .icon-theme {
            font-size: 17px !important;
            padding: 7px !important;
        }
    </style>
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
                                <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" height="100px" style="border-radius: 50%;height: 100px;width: 100px;object-fit: cover;"/>
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
                            <a href="{{ route('show-form-update-user', ['id' => $employee->id]) }}" class="btn btn-warning" style="border-radius:5px; color:black;background-color: #ff9d3629;color: var(--ui-outline);border: none;font-weight: 500;">
                                Chỉnh sửa
                            </a>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col-sm-12">
                            <h6> <i class="fa fa-archive icon-theme" aria-hidden="true"></i> Thông tin công việc </h6>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Mã nhân viên</p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{$employee->employee_code}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Vị trí công việc </p></div>
                                <div class="col-sm-8">
                                    <p> <strong>{{$employee->position->name}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Phòng ban</p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{ $employee?->position?->department?->name ?: 'Chưa cập nhật' }}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Quản lý trực tiếp</p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{ $employee->getLeader() ? "[" . $employee->getLeader()->employee_code . "] " . $employee->getLeader()->fullname : "N/A" }}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Trạng thái nhân sự</p></div>
                                <div class="col-sm-8">
                                    @if ($employee->status == config('employee.status.block') || $employee->status == config('employee.status.retired'))
                                        <label class="label label-warning">{{ config('employee.status_str.' . $employee->status) }}</label>
                                    @else
                                        <label class="label label-success">{{ config('employee.status_str.' . $employee->status) }}</label>
                                    @endif
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Trạng thái điểm danh</p></div>
                                <div class="col-sm-8">
                                    @if ($employee->is_checked)
                                        <label class="label label-success">Cho phép điếm danh</label>
                                    @elseif($employee->status == 1)
                                        <label class="label label-warning">Không có quyền</label>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-12 mt-3">
                            <h6><i class="fa fa-archive icon-theme" aria-hidden="true"></i> Thông tin cá nhân </h6>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Giới tính </p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{ getGender($employee->gender) }}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Số điện thoại </p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{$employee->phone ? $employee->phone : "Chưa cập nhật"}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Ngày sinh </p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{$employee->birth_day ? $employee->birth_day : "Chưa cập nhật"}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Email cá nhân </p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{$employee->personal_email ? $employee->personal_email : "Chưa cập nhật"}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Email làm việc </p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{$employee->email}}</strong></p>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3 row">
                                <div class="col-sm-4"><p>Địa chỉ tạm chú </p></div>
                                <div class="col-sm-8">
                                    <p><strong>{{$employee->address ? $employee->address : "Chưa cập nhật"}}</strong></p>
                                </div>
                            </div>
                            @foreach ($attributes as $attribute)
                                <div class="col-sm-6 mt-3 row">
                                    <div class="col-sm-4"><p>{{$attribute->attribute->description}}</p></div>
                                    <div class="col-sm-8">
                                        <p><strong>{{$attribute->data}}</strong></p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <div class="col-sm-12">
                            <h6><i class="fa fa-archive icon-theme" aria-hidden="true"></i> Ghi chú </h6>
                        </div>
                        <div class="col-sm-12 row">
                            <div class="col-sm-12 mt-3 row">
                                <div class="col-sm-8">
                                    <p>{{ $employee->note }}</p>
                                </div>
                            </div>
                        </div>
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
    validateForm("#form-create",objData);
</script>
@endsection
