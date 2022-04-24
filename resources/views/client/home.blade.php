@section('title')
    <title>Trang chủ</title>
@endsection
@extends('layouts.main')
@section('content')
<main>
    <div class="banner">
        <picture>
            <source media="(max-width: 567px)" srcset="{{asset('frontend')}}/image/banner-mobile.jpg">
            <img src="{{asset('frontend')}}/image/banner.jpg" alt="">
        </picture>
    </div>
    <div class="container">
        <div class="cartegory-slide-show-home">
            <div class="owl-carousel">
                    @foreach ($categories['all'] as $category)
                        <div class="category-item">
                            <a href="">
                                <img src="{{asset('storage')}}/{{$category->image}}" alt="">
                                <h3>{{ $category->name }}</h3>
                            </a>
                        </div>
                    @endforeach
            </div>
        </div>
    </div>
    <div class="container">
        <div class="box-product-hot">
            <div class="title-product-hot">
                <img src="{{asset('frontend')}}/image/hostsale.gif" alt="">
                <h1>Ưu đãi mới trong tuần</h1>
            </div>
            <div class="silde-product">
                <div class="owl-carousel">
                    @foreach ($products['sales'] as $product)
                        <div class="product-item">
                            <div class="product-image">
                                <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                    <img src="{{asset('storage')}}/{{$product->image}}" alt="{{$product->slug}}">
                                </a>
                                <div class="icon-on-image-product">
                                    <i class="ti-heart" title="Thêm vào yêu thích"></i>
                                    <a href="" class="link-cart-full"><i class="ti-shopping-cart-full" title="Thêm vào giỏ hàng"></i></a>
                                </div>
                            </div>
                            <div class="product-information">
                                <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                    <p>{{$product->name}}</p>
                                    <div class="box-price">
                                        <span class="price-primary">{{number_format($product->priceMinusDiscount())}} đ</span>
                                        @if ($product->checkDiscount())
                                            <span class="price-sub">{{number_format($product->price)}} đ</span>
                                        @endif
                                    </div>
                                </a>
                            </div>
                            @if ($product->checkDiscount())
                                <span class="product-sale">- {{$product->discount}}%</span>
                            @endif
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-4">
        <div class="box-banner-sub">
            <div class="row">
                <div class="col-md-6">
                    <div class="banner-sub">
                        <a href=""><img src="{{asset('frontend')}}/image/banner_1.jpg" alt="Giá Sale"></a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="banner-sub">
                        <a href=""><img src="{{asset('frontend')}}/image/banner_2.jpg" alt="Giá Sale"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="box-product-show section-1">
            <div class="row">
                <div class="col-lg-3 sm-md-12">
                    <div class="title-product-show" style="background-image: url('{{asset('frontend')}}/image/bg-title-cate1.jpg');">
                        <a href=""><h2>Điện thoại</h2></a>
                        <div class="list-category">
                            <ul>
                                @foreach ($categories['phones'] as $category)
                                    <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            <a href="" class="bnt-buy-now">Mua sắm ngay bây giờ !</a>
                        </div>
                        <div class="bnt-more"><i class="ti-more"></i></div>
                    </div>
                </div>
                <div class="col-lg-9 sm-md-12">
                    <div class="product-show-main">
                        <div class="silde-product">
                            <div class="owl-carousel">
                                @foreach ($products['phones'] as $product)
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                                <img src="{{asset('storage')}}/{{$product->image}}" alt="{{$product->slug}}">
                                            </a>
                                            <div class="icon-on-image-product">
                                                <i class="ti-heart" title="Thêm vào yêu thích"></i>
                                                <a href="" class="link-cart-full"><i class="ti-shopping-cart-full" title="Thêm vào giỏ hàng"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-information">
                                            <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                                <p>{{$product->name}}</p>
                                                <div class="box-price">
                                                    <span class="price-primary">{{number_format($product->priceMinusDiscount())}} đ</span>
                                                    @if ($product->checkDiscount())
                                                        <span class="price-sub">{{number_format($product->price)}} đ</span>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        @if ($product->checkDiscount())
                                            <span class="product-sale">- {{$product->discount}}%</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="box-product-show section-2">
            <div class="row">
                <div class="col-lg-9 sm-md-12">
                    <div class="product-show-main">
                        <div class="silde-product">
                            <div class="owl-carousel">
                                @foreach ($products['laptops'] as $product)
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                                <img src="{{asset('storage')}}/{{$product->image}}" alt="{{$product->slug}}">
                                            </a>
                                            <div class="icon-on-image-product">
                                                <i class="ti-heart" title="Thêm vào yêu thích"></i>
                                                <a href="" class="link-cart-full"><i class="ti-shopping-cart-full" title="Thêm vào giỏ hàng"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-information">
                                            <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                                <p>{{$product->name}}</p>
                                                <div class="box-price">
                                                    <span class="price-primary">{{number_format($product->priceMinusDiscount())}} đ</span>
                                                    @if ($product->checkDiscount())
                                                        <span class="price-sub">{{number_format($product->price)}} đ</span>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        @if ($product->checkDiscount())
                                            <span class="product-sale">- {{$product->discount}}%</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 sm-md-12">
                    <div class="title-product-show" style="background-image: url('{{asset('frontend')}}/image/bg-title-cate2.jpg');">
                        <a href=""><h2>Laptop</h2></a>
                        <div class="list-category">
                            <ul>
                                @foreach ($categories['laptops'] as $category)
                                    <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            <a href="" class="bnt-buy-now">Mua sắm ngay bây giờ !</a>
                        </div>
                        <div class="bnt-more"><i class="ti-more"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="box-product-show section-2">
            <div class="row">
                <div class="col-lg-3 sm-md-12">
                    <div class="title-product-show" style="background-image: url('{{asset('frontend')}}/image/bg-title-cate3.jpg');">
                        <a href=""><h2>Đồng hồ</h2></a>
                        <div class="list-category">
                            <ul>
                                @foreach ($categories['smart_watchs'] as $category)
                                    <li><a href="{{ $category->slug }}">{{ $category->name }}</a></li>
                                @endforeach
                            </ul>
                            <a href="" class="bnt-buy-now">Mua sắm ngay bây giờ !</a>
                        </div>
                        <div class="bnt-more"><i class="ti-more"></i></div>
                    </div>
                </div>
                <div class="col-lg-9 sm-md-12">
                    <div class="product-show-main">
                        <div class="silde-product">
                            <div class="owl-carousel">
                                @foreach ($products['smart_watchs'] as $product)
                                    <div class="product-item">
                                        <div class="product-image">
                                            <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                                <img src="{{asset('storage')}}/{{$product->image}}" alt="{{$product->slug}}">
                                            </a>
                                            <div class="icon-on-image-product">
                                                <i class="ti-heart" title="Thêm vào yêu thích"></i>
                                                <a href="" class="link-cart-full"><i class="ti-shopping-cart-full" title="Thêm vào giỏ hàng"></i></a>
                                            </div>
                                        </div>
                                        <div class="product-information">
                                            <a href="{{ route('product.showDetail', ['slug' => $product->slug]) }}">
                                                <p>{{$product->name}}</p>
                                                <div class="box-price">
                                                    <span class="price-primary">{{number_format($product->priceMinusDiscount())}} đ</span>
                                                    @if ($product->checkDiscount())
                                                        <span class="price-sub">{{number_format($product->price)}} đ</span>
                                                    @endif
                                                </div>
                                            </a>
                                        </div>
                                        @if ($product->checkDiscount())
                                            <span class="product-sale">- {{$product->discount}}%</span>
                                        @endif
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
    <div class="container mt-5">
        <div class="banner-ads-express">
            <h2>Giao hàng miễn phí tận nhà trong vòng 24h</h2>
            <a href="">Tìm hiểu thêm</a>
        </div>
    </div>
</main>
@endsection