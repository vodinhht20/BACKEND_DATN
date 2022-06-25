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
                        <form class="form-material" method="post">
                            @csrf
                            <div class="form-group form-default">
                                <input type="text" name="name" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Name</label>
                            </div>
                            {{-- <div class="form-group form-default">
                                <input type="text" name="image" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Link image online</label>
                            </div> --}}
                            <div class="form-group form-default">
                                <input type="file" name="image" class="form-control" required="">
                                <span class="form-bar"></span>
                            </div>
                            <div class="form-group form-default">
                                <input type="text" name="links" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">Link sự kiện</label>
                            </div>
                            <div class="form-group form-default">
                                <label class="float-label">From at</label>
                                <input type="date" name="from_at" class="form-control" required="">
                                <span class="form-bar"></span>
                            </div>
                            <div class="form-group form-default">
                                <input type="date" name="to_at" class="form-control" required="">
                                <span class="form-bar"></span>
                                <label class="float-label">To at</label>
                            </div>
                            <button type="submit"class="btn btn-info waves-effect waves-light">Thêm banner</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
