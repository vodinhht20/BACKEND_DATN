@extends('admin.layouts.main')
@section('title')
    <title>Danh sách đơn từ</title>
@endsection
@section('style-page')
    <style>
        .box-position {
            position: relative;
        }
        .badge-top-right {
            right: -2px !important;
            position: absolute !important;
            top: -7px !important;
        }
        .btn i {
            margin-right: unset !important;
        }
        .tooltip-content3 {
            bottom: 260% !important;
            width: 150px !important;
            padding: 30px 0 !important;
            line-height: 0 !important;
            left: 100% !important;
        }
        img.avatar-custome {
            background-color: #cccccc;
            border: 1px solid #9f9fff;
            border-radius: 50%;
            width: 50px;
            height: 50px;
            object-fit: cover;
        }
    </style>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản Lý ĐƠn Từ</h5>
                    <p class="m-b-0">Danh sách tất cả các đơn từ của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Đơn từ</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div id="app">
        <div class="card">
            <div class="card-header" style="box-shadow: unset;">
                <!-- Nav tabs -->
                <ul class="nav nav-tabs default-tab tabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active box-position" data-toggle="tab" data-target="#type" aria-controls="type" aria-expanded="true" role="tab" >
                            Đơn cần phê duyệt
                            <label for="" class="badge badge-primary badge-top-right">10</label>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link box-position" data-toggle="tab" href="#dafuk" aria-controls="dafuk" aria-expanded="false" role="tab" >
                            Đơn đã được duyệt
                            <label for="" class="badge badge-success badge-top-right">10</label>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link box-position" data-toggle="tab" href="#deathline" aria-controls="deathline" aria-expanded="false" role="tab" >
                            Đơn đã từ chối
                            <label for="" class="badge badge-warning badge-top-right">10</label>
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Tab panes -->
            <div class="tab-content tabs card-block">
                <div class="tab-pane active" id="type" role="tabpanel">
                    @include('admin.application.request.processing')
                </div>
                <div class="tab-pane" id="deathline" role="tabpanel">
                    @include('admin.application.request.accepted')
                </div>
                <div class="tab-pane" id="dafuk" role="tabpanel">
                    @include('admin.application.request.unapproved')
                </div>
            </div>
        </div>
    </div>
@endsection
@section('page-script')
    <script src="{{ asset('frontend/js/vue-paginate.js') }}"></script>
    <script>
        Vue.config.devtools = true
        Vue.component('paginate', VuejsPaginate)
        let app = new Vue({
            el: '#app',
            data: {
                requestProcessData: {!! json_encode($requestProcess) !!}
            },
            methods: {
                changePageProcess: (page) => {
                    // change param url
                    var urlParam = new URL(window.location);
                    urlParam.searchParams.set('page', page);
                    window.history.pushState({}, '', urlParam);
                    // call api
                    $('.overlay-load').css('display', 'flex');
                    axios.get(`{{route('get-request-data')}}?page=${page}`).then(({data}) => {
                        app.requestProcessData = data.processing;
                        $('.overlay-load').css('display', 'none');
                    })
                },
                linkRequestDetail: (requestId) => {
                    let linkRoot = `{{ route('application-request-detail', ['requestId' => '????']) }}`
                    return linkRoot.replace("????", requestId);
                }
            }
        })
    </script>
@endsection
