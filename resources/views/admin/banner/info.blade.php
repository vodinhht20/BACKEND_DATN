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
                <h5>Banner</h5>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li>
                            <i class="fa fa fa-wrench open-card-option"></i>
                            <a href="{{route("setting.banner.addbanner")}}" role="tab">Thêm banner</a>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-block table-border-style">
                <div class="table-responsive scrollbar-custom">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Images</th>
                                <th>Link</th>
                                <th>Trạng thái</th>
                                <th>Dealine</th>
                                <th>Type image</th>
                                <th>Người tạo</th>
                                <th>Thao tác</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($banner as $b)
                                <tr>
                                    <td>{{$b->name}}</td>
                                    <td><img class="img-banner" src="{{$b->getBanner()}}" alt="$b->name"></td>
                                    <td>{{$b->links}}</td>
                                    <td>{!! $b->status() !!}</td>
                                    <td>
                                        {{$b->from_at}} - {{$b->to_at}}
                                    </td>
                                    <td>{{$b->checkLink()}}</td>
                                    <td>{{$b->author->fullname}}</td>
                                    <td class="box-actions">
                                        <a href="{{route('setting.banner.delete',$b->id)}}">
                                            <i class="ti-trash icon-remove-danger"></i>
                                        </a>
                                        <a href="{{route("setting.banner.updatebanner", $b->id)}}">
                                            <i style="float: right" class="ti-pencil icon-edit-primary"></i>
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                    {{ $banner->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection


@section('page-script')
@endsection
