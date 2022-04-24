@extends('layout.main')
@section('content')
<main class="search-page post-page">
    <div class="box-title-admin">
        {{-- <h1>{{$post->title}}</h1> --}}
        <div class="path">
            <a href="/">Trang chủ</a> /
            <span>Tin tức</span>
        </div>
    </div>
    <div class="container mt-4">
        <div class="row justify-content-between">
            <div class="col-3 pr-5">
                <div class="aside-left list_category">
                    <div class="title-list">
                        <h5 class="text-white"><i class="fas fa-clipboard-list"></i> Danh Mục Sản Phẩm</h5>
                    </div>
                    <div class="list-content">
                        <ul class="">
                            <li><a href="">Trái cây</a></li>
                            <li><a href="">Thịt tươi</a></li>
                            <li><a href="">Hải sản tươi</a></li>
                            <li><a href="">Rau củ</a></li>
                            <li><a href="">Thực phẩm khô</a></li>
                            <li><a href="">Bơ sữa</a></li>
                            <li><a href="">Thực phẩm tết</a></li>
                            <li><a href="">Hạt Giống</a></li>
                            <li><a href="">Đồ ăn đóng hộp</a></li>
                        </ul>
                    </div>
                </div>
                <div class="aside-left similar mt-5">
                    <div class="title-list">
                        <h5 class="text-white">Bài Viết Liên Quan</h5>
                    </div>
                    <div class="list-content">
                        {{-- @foreach ($similarNews as $item)
                            <div class="post-item">
                                <a href="tin-tuc/bai-viet/{{$item->slug}}">
                                    <img src="{{asset('frontend')}}/image/{{$item['thumbnail_img']}}" alt="">
                                <div class="post-title">
                                    <h4>{{$item->title}}</h4>
                                </div>
                                </a>
                            </div>
                        @endforeach --}}
                    </div>
                </div>
            </div>
            <div class="container border-bottom col-9">
                <div class="author">
                    <p style="color: #989696;font-style: italic;">{{$post->created_at}}</p>
                    {{-- <p >Tác giả: <b>{{$post->user->name}}</b> </p> --}}
                </div>
                <div class="row product-show-main mt-3">
                    <div class="title-post">
                        {{-- <h1>{{$post->title}}</h1> --}}
                    </div>
                    <div class="content-post">
                        {{-- <p>{!! $post->content !!}</p> --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    
</main>
@endsection