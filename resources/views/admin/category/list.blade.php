@extends('admin.layouts.main')
@section('title')
    <title>Loại Sản Phẩm | Danh sách</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị loại sản phẩm</h5>
                    <p class="m-b-0">Danh sách tất cả các loại sản phẩm của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Loại Sản Phẩm</a>
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
                    <h5 style="font-size: 17px;">Danh sách Loại sản phẩm</h5>
                    <a href="{{route('show-form-create-category')}}" class="btn btn-outline-primary btn-round waves-effect waves-light mr-3" style="float: right">
                        <i class="ti-plus"></i>
                        Thêm mới
                    </a>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block table-border-style" id="data-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>STT</th>
                                    <th>Loại sản phẩm</th>
                                    <th>Danh mục chính</th>
                                    <th>Hình ảnh</th>
                                    <th>Trạng thái</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($categories as $category)
                                    <tr class={{ (Session::has('message.success') && session('id_new') && session('id_new') == $category->id ) ?'bg-green':'' }} >
                                        <td>{{ $loop->index+1 }}</td>
                                        <td>
                                            <label class="label label-success">#{{ $category->id }}</label>
                                            {{ $category->name }}
                                            <hr/>
                                            <span class="label bg-info mt-3">Sản phẩm: {{$category->products_count}}</span>
                                        </td>
                                        <td>
                                            <label class="label bg-info">{{ $category->parent_cate ? $category->parent_cate->name: 'N/A' }}</label>
                                        </td>
                                        <td>
                                            <img src="@if ($category->image) {{asset('storage')}}/{{$category->image}} @else {{asset('frontend/image/no_image.png')}} @endif" alt="" width="80">
                                        </td>
                                        <td>
                                            <label class="switch">
                                                <input type="checkbox" class="value-status" data-id="{{$category->id}}" @if ($category->status) checked @else @endif>
                                                <span class="slider round"></span>
                                            </label>
                                        </td>
                                        <td>
                                            <a href="{{ route('show-form-update-category', ['id' => $category->id]) }}"><i class="ti-marker-alt"></i></a>
                                            <button class="btn-delete" data-id="{{$category->id}}"><i class="ti-trash"></i></button>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (!count($categories) > 0)
                                    <tr>
                                        <td colspan="7" class="box_data_empty">
                                            <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                                        </td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                    <div class="paginate row justify-content-center">
                        {{ $categories->links() }}
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
    (function loadAjax() {
        $('.value-status').on('change', async function(e) {
            let option = {
                _token: '{{ csrf_token() }}',
                id: $(this).attr("data-id"),
                status: this.checked ? 1 : 0,
            }
            $('.overlay-load').css('display', 'flex');
            const response = await axios.post('{{route('ajax-category-change-status')}}', option)
            if (response.status == 200) {
                let data = response.data.data;
                $('.overlay-load').css('display', 'none');
                Swal.fire(
                    'Đã cập nhật',
                    `Loại sản phẩm <b>${data.name}</b> này đã được ${data.status == 1 ? "<b>Bật</b>" : "<b>Tắt</b>"}`,
                    'success'
                )
            }
        })
        $('.btn-delete').on('click', function (e) {
            Swal.fire({
                title: 'Hành đông nguy hiểm ?',
                text: "Bạn có muốn xóa loại sản phẩm này không !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            })
            .then(async (result) => {
                if (result.isConfirmed) {
                    const option = {
                        _token: '{{ csrf_token() }}',
                        id: $(this).attr('data-id')
                    }
                    $('.overlay-load').css('display', 'flex');
                    const response = await axios.post('{{route("ajax-category-remove")}}{{request()->get("page") ? "?page=".request()->get("page") : ""}}', option)
                    if (response.status == 200) {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                        'Đã xóa!',
                        'Loại sản phẩm này đã được xóa',
                        'success')
                        $('#data-table').html(response.data.data);
                        loadAjax();
                    } else {
                        Swal.fire(
                            'Thất bại !',
                            'Không thể xóa loại sản phẩm này',
                            'error'
                        )
                    }
                }
            })
        })
    })()
    
</script>
@endsection
