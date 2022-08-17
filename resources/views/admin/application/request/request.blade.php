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

        .badge-top-right {
            top: 5px !important;
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
                <div style="max-width: 400px !important;">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs unset-boder" role="tablist" style="border: unset;">
                        <li class="nav-item" @click="() => app.current_tab = 'process'">
                            <a class="nav-link box-position" :class="{ active: current_tab == 'process'}">
                                Đơn cần phê duyệt
                            </a>
                            <div class="slide"></div>
                            <label for="" class="badge badge-primary badge-top-right">@{{ requestProcessData.total }}</label>
                        </li>
                        <li class="nav-item" @click="() => app.current_tab = 'accepted'">
                            <a class="nav-link box-position" :class="{ active: current_tab == 'accepted'}">
                                Đơn đã được duyệt
                            </a>
                            <div class="slide"></div>
                            <label for="" class="badge badge-success badge-top-right">@{{ requestAcceptedData.total }}</label>
                        </li>
                        <li class="nav-item" @click="() => app.current_tab = 'unapproved'">
                            <a class="nav-link box-position" :class="{ active: current_tab == 'unapproved'}">
                                Đơn đã từ chối
                            </a>
                            <div class="slide"></div>
                            <label for="" class="badge badge-warning badge-top-right">@{{ requestUnapprovedData.total }}</label>
                        </li>
                    </ul>
                </div>
            </div>
            <!-- Tab panes -->
            <div class="card-block">
                <div>
                    <form action="" class="form-filter">
                        <div class="row align-items-end justify-content-end">
                            <div class="col-md-3">
                                <label for="">Từ khóa:</label>
                                <input type="text" name="keyword" v-model="keyword" placeholder="Nhập tên đơn, nội dung đơn từ, ..." class="form-control filter-data">
                            </div>
                            <div class="col-md-3">
                                <label for="">Mã đơn:</label>
                                <input type="text" name="request_id" v-model="request_id" placeholder="Nhập mã đơn" class="form-control filter-data">
                            </div>
                            <div class="col-md-3">
                                <label for="">Mã nhân viên:</label>
                                <input type="text" name="employee_id" v-model="employee_id" value="" placeholder="Nhập mã người tạo ..." filter="company_shift_name" class="form-control filter-data">
                            </div>
                            <div class="col-md-3">
                                <label for="">Loại đơn:</label>
                                <input type="text" name="type" value="" v-model="type" placeholder="Nhập tên loại đơn" filter="company_shift_name" class="form-control filter-data">
                            </div>
                            <input type="hidden" :value="current_tab" name="current_tab">
                            <div class="col-md-3 mt-3">
                                <button type="button" class="btn btn-inverse btn-sm waves-effect waves-light" style="float: right;" @click="handleSearch('all')">Tất cả</button>
                                <button type="button" class="btn btn-primary btn-sm waves-effect waves-light mr-2" @click="handleSearch()" style="float: right;">Tìm kiếm</button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="tab-contents">
                    <div class="" v-if="current_tab == 'process'" id="process_tab" role="tabpanel">
                        @include('admin.application.request.processing')
                    </div>
                    <div class="" v-if="current_tab == 'accepted'" id="accepted_tab" role="tabpanel">
                        @include('admin.application.request.accepted')
                    </div>
                    <div class="" v-if="current_tab == 'unapproved'" id="unapproved_tab" role="tabpanel">
                        @include('admin.application.request.unapproved')
                    </div>
                </div>
                <div class="overlay-load">
                    <img src="{{asset('frontend')}}/image/loading.gif" alt="">
                    <p style="color: #3c2525;">Vui lòng chờ ...</p>
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
        var app = new Vue({
            el: '#app',
            data: {
                requestProcessData: {!! json_encode($requestProcess) !!},
                requestAcceptedData: {!! json_encode($requestAccepted) !!},
                requestUnapprovedData: {!! json_encode($requestUnapproved) !!},
                current_tab: 'process',
                keyword: '{{ request()->keyword ?? '' }}',
                request_id: '{{ request()->request_id ?? '' }}',
                employee_id: '{{ request()->employee_id ?? '' }}',
                type: '{{ request()->type ?? '' }}',

            },
            methods: {
                changePageProcess: (page) => {
                    // change param url
                    var urlParam = new URL(window.location);
                    urlParam.searchParams.set('process_page', page);
                    window.history.pushState({}, '', urlParam);
                    // call api
                    $('.overlay-load').css('display', 'flex');
                    let params = location.search;
                    axios.get(`{{route('get-request-data')}}${params}`).then(({data}) => {
                        app.requestProcessData = data.process;
                        $('.overlay-load').css('display', 'none');
                    })
                },
                changePageAccep: (page) => {
                    // change param url
                    var urlParam = new URL(window.location);
                    urlParam.searchParams.set('accep_page', page);
                    window.history.pushState({}, '', urlParam);
                    // call api
                    $('.overlay-load').css('display', 'flex');
                    let params = location.search;
                    axios.get(`{{route('get-request-data')}}${params}`).then(({ data }) => {
                        app.requestAcceptedData = data.accepted;
                        $('.overlay-load').css('display', 'none');
                    })
                },
                changePageUnapp: (page) => {
                    // change param url
                    var urlParam = new URL(window.location);
                    urlParam.searchParams.set('unapp_page', page);
                    window.history.pushState({}, '', urlParam);
                    // call api
                    $('.overlay-load').css('display', 'flex');
                    let params = location.search;
                    axios.get(`{{route('get-request-data')}}${params}`).then(({data}) => {
                        app.requestUnapprovedData = data.unapproved;
                        $('.overlay-load').css('display', 'none');
                    })
                },
                linkRequestDetail: (requestId) => {
                    let linkRoot = `{{ route('application-request-detail', ['requestId' => '????']) }}`
                    return linkRoot.replace("????", requestId);
                },
                handleSearch: (typeSearch) => {
                    if (typeSearch == 'all') {
                        var urlParam = new URL(`${window.location.origin}${window.location.pathname}`);
                        app.keyword = '';
                        app.request_id = '';
                        app.employee_id = '';
                        app.type = '';
                    } else {
                        var urlParam = new URL(window.location);
                        urlParam.searchParams.set('keyword', app.keyword);
                        urlParam.searchParams.set('request_id', app.request_id);
                        urlParam.searchParams.set('employee_id', app.employee_id);
                        urlParam.searchParams.set('type', app.type);
                    }
                    window.history.pushState({}, '', urlParam);

                    let params = location.search;
                    $('.overlay-load').css('display', 'flex');
                    axios.get(`{{route('get-request-data')}}${ params }`).then(({data}) => {
                        app.requestProcessData = data.process;
                        app.requestAcceptedData = data.accepted
                        app.requestUnapprovedData = data.unapproved
                        $('.overlay-load').css('display', 'none');
                    })
                }
            }
        })
    </script>
@endsection

