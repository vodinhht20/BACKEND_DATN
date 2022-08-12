@extends('admin.layouts.main')
@section('title')
    <title>Setting Company</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/banner.css">
@endsection

@section('content')
    <div class="banner-info">
        <div class="card">
            <div class="card-header">
                <h5>Blog</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <i class="fa fa fa-wrench open-card-option"></i>
                            <a href="{{route("post.add")}}" role="tab">Thêm Post</a>
                        </li>
                    </ul>
                </div>
            </div>
            @include('admin.layouts.messages')
            <div class="card-block table-border-style">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Tiêu đề</th>
                                <th>Image</th>
                                <th>Tin tức</th>
                                <th>Người viết</th>
                                <th>Chi nhánh</th>
                                <th>Thời gian</th>
                                <th>Chức năng</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($posts as $post)
                                <tr>
                                    <td class="ellipsis"><a href="">{{$post->title}}</a></td>
                                    <td><img class="img-banner" src="{{$post->getPost()}}" alt="{{ $post->title }}"></td>
                                    <td class="ellipsis"><label for="" class="">Nhấn vào đây để  xem</label></td>
                                    <td>{{$post->employee->fullname}}</td>
                                    <td>{{$post->branch->name}}</td>
                                    <td>{{$post->category_id}}</td>
                                    <td class="box-actions">
                                        <a href="{{route("post.update", $post->id)}}">
                                            <i style="float: right" class="ti-pencil icon-edit-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-script')
@endsection
