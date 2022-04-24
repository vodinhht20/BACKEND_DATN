@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Danh sách</title>
@endsection
@section('style-page')
<style>
    select.form-control:not([size]):not([multiple]) {
        height: auto !important;
    }
    select.form-control, select.form-control:focus, select.form-control:hover {
        border: 1px solid #cccccc !important;

    }
    .card-header {
        box-shadow: none !important;
        -webkit-box-shadow: none !important;
    }
</style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản trị sản phẩm</h5>
                    <p class="m-b-0">Danh sách tất cả các sản phẩm của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Sản Phẩm</a>
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
                    <h5 style="font-size: 17px;">Danh sách sản phẩm</h5>
                    <a href="{{route('product-export-csv')}}" class="btn btn-outline-primary btn-round waves-effect waves-light" style="float: right">
                        <i class="ti-printer"></i>
                        Xuất CSV
                    </a>
                    <a href="{{route('product-export-excel')}}" class="btn btn-outline-primary btn-round waves-effect waves-light" style="float: right; margin-right: 10px;">
                        <i class="ti-printer"></i>
                        Xuất Excel
                    </a>
                </div>
                <div class="card-header row" style="padding: 0 20px; justify-content: space-between;align-items: center;">
                    <div class="box-acion col-lg-4 col-md-5 col-sx-12">
                        <a href="{{route('admin-product-create')}}" class="btn btn-outline-primary btn-round waves-effect waves-light mr-3">
                            <i class="ti-plus"></i>
                            Thêm sản phẩm
                        </a>
                    </div>
                    <div class="box-search col-lg-8 col-md-7 col-sx-12">
                        <form action="" class="row" style="justify-content: right;">
                            <div class="form-group col-lg-4 col-md-6 col-sx-12">
                                <label for="" class="">Từ khóa: </label>
                                <input type="text" name="keywords" placeholder="Nhập từ khóa..." id="keywords" filter="keywords" class="form-control filter-data">
                            </div>
                            <div class="form-group col-lg-4 col-md-6 col-sx-12">
                                <label for="" class="">Loại hàng: </label>
                                <select name="cate" class="form-control filter-data" id="select_cate" filter="cate">
                                    <option value="">-- Tất cả --</option>
                                    @foreach ($categories as $category)
                                        <option value="{{$category->id}}">{{$category->name}}</option>
                                            @if ($category->children_cate)
                                                @foreach ($category->children_cate as $children_cate)
                                                    <option value="{{$children_cate->id}}">{{$children_cate->name}}</option>
                                                @endforeach
                                            @endif
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group col-lg-4 col-md-6 col-sx-12">
                                <label for="" class="">Trạng thái: </label>
                                <select name="status" class="form-control filter-data" id="select_status" filter="status">
                                    <option value="">-- Tất cả --</option>
                                    <option value="1">Đang bán</option>
                                    <option value="0">Ngưng bán</option>
                                </select>
                            </div>
                        </form>
                    </div>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block table-border-style" id="data-table">
                    <div class="table-responsive">
                        <table class="table table-hover">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Sản phẩm</th>
                                    <th>Hình ảnh</th>
                                    <th>Đơn giá</th>
                                    <th>Loại hàng</th>
                                    <th>Mô tả</th>
                                    <th>Hành động</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($products as $product)
                                    <tr class={{ (Session::has('message.success') && session('id_new') && session('id_new') == $product->id ) ?'bg-green':'' }}>
                                        <td>{{$product->id}}</td>
                                        <td>
                                            <p class="ellipsis">{{$product->name}}</p>
                                            @if ($product->status)
                                                <label for="" class="label label-success">đang bán</label>
                                            @else
                                                <label for="" class="label label-default">ngưng bán</label>
                                            @endif
                                            <hr>
                                            <span style="cursor: pointer;" class="label bg-primary preview_product" data-id="{{ $product->id }}">Preview</span>
                                        </td>
                                        <td>
                                            <img src="{{asset('storage')}}/{{$product->image}} ?: {{asset('frontend/image/no_image.png')}}" alt="" width="80">
                                        </td>
                                        <td>
                                            <span>{{number_format($product->price)}} VNĐ</span>
                                            <hr>
                                            @if ($product->checkDiscount())
                                                <div class="label bg-info">
                                                    đang giảm {{$product->discount}}%
                                                </div>
                                            @elseif ($product->discount > 0 && $product->start_discount > now())
                                                <div class="label label-default">
                                                    khuyến mãi sắp tới
                                                </div>
                                            @elseif ($product->discount > 0 && $product->end_discount < now())
                                                <div class="label label-default">
                                                    khuyến mãi đã hết hạn
                                                </div>
                                            @else
                                                <div class="label bg-secondary">
                                                    chưa có khuyến mãi
                                                </div>
                                            @endif
                                            @if ($product->getDayDiscount())
                                                <div class="label bg-info mt-3">
                                                    {{$product->getDayDiscount()}}
                                                </div>
                                            @endif
                                        </td>
                                        <td><label for="" class="label label-inverse-primary">{{isset($product->category) ? $product->category->name : "N/A"}}</label></td>
                                        <td><div class="ellipsis">{!! $product->description !!}</div></td>
                                        <td>
                                            <div class="dropdown">
                                                <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                Action
                                                </button>
                                                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                                    <a class="dropdown-item" href="{{ route('post-admin-product-update',[ 'id' => $product->id ]) }}">Chỉnh sửa</a>
                                                    <a class="dropdown-item btn-remove-product" data-id="{{$product->id}}">Xóa bỏ</a>
                                                    @if ($product->status)
                                                        <a class="dropdown-item btn-change-status" data-id="{{$product->id}}" data-status="{{$product->status}}">Ngưng bán</a>
                                                    @else
                                                        <a class="dropdown-item btn-change-status" data-id="{{$product->id}}" data-status="{{$product->status}}">Trưng bày</a>
                                                    @endif
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                @if (!count($products) > 0)
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
                        {{ $products->links() }}
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
{{-- <!-- lodash -->
<script src="{{asset('frontend')}}/js/lodash.min.js"></script> --}}
<!-- sweetAlert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    (function callAjax() {
        $('.btn-remove-product').on('click', function (e) {
            Swal.fire({
                title: 'Hành đông nguy hiểm ?',
                text: "Bạn có muốn xóa sản phẩm này không !",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Vâng, xóa nó'
            })
            .then((result) => {
                if (result.isConfirmed) {
                    const option = {
                        id: $(this).attr('data-id')
                    }
                    $.ajaxSetup({
                        headers: {
                            'X-CSRF-TOKEN': "{{ csrf_token() }}"
                        }
                    });
                    $.ajax({
                        type: "POST",
                        url: "{{route('ajax-product-remove')}}",
                        data: option,
                        dataType: "json",
                        success: function (response) {
                            if (response.success) {
                                Swal.fire(
                                'Đã xóa!',
                                'Sản phẩm này đã được xóa',
                                'success')
                                $('#data-table').html(response.data);
                                callAjax();
                            } else {
                                Swal.fire(
                                'Thất bại !',
                                'Không thể xóa sản phẩm này',
                                'error'
                                )
                            }
                        },
                        beforeSend:function(){
                            $('.overlay-load').css('display', 'flex');
                        },
                        complete: function(){
                            $('.overlay-load').css('display', 'none');
                            removeProduct();
                            changeStatus();
                        }
                    });
                }
            })
        })
        $('.btn-change-status').on('click', function (e) {
            const option = {
                id: $(this).attr('data-id'),
                status: $(this).attr('data-status')
            }
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                }
            });
            $.ajax({
                type: "POST",
                url: "{{route('ajax-product-change-status')}}",
                data: option,
                dataType: "json",
                success: function (response) {
                    if (response.success) {
                        Swal.fire(
                        'Đã thay đổi!',
                        'Sản phẩm này đã được cập nhật',
                        'success')
                        $('#data-table').html(response.data);
                        callAjax();
                    } else {
                        Swal.fire(
                        'Thất bại !',
                        'Không thể cập nhật sản phẩm này',
                        'error'
                        )
                    }
                },
                beforeSend:function(){
                    $('.overlay-load').css('display', 'flex');
                },
                complete: function(){
                    $('.overlay-load').css('display', 'none');
                    removeProduct();
                    changeStatus();
                },
                error: function(){
                    Swal.fire(
                        'Thất bại !',
                        response.messages,
                        'error'
                    );
                }
            });
        })

        $('.preview_product').on('click', function (e) {
            var idProduct = $(this).attr('data-id');
            Swal.fire({
                width: 900,
                html: `
                <iframe src="http://the-gioi-dien-thoai.vn/admin/product/${idProduct}/preview" id="modal_preview" title="Preview Sản Phẩm" height="400" width="800"></iframe>
                `
            });
        });

        // active theo param
        function activeParamSelect(keyParam) {
            var params = (new URL(document.location)).searchParams;
            return params.get(keyParam);
        }
        activeParamSelect("keywords") && $( "#keywords" ).val(activeParamSelect("keywords"));
        activeParamSelect("cate") && $( "#select_cate" ).val(activeParamSelect("cate"));
        activeParamSelect("status") && $( "#select_status" ).val(activeParamSelect("status"));

        var countKeyup = 0;
        $('.filter-data').on('input', function (e){
            countKeyup ++;
            let countKeyUpOld = countKeyup;
            setTimeout(() => {
                if (countKeyup == countKeyUpOld) {
                    ajaxFilter($(this).attr('filter'), $(this).val(), '#data-table');
                }
            }, 600);
        });

        function ajaxFilter(keySort,valSort, appendElement) {
            $('.overlay-load').css('display', 'flex');
            var urlParam = new URL(window.location);
            urlParam.searchParams.set(keySort, valSort);
            window.history.pushState({}, '', urlParam);
            var params = window.location.search;
            let data = {
                param: params,
                _token: '{{ csrf_token() }}'
            };
            $.ajax({
                url: "{{route('ajax-filter-product')}}",
                method: "POST",
                data: data,
                dataType: "json",
                success: function(resp){
                    $(appendElement).html(resp.data);
                    $('.overlay-load').css('display', 'none');
                },
                error: function(err) {
                    console.log("lỗi", err)
                    $('.overlay-load').css('display', 'none');
                }
            })
        }
    })()

</script>
@endsection
