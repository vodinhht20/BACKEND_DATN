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
                    @include('admin.user._partials.black_table')
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
