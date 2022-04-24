@extends('admin.layouts.main')
@section('title')
    <title>Thùng rác</title>
@endsection
@section('header-page')
    <div class="page-header">
        <div class="page-block">
            <div class="row align-items-center">
                <div class="col-md-8">
                    <div class="page-header-title">
                        <h5 class="m-b-10">Các sản phẩm đã xóa</h5>
                        <p class="m-b-0">Dọn dẹp các sản phẩm đã xóa</p>
                    </div>
                </div>
                <div class="col-md-4">
                    <ul class="breadcrumb-title">
                        <li class="breadcrumb-item">
                            <a href="{{ route('dashboard') }}"> <i class="fa fa-home"></i> </a>
                        </li>
                        <li class="breadcrumb-item"><a href="">Thùng rác</a>
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
                    <h5 style="font-size: 17px;">Danh sách sản phẩm đã xóa</h5>
                    <button class="btn btn-outline-danger btn-round waves-effect waves-light remote-data"
                        data-action="deleteAll" style="float: right">
                        <i class="ti-trash"></i>
                        Delete All
                    </button>
                    <button class="btn btn-outline-info btn-round waves-effect waves-light mr-3 remote-data"
                        data-action="restoreAll" style="float: right">
                        <i class="ti-loop"></i>
                        Restore All
                    </button>
                </div>
                <div class="card-block table-border-style" id="data-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Đơn Giá</th>
                                    <th>Loại hàng</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($trashProduct as $product)
                                    <tr>
                                        <td>{{ $product->id }}</td>
                                        <td>
                                            {{ $product->name }}
                                            <hr>
                                            <label class="label label-inverse">Đã xóa lúc:
                                                {{ $product->formatDate() }}</label>
                                        </td>
                                        <td>
                                            <img src="{{ asset('storage') }}/{{ $product->image }}" alt="" width="80">
                                        </td>
                                        <td>
                                            <span>{{ number_format($product->price) }} VNĐ</span>
                                            <hr>
                                            <div class="label bg-info">
                                                Khuyến mãi: {{ $product->discount }} %
                                            </div>
                                        </td>
                                        <td><label for=""
                                                class="label label-inverse-primary">{{ isset($product->category) ? $product->category->name : "N/A" }}</label>
                                        </td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button"
                                                    id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true"
                                                    aria-expanded="false">
                                                    Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item remote-data" data-id="{{ $product->id }}"
                                                        data-action="restore">Khôi Phục</a>
                                                    <a class="dropdown-item remote-data" data-id="{{ $product->id }}"
                                                        data-action="delete">Xóa vĩnh viễn</a>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (!count($trashProduct) > 0)
                                    <tr>
                                        <td colspan="6" class="box_data_empty">
                                            <img src="{{ asset('frontend') }}/image/empty_data.png" alt="">
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate row justify-content-center">
                        {{ $trashProduct->links() }}
                    </div>
                    <div class="overlay-load">
                        <img src="{{ asset('frontend') }}/image/loading.gif" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <!-- sweetAlert -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        function action() {
            $('.remote-data').on('click', function(e) {
                let remoteData = $(this).attr('data-action')
                if (remoteData == 'restore') {
                    Swal.fire({
                            title: 'Bạn có muốn khôi phục sản phẩm này không ?',
                            text: 'Sản phẩm này sẽ được khôi trở lại gian hàng của bạn',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                let route = '{{ route('ajax-restore-trash-product') }}';
                                let data = {
                                    id: $(this).attr('data-id'),
                                }
                                baseAjax(route, data);
                            }
                        })
                }
                if (remoteData == 'delete') {
                    Swal.fire({
                            title: 'Hành động nguy hiểm !',
                            text: 'Bạn có muốn xóa sản phẩm này vĩnh viễn không ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Xác nhận'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                let route = '{{ route('ajax-delete-trash-product') }}';
                                let data = {
                                    id: $(this).attr('data-id'),
                                }
                                baseAjax(route, data);
                            }
                        })
                }
                if (remoteData == 'restoreAll') {
                    Swal.fire({
                            title: 'Bạn có muốn khôi phục tất cả sản phẩm này không ?',
                            text: 'Vui lòng xác nhận nếu bạn muốn khôi phục tất cả',
                            icon: 'question',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Đồng ý'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                let route = '{{ route('ajax-restore-trash-all-product') }}';
                                baseAjax(route);
                            }
                        })
                }
                if (remoteData == 'deleteAll') {
                    Swal.fire({
                            title: 'Hành động nguy hiểm ?',
                            text: 'Bạn có chắc chắn muốn xóa tất cả các sản phẩm này vĩnh viễn không ?',
                            icon: 'warning',
                            showCancelButton: true,
                            confirmButtonColor: '#3085d6',
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Xác nhận'
                        })
                        .then((result) => {
                            if (result.isConfirmed) {
                                let route = '{{ route('ajax-delete-trash-all-product') }}';
                                let data = {
                                    id: $(this).attr('data-id'),
                                }
                                baseAjax(route, data);
                            }
                        })
                }
            })
        }
        action();

        function baseAjax(route, data = {}) {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                type: "POST",
                url: route,
                data: data,
                dataType: "json",
                success: function(response) {
                    if (response.success) {
                        $('#data-table').html(response.data);
                        Swal.fire(
                            'Thành công !',
                            response.messages,
                            'success'
                        )
                    } else {
                        Swal.fire(
                            'Thất bại !',
                            response.messages,
                            'error'
                        )
                    }
                },
                beforeSend: function() {
                    $('.overlay-load').css('display', 'flex');
                },
                complete: function() {
                    $('.overlay-load').css('display', 'none');
                    action();
                },
                error: function(error) {
                    Swal.fire(
                        'Thất bại !',
                        error.messages,
                        'error'
                    );
                }
            });
        }
    </script>
@endsection
