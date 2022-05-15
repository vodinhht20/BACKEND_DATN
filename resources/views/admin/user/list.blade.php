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
                            <select name="select" class="form-control">
                                <option value="opt1">Đang hoạt động</option>
                                <option value="opt2">Type 2</option>
                                <option value="opt3">Type 3</option>
                                <option value="opt4">Type 4</option>
                                <option value="opt5">Type 5</option>
                                <option value="opt6">Type 6</option>
                                <option value="opt7">Type 7</option>
                                <option value="opt8">Type 8</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="select" class="form-control">
                                <option value="opt1">Status</option>
                                <option value="opt2">Type 2</option>
                                <option value="opt3">Type 3</option>
                                <option value="opt4">Type 4</option>
                                <option value="opt5">Type 5</option>
                                <option value="opt6">Type 6</option>
                                <option value="opt7">Type 7</option>
                                <option value="opt8">Type 8</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="select" class="form-control">
                                <option value="opt1">Tìm kiếm theo tên, email, số...</option>
                                <option value="opt2">Type 2</option>
                                <option value="opt3">Type 3</option>
                                <option value="opt4">Type 4</option>
                                <option value="opt5">Type 5</option>
                                <option value="opt6">Type 6</option>
                                <option value="opt7">Type 7</option>
                                <option value="opt8">Type 8</option>
                            </select>
                        </div>
                        <div class="col-sm-3">
                            <select name="select" class="form-control">
                                <option value="opt1">Vai trò</option>
                                <option value="opt2">Type 2</option>
                                <option value="opt3">Type 3</option>
                                <option value="opt4">Type 4</option>
                                <option value="opt5">Type 5</option>
                                <option value="opt6">Type 6</option>
                                <option value="opt7">Type 7</option>
                                <option value="opt8">Type 8</option>
                            </select>
                        </div>
                    </div>
               </div>
               <div class="card-header">
                <div class="form-group row">
                    <div class="col-sm-3">
                        <select name="select" class="form-control">
                            <option value="opt1">Phòng ban, vị trí</option>
                            <option value="opt2">Type 2</option>
                            <option value="opt3">Type 3</option>
                            <option value="opt4">Type 4</option>
                            <option value="opt5">Type 5</option>
                            <option value="opt6">Type 6</option>
                            <option value="opt7">Type 7</option>
                            <option value="opt8">Type 8</option>
                        </select>
                    </div>
                    <div class="col-sm-3">
                        <select name="select" class="form-control">
                            <option value="opt1">Loại hình nhân sự</option>
                            <option value="opt2">Type 2</option>
                            <option value="opt3">Type 3</option>
                            <option value="opt4">Type 4</option>
                            <option value="opt5">Type 5</option>
                            <option value="opt6">Type 6</option>
                            <option value="opt7">Type 7</option>
                            <option value="opt8">Type 8</option>
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
                                    <th>STT</th>
                                    <th class="text-center">Name</th>
                                    <th>Contact</th>
                                    <th>Status</th>
                                    <th>Address</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td class="text-center">
                                            <img src="https://lh3.googleusercontent.com/a-/AOh14GiJHaBSsAqGvMR7dcgJicEvaGNyAcqjR-mcrNO9wQ=s96-c" alt="" class="avatar_list"> {{-- {{ $user->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }} --}}
                                            <p class="text-fullname">{{ $user->name }}</p>
                                        </td>
                                        <td>
                                            <p> {{ $user->phone ?: "Chưa có" }}</p>
                                            <p class="ellipsis" width="200">{{ $user->email }}</p>
                                            @if ($user->email_verified_at)
                                                <label for="" class="label label-success">Đã xác thực email</label>
                                            @else
                                                <label for="" class="label label-default">Chưa xác thực email</label>
                                            @endif
                                           
                                        </td>
                                        <td>{{ $user->birth_day ?: "Chưa có" }}</td>
                                        <td> <p class="ellipsis">{{ $user->address ?: "Chưa có" }}</p></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-sm" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                    <i class="fa-solid fa-ellipsis m-0"></i>
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    @if (!$user->email_verified_at)
                                                        <a class="dropdown-item confirm-email" data-id="{{ $user->id }}" data-email="{{ $user->email }}">Xác thực email</a>
                                                    @endif
                                                    <a class="dropdown-item change-pass" data-id="{{ $user->id }}" data-name="{{ $user->name }}">Thay đổi mật khẩu</a>
                                                    <a class="dropdown-item" href="{{ route('show-form-update-user', ['id' => $user->id]) }}">Chỉnh sửa thông tin</a>
                                                    @if ($user->id != Auth::user()->id)
                                                        <a class="dropdown-item btn-block-user" data-id="{{ $user->id }}">Đưa vào danh sách chặn</a>
                                                        <a class="dropdown-item btn-remove-user" data-id="{{ $user->id }}">Xóa bỏ</a>
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
                        {{ $users->links() }}
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
<!-- sweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="https://unpkg.com/axios/dist/axios.min.js"></script>

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
</script>
@endsection
