@extends('admin.layouts.main')
@section('title')
    <title>Sản Phẩm | Thêm Mới</title>
@endsection
@section('style-page')
    <!-- datepicker.css -->
    <link rel="stylesheet" type="text/css" href="{{asset('frontend')}}/css/company-info.css">
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Quản lý công ty</h5>
                    <p class="m-b-0">Quản lý công ty của bạn</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Công ty</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
<div class="company-info">
    <div class="col-lg-12 col-xl-6">
        <div class="sub-title">Left Tab</div>
        <!-- Nav tabs -->
        <ul class="nav nav-tabs md-tabs tabs-left b-none" role="tablist">
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#home5" role="tab" aria-expanded="false">
                    <i class="ti-layout-media-overlay"></i><br>
                    Thông tin <br> công ty</a>
                <div class="slide"></div>
            </li>
            <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#profile5" role="tab" aria-expanded="false">
                    <i class="ti-wallet"></i><br>
                    Hệ thống <br> chi nhánh</a>
                <div class="slide"></div>
            </li>
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#messages5" role="tab">Messages</a>
                <div class="slide"></div>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#settings5" role="tab">Settings</a>
                <div class="slide"></div>
            </li> --}}
            {{-- <li class="nav-item">
                <a class="nav-link" data-toggle="tab" href="#edit5" role="tab">edit</a>
                <div class="slide"></div>
            </li> --}}
        </ul>
        <!-- Tab panes -->
        <div class="tab-content tabs-left-content card-block">
            <div class="tab-pane active" id="home5" role="tabpanel">
                <div class="card">
                    <div class="card-header">
                        <h5>Thông tin công ty</h5>
                        <div style="display: block;" class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li class="nav-item"><i class="fa fa fa-wrench open-card-option"></i><a data-toggle="tab" href="#messages5" role="tab" aria-expanded="false">Cập nhật thông tin công ty</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tbody>
                                    <tr>
                                        <td><i class="ti-mobile"></i> Hotline</td>
                                        <td><i class="ti-google"></i> Website</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-email"></i>  Email</td>
                                        <td><i class="ti-facebook"></i> Fanpage</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-layout-column4-alt"></i> Mã số thuế</td>
                                        <td><i class="ti-home"></i> Trụ sở chính</td>
                                    </tr>
                                    <tr>
                                        <td><i class="ti-view-list"></i> Mô tả</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="profile5" role="tabpanel">
                <div style="overflow-x: auto;" class="card">
                    <div class="card-header">
                        <h5>Hệ thống chi nhánh</h5>
                        <div style="display: block;" class="card-header-right">
                            <ul class="list-unstyled card-option">
                                <li class="nav-item">
                                    <i class="fa fa fa-wrench open-card-option"></i>
                                    <a data-toggle="tab" href="#settings5" role="tab">Thêm chi nhánh</a>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-block table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>STT</th>
                                        <th>Tên chi nhánh</th>
                                        <th>Mã chi nhánh</th>
                                        <th>Địa chỉ nhánh</th>
                                        <th>Hotline</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>1</td>
                                        <td>Chi nhánh Hà Nội</td>
                                        <td>CHHN</td>
                                        <td>Hà Nội</td>
                                        <td>19006186</td>
                                        <td><a href=""><i class="ti-trash"></i></a> <a data-toggle="tab" href="#edit5" role="tab"><i style="float: right" class="ti-pencil"></i></a></td>
                                    </tr>
                                    <tr>
                                        <td>2</td>
                                        <td>Chi nhánh TP.HCM</td>
                                        <td>CHH</td>
                                        <td>TP.HCM</td>
                                        <td>19001234</td>
                                        <td><a href=""><i class="ti-trash"></i></a> 
                                            <a data-toggle="tab" href="#edit5" role="tab"><i style="float: right" class="ti-pencil"></i></a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="messages5" role="tabpanel">
                <div class="col-md-6">
                    <div class="card1">
                        <div class="card-header">
                            <h5>Cập nhật thông tin công ty</h5>
                        </div>
                        <div class="card-block">
                            <form class="form-material" method="post">
                                <div class="form-group form-default">
                                    <input type="text" name="name" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Tên công ty</label>
                                </div>
                                <div class="form-group form-default">
                                    <input type="text" name="email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Địa chỉ email công ty</label>
                                </div>
                                <div class="form-group form-default">
                                    <input type="number" name="hotline" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Hotline công ty</label>
                                </div>
                                <div class="form-group form-default">
                                    <input type="text" name="footer-email" class="form-control" required="" >
                                    <span class="form-bar"></span>
                                    <label class="float-label">Website công ty</label>
                                </div>
                                <div class="form-group form-default">
                                    <input type="text" name="footer-email" class="form-control" required="" >
                                    <span class="form-bar"></span>
                                    <label class="float-label">Fanpage công ty</label>
                                </div>
                                <div class="form-group form-default">
                                    <input type="text" name="footer-email" class="form-control" required="">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Địa chỉ trụ sở chính công ty</label>
                                </div>
                                <div class="form-group form-default">
                                    <input type="text" name="footer-email" class="form-control" required="" maxlength="6">
                                    <span class="form-bar"></span>
                                    <label class="float-label">Mã số thuế</label>
                                </div>
                                <div class="form-group form-default">
                                    <textarea class="form-control" required=""></textarea>
                                    <span class="form-bar"></span>
                                    <label class="float-label">Mô tả</label>
                                </div>
                                <button class="btn btn-info waves-effect waves-light">Cập nhật</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane" id="settings5" role="tabpanel">
                <div class="card-header">
                    <h5>Thêm chi nhánh</h5>
                </div>
                <div class="card-block1">
                    <form class="form-material" method="post">
                        <div class="form-group form-default">
                            <input type="text" name="name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Tên chi nhánh</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="text" name="email" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Mã chi nhánh</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="number" name="hotline" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Địa chỉ chi nhánh</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="text" name="footer-email" class="form-control" required="" >
                            <span class="form-bar"></span>
                            <label class="float-label">Hotline</label>
                        </div>
                        <button class="btn btn-info waves-effect waves-light">Cập nhật</button>
                    </form>
                </div>
            </div>
            <div class="tab-pane" id="edit5" role="tabpanel">
                <div class="card-header">
                    <h5>Cập nhập chi nhánh</h5>
                </div>
                <div class="card-block1">
                    <form class="form-material" method="post">
                        <div class="form-group form-default">
                            <input type="text" name="name" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Tên chi nhánh</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="text" name="email" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Mã chi nhánh</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="number" name="hotline" class="form-control" required="">
                            <span class="form-bar"></span>
                            <label class="float-label">Địa chỉ chi nhánh</label>
                        </div>
                        <div class="form-group form-default">
                            <input type="text" name="footer-email" class="form-control" required="" >
                            <span class="form-bar"></span>
                            <label class="float-label">Hotline</label>
                        </div>
                        <button class="btn btn-info waves-effect waves-light">Cập nhật</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('page-script')

@endsection