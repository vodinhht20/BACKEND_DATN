@extends('admin.layouts.main')
@section('title')
    <title>Setting Post</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{ asset('frontend') }}/css/addbanner.css">
@endsection
@section('content')
    <div class="banner-info">
        <div class="col-md-12">
            <div style="width: 100%;" class="card">
                <div class="card-header">
                    <h5>Thêm post</h5>
                </div>
                @include('admin.layouts.messages')
                <div class="card-block">
                    <div class="card-block">
                        <form class="form-material" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-default">
                                <input type="text" name="title" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Title</label>
                            </div>
                            <div style="display: flex;">
                                <div class="form-group form-default col-sm-6">
                                    <input type="file" name="images" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Image</label>
                                </div>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="content" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Content</label>
                            </div>
                            <div class="form-group form-default">
                                <label class="float-label" style="top: -14px; font-size: 11px;">Danh mục</label>
                                <select class="form-control" name="category_id" id="">
                                    @foreach($categories as $category)
                                    <option value="{{$category->id}}">{{$category->name}}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group form-default">
                                <select class="form-control" name="branch_id" id="">
                                    @foreach($branchs as $branch)
                                    <option value="{{$branch->id}}">{{$branch->name}}</option>
                                    @endforeach
                                </select>
                                <label class="float-label">Chi nhánh</label>
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Thêm post</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
