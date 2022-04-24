<style>
    table,
    th,
    td {
        border: 1px solid black;
        border-collapse: collapse;
    }

</style>

<table class="">
    <thead style="background: #11c15b;color: #fff;">
        <tr>
            <th>ID</th>
            <th>Sản phẩm</th>
            <th>Hình ảnh</th>
            <th>Đơn giá</th>
            <th>Khuyến mãi</th>
            <th>Loại hàng</th>
            <th>Mô tả</th>
        </tr>
    </thead>
    <tbody>
        @foreach ($products as $product)
            <tr>
                <td style="width: 50px; text-align: center;">{{$product->id}}</td>
                <td style="width: 300px;">{{$product->name}}</td>
                <td style="width: 300px;">{{asset('storage')}}/{{$product->image}} ?: {{asset('frontend/image/no_image.png')}}</td>
                <td style="width: 100px; text-align: center;">{{number_format($product->price)}}</td>
                <td style="width: 50px; text-align: center;">{{$product->discount}} %</td>
                <td style="width: 100px;">{{ isset($product->category) ? $product->category->name : 'N/A' }}</td>
                <td style="width: 350px;">{{$product->description}}</td>
            </tr> 
        @endforeach
    </tbody>
</table>