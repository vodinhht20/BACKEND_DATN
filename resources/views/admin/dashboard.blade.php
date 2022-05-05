@extends('admin.layouts.main')
@section('title')
    <title>Dashboard</title>
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Dashboard</h5>
                    <p class="m-b-0">Welcome to Mega Able</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="index.html"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="#!">Dashboard</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="row">
    <!-- task, page, download counter  start -->
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-purple">{{ $countProduct }}</h4>
                        <h6 class="text-muted m-b-0">Sản phẩm</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-bar-chart f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-purple">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Tổng số lượng sản phẩm</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-green">{{ $countProductActive }}</h4>
                        <h6 class="text-muted m-b-0">Sản phẩm đang bán</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-file-text-o f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-green">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Tổng số mặt hàng đang được bán</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-red">{{ $countProductTrash }}</h4>
                        <h6 class="text-muted m-b-0">Thùng rác</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-calendar-check-o f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-red">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Các sản phẩm đã xóa</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-xl-3 col-md-6">
        <div class="card">
            <div class="card-block">
                <div class="row align-items-center">
                    <div class="col-8">
                        <h4 class="text-c-blue">{{ $countUser }}</h4>
                        <h6 class="text-muted m-b-0">Thành viên</h6>
                    </div>
                    <div class="col-4 text-right">
                        <i class="fa fa-hand-o-down f-28"></i>
                    </div>
                </div>
            </div>
            <div class="card-footer bg-c-blue">
                <div class="row align-items-center">
                    <div class="col-9">
                        <p class="text-white m-b-0">Tổng số thành viên</p>
                    </div>
                    <div class="col-3 text-right">
                        <i class="fa fa-line-chart text-white f-16"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- task, page, download counter  end -->

    <!--  sale analytics start -->
    <div class="col-xl-8 col-md-12">
        <div class="card">
            <div class="card-header">
                <h5>Sales Analytics</h5>
                <span class="text-muted">Get 15% Off on <a
                        href="https://www.amcharts.com/"
                        target="_blank">amCharts</a> licences. Use code
                    "codedthemes" and get the discount.</span>
                <div class="card-header-right">
                    <ul class="list-unstyled card-option">
                        <li><i class="fa fa fa-wrench open-card-option"></i>
                        </li>
                        <li><i class="fa fa-window-maximize full-card"></i></li>
                        <li><i class="fa fa-minus minimize-card"></i></li>
                        <li><i class="fa fa-refresh reload-card"></i></li>
                        <li><i class="fa fa-trash close-card"></i></li>
                    </ul>
                </div>
            </div>
            <div class="card-block">
                <div id="sales-analytics" style="height: 400px;"></div>
            </div>
        </div>
    </div>
    <div class="col-xl-4 col-md-12">
        <div class="card">
            <div class="card-block">
                <div class="row">
                    <div class="col">
                        <h4>$256.23</h4>
                        <p class="text-muted">This Month</p>
                    </div>
                    <div class="col-auto">
                        <label class="label label-success">+20%</label>
                    </div>
                </div>
                <div class="row">
                    <div class="col-sm-8">
                        <canvas id="this-month" style="height: 150px;"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="card quater-card">
            <div class="card-block">
                <h6 class="text-muted m-b-15">This Quarter</h6>
                <h4>$3,9452.50</h4>
                <p class="text-muted">$3,9452.50</p>
                <h5>87</h5>
                <p class="text-muted">Online Revenue<span
                        class="f-right">80%</span></p>
                <div class="progress">
                    <div class="progress-bar bg-c-blue" style="width: 80%">
                    </div>
                </div>
                <h5 class="m-t-15">68</h5>
                <p class="text-muted">Offline Revenue<span
                        class="f-right">50%</span></p>
                <div class="progress">
                    <div class="progress-bar bg-c-green" style="width: 50%">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--  sale analytics end -->

    <!--  project and team member start -->
   
    <!--  project and team member end -->
</div>
@endsection

@section('page-script')
<script type="text/javascript" src="{{asset('assets')}}/pages/dashboard/custom-dashboard.js"></script>

@endsection
