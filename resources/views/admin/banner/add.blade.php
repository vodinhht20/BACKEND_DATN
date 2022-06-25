@extends('admin.layouts.main')
@section('title')
    <title>Setting Company</title>
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
                    <h5>Thêm banner</h5>
                </div>
                <div class="card-block">
                    <div class="card-block">
                        <form class="form-material" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group form-default">
                                <input type="text" name="name" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Name</label>
                                @error('name')
                                    <div class="has-danger">
                                        <div class="col-form-label">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                            <div style="display: flex;">
                                <div class="form-group form-default col-sm-6">
                                    <input type="file" name="image" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Upload từ máy</label>
                                </div>
                                <div class="form-group form-default col-sm-6">
                                    <input type="text" name="image_link" class="form-control">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Link image online (nếu không có file trong máy hãy để link online)</label>
                                </div>
                            </div>
                            @error('image_link')
                                <div class="has-danger">
                                    <div class="col-form-label">{{ $message }}</div>
                                </div>
                            @enderror
                            <div class="form-group form-default">
                                <input type="text" name="links" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Link sự kiện</label>
                            </div>
                            <div class="form-group form-default">
                                <label class="float-label" style="top: -14px; font-size: 11px;">Ngày bắt đầu</label>
                                <input type="date" name="from_at" class="form-control">
                                <span class="form-bar"></span>
                                @error('from_at')
                                    <div class="has-danger">
                                        <div class="col-form-label">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                            <div class="form-group form-default">
                                <input type="date" name="to_at" class="form-control">
                                <span class="form-bar"></span>
                                <label class="float-label">Ngày kết thúc</label>
                                @error('to_at')
                                    <div class="has-danger">
                                        <div class="col-form-label">{{ $message }}</div>
                                    </div>
                                @enderror
                            </div>
                            <button type="submit" class="btn btn-info waves-effect waves-light">Thêm banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
