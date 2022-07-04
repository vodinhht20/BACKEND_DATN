@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Danh sách</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị nhân sự</h5>
                    <p class="m-b-0">Danh sách tất cả nhân sự</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Nhân sự</a>
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
                    <h5 style="font-size: 17px;">Danh sách nhân sự</h5>
                    <a href="{{route('user-black-list')}}" class="btn btn-outline-dark btn-round waves-effect waves-light" style="float: right">
                        <i class="ti-lock"></i>
                        Danh sách chặn
                    </a>
                    <a href="{{route('show-form-user-create')}}" class="btn btn-outline-primary btn-round waves-effect waves-light mr-3" style="float: right">
                        <i class="ti-plus"></i>
                        Thêm nhân sự
                    </a>
                </div>
               <div class="card-header">
                    <div class="form-group row">
                        <div class="col-sm-3">
                            <select name="select" class="form-control border" id="statusFilter" onchange="filter()">
                                <option value="">Trạng thái</option>
                                <option value="1">Đang hoạt động</option>
                                <option value="2">Chưa kích hoạt</option>
                                <option value="3">Bị chặn</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="select" class="form-control border" id="genderFilter"  onchange="filter()">
                                <option value="">Giới tính</option>
                                <option value="1">Nam</option>
                                <option value="2">Nữ</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <form action="" class="form-group">
                                <input class="form-control" type="text" placeholder="Tìm kiếm bằng tên, email,..." onchange="search()">
                            </form>
                        </div>
                    </div>
               </div>
               <div class="card-header">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <select name="select" class="form-control border" id="positionFilter" onchange="filter()">
                            <option value="">Vị trí</option>
                            @foreach ($positions as $position)
                                <option value="{{$position->id}}">{{$position->name}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="select" class="form-control border" id="branchFilter" onchange="filter()">
                            <option value="">Chi nhánh</option>
                            @foreach ($branchs as $branch)
                                <option value="{{$branch->id}}">{{$branch->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
           </div>

                @include('admin.layouts.messages')
                <div class="card-block table-border-style" id="data-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th class="text-center">STT</th>
                                    <th class="text-center">Tên</th>
                                    <th>Thông tin liên lạc</th>
                                    <th>Địa chỉ</th>
                                    <th>Trạng thái</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($employees as $employee)
                                    <tr>
                                        <td class="text-center">{{ $loop->index+1 }}</td>
                                        <td class="text-center">{{$employee->fullname}}</td>
                                        <td>
                                            <img src="{{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" alt="" class="avatar_list"> {{-- {{ $employee->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }} --}}
                                        </td>
                                        <td>
                                            <p>SĐT: {{ $employee->phone ?: "Chưa cập nhật" }}</p>
                                            <p class="ellipsis" width="200">{{ $employee->email }}</p>
                                            @if ($employee->email_verified_at)
                                                <label for="" class="label label-success">Đã xác thực email</label>
                                            @else
                                                <label for="" class="label label-danger">Chưa xác thực email</label>
                                            @endif

                                        </td>
                                        <td>{{ getStatusName($employee->status)}}</td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa fa-ellipsis-h"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if (!$employee->email_verified_at)
                                                        <a class="dropdown-item confirm-email" data-id="{{ $employee->id }}" data-email="{{ $employee->email }}">Xác thực email</a>
                                                    @endif
                                                    <a class="dropdown-item change-pass" data-id="{{ $employee->id }}" data-name="{{ $employee->fullname }}">Thay đổi mật khẩu</a>
                                                    <a class="dropdown-item" href="{{ route('show-form-update-user', ['id' => $employee->id]) }}">Chỉnh sửa thông tin</a>
                                                    <a class="dropdown-item" href="{{ route('show-info-user', ['id' => $employee->id]) }}">Xem chi tiết</a>
                                                    @if ($employee->id != Auth::user()->id)
                                                        <a class="dropdown-item btn-block-user" data-id="{{ $employee->id }}">Đưa vào danh sách chặn</a>
                                                        <a class="dropdown-item btn-remove-user" data-id="{{ $employee->id }}">Xóa bỏ</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate row justify-content-center">
                        {{ $employees->links() }}
                    </div>
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
    (function callApi() {
        $('.confirm-email').on('click', function (e) {
            Swal.fire({
                    title: 'Xác thực email ?',
                    html: "Xác thực <b style='color: #5fc0fc;'>"+ $(this).attr('data-email') +"</b>",
                    icon: 'question',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác thực'
                })
                .then(async (result) => {
                    if (result.isConfirmed) {
                        let option = {
                            _token: '{{ csrf_token() }}',
                            id: $(this).attr("data-id"),
                            params: window.location.search
                        }
                        $('.overlay-load').css('display', 'flex');
                        const response = await axios.post("{{route('ajax-user-confirm-email')}}", option)
                        if (response.status == 200) {
                            $('#data-table').html(response.data.data);
                            await callApi();
                            $('.overlay-load').css('display', 'none');
                            Swal.fire(
                                'Thành công',
                                'Tài khoản đã được xác thực',
                                'success'
                            )
                        }
                    }
                })
        });
        $('.change-pass').on('click', async function (e) {
            const { value: password } = await Swal.fire({
                    title: 'Thay đổi mật khẩu',
                    html:
                        `
                        <p>Thay đổi mật khẩu user <b>`+ $(this).attr("data-name") +`</b></p>
                        <div class="form-group row">
                            <label class="col-sm-4 col-form-label">Mật khẩu mới</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                        </div>` +
                        `<div class="form-group row">
                            <label class="col-sm-4 col-form-label">Nhập lại mật khẩu</label>
                            <div class="col-sm-8">
                                <input type="password" class="form-control" id="rePassword" name="rePassword" placeholder="Re password">
                            </div>
                        </div>` +
                        `<p class="text-validate"></p>`
                        ,
                    focusConfirm: false,
                    confirmButtonText: "Thay đổi",
                    showCancelButton: true,
                    preConfirm: () => {
                        let password = $('#password').val();
                        let rePassword = $('#rePassword').val();
                        if (password != rePassword) {
                            Swal.fire({
                                title: "Thất bại",
                                icon: 'error',
                                title: 'Mật khẩu không trùng khớp'
                            })
                            return false
                        }
                        if (password.trim() == "") {
                            Swal.fire({
                                title: "Thất bại",
                                icon: 'error',
                                title: 'Vui lòng nhập thông tin'
                            })
                            return false
                        }
                        return password
                    }
                })
                if (password) {
                    let option = {
                        _token: '{{ csrf_token() }}',
                        id: $(this).attr("data-id"),
                        password: password
                    }
                    $('.overlay-load').css('display', 'flex');
                    const response = await axios.post("{{route('ajax-user-change-password')}}", option)
                    if (response.status == 200) {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thành công',
                            'Mật khẩu đã được thay đổi',
                            'success'
                        )
                    }
                }
        });
        $('.btn-remove-user').on('click', async function (e) {
            Swal.fire({
                    title: 'Hành động nguy hiểm !!',
                    text: "Bạn có muốn xóa nhân viên này không, hành động này không thể khôi phục.",
                    icon: 'warning',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Đồng ý'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let option = {
                            _token: '{{ csrf_token() }}',
                            id: $(this).attr("data-id")
                        }
                        $('.overlay-load').css('display', 'flex');
                        axios.post("{{route('ajax-remove-user')}}", option)
                            .then(({data}) => {
                                $('#data-table').html(data.data);
                                callApi();
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Nhân viên này đã được xóa',
                                    'success'
                                )
                            })
                            .catch((error) => {
                                    $('.overlay-load').css('display', 'none');
                                    Swal.fire(
                                    'Thất bại',
                                    error.response.data.message,
                                    'error'
                                )
                            })
                    }
                })
        })
        $('.btn-block-user').on('click', function (e) {
            Swal.fire({
                    title: 'Xác nhận !',
                    text: "Bạn có muốn đưa chặn nhân viên này không ?",
                    icon: 'warning',
                    heightAuto: true,
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Xác nhận'
                })
                .then((result) => {
                    if (result.isConfirmed) {
                        let option = {
                            _token: '{{ csrf_token() }}',
                            id: $(this).attr("data-id")
                        }
                        $('.overlay-load').css('display', 'flex');
                        axios.post("{{route('ajax-block-user')}}", option)
                            .then(({data}) => {
                                $('#data-table').html(data.data);
                                callApi();
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Nhân viên này đã được thêm vào danh sách chặn',
                                    'success'
                                )
                            })
                            .catch((error) => {
                                    $('.overlay-load').css('display', 'none');
                                    Swal.fire(
                                    'Thất bại',
                                    error.response.data.message,
                                    'error'
                                )
                            })
                    }
                })
        })
    })()

    function filter(){
        let option = {
            status : $('#statusFilter').val(),
            gender : $('#genderFilter').val(),
            position : $('#positionFilter').val(),
            branch : $('#branchFilter').val()
        }
        axios.post("{{route('ajaxFilter')}}",option).then((response)=>{
            $('#data-table').html(response.data.data);
        })
    }
</script>
@endsection
