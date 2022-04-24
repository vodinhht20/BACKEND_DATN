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