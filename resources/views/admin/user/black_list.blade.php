@extends('admin.layouts.main')
@section('title')
    <title>Thành viên | Danh sách chặn</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị thành viên</h5>
                    <p class="m-b-0">Danh sách thành viên đã bị chặn</p>
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
                    <h5 style="font-size: 17px;">Danh sách thành viên đã bị chặn</h5>
                    <a href="{{route('admin-list-user')}}" class="btn btn-outline-dark btn-round waves-effect waves-light" style="float: right">
                        Quay lại
                    </a>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block table-border-style" id="data-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th class="text-center">Thành viên</th>
                                    <th>Email</th>
                                    <th>Phone</th>
                                    <th>Birth day</th>
                                    <th>Address</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($users as $user)
                                    <tr>
                                        <td>{{ $loop->index+1 }}</td>
                                        <td class="text-center">
                                            <img src="{{ $user->getAvatar() ?: asset('frontend/image/avatar_empty.jfif') }}" alt="" class="avatar_list">
                                            <p class="text-fullname">{{ $user->name }}</p>
                                        </td>
                                        <td>
                                            <p class="ellipsis" width="200">{{ $user->email }}</p>
                                        </td>
                                        <td>{{ $user->phone ?: "Chưa có" }}</td>
                                        <td>{{ $user->birth_day ?: "Chưa có" }}</td>
                                        <td> <p class="ellipsis">{{ $user->address ?: "Chưa có" }}</p></td>
                                        <td>
                                            <button class="btn btn-primary btn-round waves-effect waves-light unlock-user" data-id="{{ $user->id }}"><i class="ti-key"></i> Bỏ chặn</button>
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

<script>
    (function callApi() {
        $('.unlock-user').on('click', function (e) {
            Swal.fire({
                    title: 'Xác nhận !',
                    text: "Bạn có muốn bỏ chặn thành viên này không ?",
                    icon: 'question',
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
                        axios.post("{{route('ajax-un-block-user')}}", option)
                            .then(({data}) => {
                                $('#data-table').html(data.data);
                                callApi();
                                $('.overlay-load').css('display', 'none');
                                Swal.fire(
                                    'Thành công',
                                    'Thành viên này đã được xóa khỏi danh sách chặn',
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
