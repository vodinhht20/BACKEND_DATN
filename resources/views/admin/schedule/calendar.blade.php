@extends('admin.layouts.main')
@section('title')
<title>Cài đặt lịch làm việc</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/calendar.css')}}">
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
        var app = new Vue({
            el: '.tab-vue',
            data: {
                intervalDay: '',
                workShiftName: '',
                dataWorkShifts: [{ shiftName: '', shiftTime: '' }],
                dataWorkShiftDays: [
                    { id: 0, name: "Chủ Nhật", active: 0},
                    { id: 2, name: "Thứ 2", active: 0},
                    { id: 3, name: "Thứ 3", active: 0},
                    { id: 4, name: "Thứ 4", active: 0},
                    { id: 5, name: "Thứ 5", active: 0},
                    { id: 6, name: "Thứ 6", active: 0},
                    { id: 7, name: "Thứ 7", active: 0},
                ]
            },
            methods: {
                addWorkShift: () => {
                    app.dataWorkShifts.push({ shiftName: '', shiftTime: '' });
                },
                removeWorkShift: (indexItem) => {
                    app.dataWorkShifts = app.dataWorkShifts.filter((item, index) => index != indexItem)
                },
                chooseDateName: (itemId) => {
                    app.dataWorkShiftDays = app.dataWorkShiftDays.map(dataItem => {
                        if (dataItem.id == itemId) {
                            return { ...dataItem, active: dataItem.active ? 0 : 1 }
                        }
                        return dataItem
                    });
                },
                handleSubmmitAddWorkShift: async () => {
                    const days = app.dataWorkShiftDays.map(item => {
                            if (item.active == 1) {
                                return item.id;
                            }
                        })
                        .filter(item => item);
                    const data = {
                        interval_day: app.intervalDay,
                        work_shift_name: app.workShiftName,
                        days: days,
                        work_shifts: app.dataWorkShifts
                    }
                    console.log(data);
                    try {
                        const response = await axios.post(`{{ route('schedule-ajax-add-work-shift') }}`, data);
                        Swal.fire(
                            'Thành công',
                            'Hiện tại chưa thể thêm được ca làm =))',
                            'success'
                        );
                    } catch (error) {
                        Swal.fire(
                            'Thêm lịch làm việc thất bại',
                            'Vui lòng liên hệ quản trị viên để được hỗ trợ',
                            'error'
                        );
                        console.log(error);
                    }
                }

            }
        })
    </script>
@endsection