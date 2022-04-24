@extends('layouts.main')
@section('content')
<main class="new-page">
    <div class="box-title-admin">
        <h1>Tin tức</h1>
        <div class="path">
            <a href="/">Trang chủ</a> /
            <span>Tin tức</span>
        </div>
  </div>
  <div class="container box-highlights mt-5">
        <div class="row">
            <div class="col-lg-8 col-md-12 col-sm-12 col-12  mb-3">
                <div class="news-primary">
                    <a href="tin-tuc/bai-viet/{{$newPrimaryTop->slug}}">
                        <img src="{{asset('frontend')}}/image/{{$newPrimaryTop->thumbnail_img}}" class="img-primary" alt="">
                    </a>
                    <div class="short-description">
                        <a href="tin-tuc/bai-viet/{{$newPrimaryTop->slug}}">
                            <h2>{{$newPrimaryTop->title}}</h2>
                        </a>
                        <div>{{$newPrimaryTop->description_short}}</div>
                    </div>
                    <img src="{{asset('frontend')}}/image/new.gif" class="gif-new" alt="">
                </div>
            </div>
            <div class="col-lg-4 col-md-12 col-sm-12 col-12">
                <div class="news-board-right">
                    <div class="row">
                        @foreach ($postListNews as $item)
                           <div class="news-item col-lg-12">
                                <a href="tin-tuc/bai-viet/{{$item->slug}}"><img src="{{asset('frontend')}}/image/{{$item['thumbnail_img']}}" alt=""></a>
                                <div class="short-description">
                                        <a href="tin-tuc/bai-viet/{{$item->slug}}">
                                            <h3>{{$item['title']}}</h3>
                                        </a>
                                        <p>{{ $item->description_short }}</p>
                                </div>
                            </div> 
                        @endforeach
                        
                       
                    </div>
                </div>
            </div>
        </div>
  </div>
  <div class="container box-content-item mt-5">
      <div class="title-topic mb-3">
        <h2>Bản tin rau xanh</h2>
      </div>
      <div class="row">
            {{-- @foreach ($postTopicVegetable as $item)
                <div class="col-lg-3 col-md-4 col-sm-6 col-12 news-item">
                        <a href="tin-tuc/bai-viet/{{$item->slug}}" class="news-item-img">
                            <img src="{{asset('frontend')}}/image/{{$item['thumbnail_img']}}">
                        </a>
                        <p class="news-item-date">Thứ Bảy, 10 tháng 7, 2021</p>
                        <h3>
                            <a href="tin-tuc/bai-viet/{{$item->slug}}" title="Đi chợ online: Xu hướng lên ngôi mùa dịch Covid-19">Đi chợ online: Xu hướng lên ngôi mùa dịch Covid-19</a>
                        </h3>
                        <div class="article-sum">
                            “Mua hàng online thì cũng chủ yếu mua ở những nơi quen, tin tưởng. Book online rồi nhận vào những giờ cố định như sau giờ đi làm. Hoặc n...
                        </div>
                </div>
            @endforeach --}}
      </div>
  </div>
  <div class="container box-content-item mt-5">
    <div class="title-topic mb-3">
      <h2>Mẹo vặt cho bạn</h2>
    </div>
    <div class="row">
          {{-- @foreach ($postTopicTips as $item)
              <div class="col-lg-3 col-md-4 col-sm-6 col-12 news-item">
                      <a href="tin-tuc/bai-viet/{{$item->slug}}" class="news-item-img">
                          <img src="{{asset('frontend')}}/image/{{$item['thumbnail_img']}}">
                      </a>
                      <p class="news-item-date">Thứ Bảy, 10 tháng 7, 2021</p>
                      <h3>
                          <a href="tin-tuc/bai-viet/{{$item->slug}}" title="Đi chợ online: Xu hướng lên ngôi mùa dịch Covid-19">Đi chợ online: Xu hướng lên ngôi mùa dịch Covid-19</a>
                      </h3>
                      <div class="article-sum">
                          “Mua hàng online thì cũng chủ yếu mua ở những nơi quen, tin tưởng. Book online rồi nhận vào những giờ cố định như sau giờ đi làm. Hoặc n...
                      </div>
              </div>
          @endforeach --}}
    </div>
</div>
</main>
@endsection