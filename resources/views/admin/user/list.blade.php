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
    <div class="card">
        <div class="card-header" style="box-shadow: none;">
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
        <div class="row mb-3" style="margin: unset;">
            <div class="col-sm-3">
                <label for="">Keyword</label>
                <input class="form-control action_filter" type="text" name="keyword" placeholder="Tìm kiếm bằng tên, email,..." data-filter="keyword">
            </div>
            <div class="col-sm-3">
                <label for="">Trạng thái nhân sự</label>
                <select name="status" class="form-control action_filter" data-filter="status">
                    <option value="">-- Tất cả --</option>
                    <option value="1">Đang hoạt động</option>
                    <option value="2">Chưa kích hoạt</option>
                    <option value="3">Bị chặn</option>
                </select>
            </div>
            <div class="col-sm-3">
                <label for="">Vị trí</label>
                <select name="position_id" class="form-control action_filter" data-filter="position_id">
                    <option value="">-- Tất cả --</option>
                    @foreach ($positions as $position)
                        <option value="{{$position->id}}">{{$position->name}}</option>
                    @endforeach
                </select>
            </div>
            <div class="col-sm-3">
                <label for="">Chi nhánh</label>
                <select name="branch_id" class="form-control action_filter" data-filter="branch_id">
                    <option value="">-- Tất cả --</option>
                    @foreach ($branchs as $branch)
                        <option value="{{$branch->id}}">{{$branch->name}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        @include('admin.layouts.messages')
        <div class="card-block table-border-style" id="data-table">
            @include('admin.user._partials.base_table')
        </div>
    </div>
@endsection

@section('page-script')
<script>
    (function callApi() {
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
        });

        $('.action_filter').on('input', function(e){
            var keyFilter = e.target.getAttribute("data-filter");
            var urlParam = new URL(window.location);
            urlParam.searchParams.set(keyFilter, $(this).val());
            window.history.pushState({}, '', urlParam);

            var paramsUrl = window.location.search;
            let params = {
                params: paramsUrl
            };
            $('.overlay-load').css('display', 'flex');
            axios.get("{{route('ajax-filter-employee')}}", { params }).then((response)=>{
                console.log(response.data);
                $('#data-table').html(response.data.data);
                $('.overlay-load').css('display', 'none');
            });
        });
        $('.action_filter').map((index, element) => {
            let keyFilter = element.getAttribute('data-filter');
            element.value = (new URL(document.location)).searchParams.get(keyFilter) || '';
        })
    })()
</script>
@endsection
