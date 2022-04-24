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
                        <img src="{{asset('storage')}}/{{$product->image}}" alt="" width="80">
                    </td>
                    <td>
                        <span>{{number_format($product->price)}} VNĐ</span>
                        <hr>
                        @if ($product->checkDiscount())
                            <div class="label bg-info">
                                đang giảm {{$product->discount}}%
                            </div>
                        @elseif ($product->discount == 0)
                            <div class="label bg-secondary">
                                chưa có khuyến mãi
                            </div>
                        @else
                            <div class="label label-default">
                                khuyến mãi đã hết hạn
                            </div>
                        @endif
                    </td>
                    <td><label for="" class="label label-inverse-primary">{{isset($product->category) ? $product->category->name : "N/A"}}</label></td>
                    <td><p class="ellipsis">{{ $product->description }}</p></td>
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