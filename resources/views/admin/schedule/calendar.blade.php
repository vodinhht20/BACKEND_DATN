@extends('admin.layouts.main')
@section('title')
<title>Cài đặt lịch làm việc</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/calendar.css')}}">
    {{-- <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}"> --}}
@endsection
@section('header-page')
<div class="page-header">
    <div class="page-block">
        <div class="row align-items-center">
            <div class="col-md-8">
                <div class="page-header-title">
                    <h5 class="m-b-10">Cài đặt lịch làm việc</h5>
                    <p class="m-b-0">Thiết lập thời gian làm việc cho toàn công ty, phòng ban hoặc từng nhân viên</p>
                </div>
            </div>
            <div class="col-md-4">
                <ul class="breadcrumb-title">
                    <li class="breadcrumb-item">
                        <a href="{{route('dashboard')}}"> <i class="fa fa-home"></i> </a>
                    </li>
                    <li class="breadcrumb-item"><a href="">Lịch làm việc</a>
                    </li>
                </ul>
            </div>
        </div>
    </div>
</div>
@endsection
@section('content')
    <div class="box-section-calendar" id="app">
        <div class="card">
            <div class="card-header">
                <div class="nav-tab-calendar">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs unset-boder" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" data-toggle="tab" href="#company_tab" role="tab"><i class="ti-agenda"></i>Toàn công ty</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#department_tab" role="tab"><i class="ti-blackboard"></i>Phòng ban</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#position_tab" role="tab"><i class="ti-direction"></i>Vị trí công việc</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" data-toggle="tab" href="#employee_tab" role="tab"><i class="ti-user"></i>Nhân viên</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="card-block" style="padding-top: unset;">
                <!-- Tab panes -->
                <div class="tab-content">
                    <div class="tab-pane active tab-vue" id="company_tab" role="tabpanel">
                        @include('admin.schedule.calendar.companyTab')
                    </div>
                    <div class="tab-pane tab-vue" id="department_tab" role="tabpanel">
                        @include('admin.schedule.calendar.departmentTab')
                    </div>
                    <div class="tab-pane tab-vue" id="position_tab" role="tabpanel">
                        @include('admin.schedule.calendar.positionTab')
                    </div>
                    <div class="tab-pane tab-vue" id="employee_tab" role="tabpanel">
                        @include('admin.schedule.calendar.employeeTab')
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script  type="text/javascript">
        Vue.use(DatePicker.default);
        new Vue({
            el: '.tab-vue',
            data: {
                intervalDay: '',
                shiftTime: ''
            }
        })
    </script>
@endsection