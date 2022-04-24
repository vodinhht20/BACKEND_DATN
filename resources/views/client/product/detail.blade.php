@extends('layouts.main')
@section('content')
<main class="product-detail-page mt-5">
    <div class="container">
        <h2>Thông tin sản phẩm</h2>
    </div>
    <div class="container">
        <div class="row">
            <div class="col-lg-6">
                <img src="{{asset('storage/' . $product->image)}}" alt="{{ $product->name }}">
            </div>
            <div class="col-lg-6">
                <h3 class="title-product">{{ $product->name }}</h3>
                <div class="description">
                    <p>
                        <span class="price">{{ number_format($product->priceMinusDiscount()) }} đ</span>
                        @if ($product->checkDiscount())
                            <span class="price-root">{{ number_format($product->price) }} đ</span> 
                        @endif
                    </p>
                    <p>Cây ổi nhỏ hơn cây vải, nhãn, cao nhiều nhất 10m, đường kính thân tối đa 30 cm. Những giống mới còn nhỏ và lùn hơn nữa </p>
                    <div class="input-order">
                        <form action="">
                            <div class="mass">
                                <h4>Màu sắc: </h4>
                                <div class="select-mass">
                                    <div class="active"> Màu đen </div>
                                    <div> Xanh ngọc </div>
                                    <div> Trắng </div>
                                    <div> Xám </div>
                                </div>
                            </div>
                            <div class="quantity mt-3">
                                <h4 for="">Số Lượng: </h4>
                                <div class="input">
                                    <button class="bnt-plus" type="button"><i class="ti-plus"></i></button>
                                    <input type="text" value="1" min="1" max="99">
                                    <button class="bnt-minus" type="button"><i class="ti-minus"></i></button>
                                </div>
                                <div class="mt-1 text-danger error"></div>
                                <div class="bnt-order mt-3">
                                    <button class="bnt-buy-now">Mua Ngay</button>
                                    <button  class="bnt-add-cart">Thêm Vào Giỏ Hàng</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container">
        <h4>Thông tin chi tiết</h4>
        <p>{!! $product->description !!}</p>
    </div>   
</main>
@endsection