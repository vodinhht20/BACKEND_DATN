@extends('admin.layouts.main')
@section('title')
<title>Cài đặt lịch làm việc</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
    <style>
        .my-active span{
			background-color: #5cb85c !important;
			color: white !important;
			border-color: #5cb85c !important;
		}
        .mx-datepicker-range, .mx-datepicker {
            width: 100%;
        }
        .modal-create-schedule input{
            text-align: center;
        }
    </style>
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
            <div class="card-header" style="box-shadow: unset;">
                <div class="nav-tab-calendar">
                    <!-- Nav tabs -->
                    <ul class="nav nav-tabs md-tabs unset-boder" role="tablist">
                        <li class="nav-item" @click="changeTab('company_tab')">
                            <a class="nav-link" :class="{ active: current_tab == 'company_tab'}" data-toggle="tab" href="#company_tab" role="tab"><i class="ti-agenda"></i>Toàn công ty</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item" @click="changeTab('department_tab')">
                            <a class="nav-link" :class="{ active: current_tab == 'department_tab'}" data-toggle="tab" href="#department_tab" role="tab"><i class="ti-blackboard"></i>Phòng ban</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item" @click="changeTab('position_tab')">
                            <a class="nav-link" :class="{ active: current_tab == 'position_tab'}" data-toggle="tab" href="#position_tab" role="tab"><i class="ti-direction"></i>Vị trí công việc</a>
                            <div class="slide"></div>
                        </li>
                        <li class="nav-item" @click="changeTab('employee_tab')">
                            <a class="nav-link" :class="{ active: current_tab == 'employee_tab'}" data-toggle="tab" href="#employee_tab" role="tab"><i class="ti-user"></i>Nhân viên</a>
                            <div class="slide"></div>
                        </li>
                    </ul>
                    <button class="btn btn-outline-primary btn-round waves-effect btn-sm waves-light mr-3" style="padding-top: 10px; float: right;"  data-toggle="modal" data-target="#exampleModal">
                        <i class="ti-plus"></i>
                        Thêm mới
                    </button>
                </div>
            </div>
            <div class="card-block" style="padding-top: unset;">
                <!-- Tab panes -->
                <div class="tab-contents">
                    <div class="" v-if="current_tab == 'company_tab'" id="company_tab" role="tabpanel">
                        @include('admin.schedule.calendar.companyTab')
                    </div>
                    <div class="" v-if="current_tab == 'department_tab'" id="department_tab" role="tabpanel">
                        @include('admin.schedule.calendar.departmentTab')
                    </div>
                    <div class="" v-if="current_tab == 'position_tab'" id="position_tab" role="tabpanel">
                        @include('admin.schedule.calendar.positionTab')
                    </div>
                    <div class="" v-if="current_tab == 'employee_tab'" id="employee_tab" role="tabpanel">
                        @include('admin.schedule.calendar.employeeTab')
                    </div>
                </div>
            </div>
        </div>
        <!-- Modal -->
        <div class="modal fade modal-create-schedule" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Thêm lịch làm việc cho công ty</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    </div>
                    <div class="modal-body overflow-modal scrollbar-right-custom">
                        <form>
                            <div class="form-group">
                                <label for="recipient-name" class="col-form-label">Tên lịch làm việc</label>
                                <input type="text" class="form-control" name="workShiftName" placeholder="Nhập lịch làm việc ..." v-model="workShiftName">
                            </div>
                            <div class="form-group">
                                <label for="subject_type" class="col-form-label">Áp dụng cho</label>
                                <select id="subject_type" class="form-control" v-model="subject_type" @change="onChangeTypeWorkSchedule($event)">
                                    <option value="1">Toàn công ty</option>
                                    <option value="2">Phòng ban</option>
                                    <option value="3">Vị trí</option>
                                    <option value="4">Nhân viên</option>
                                </select>
                            </div>
                            <div class="form-group" v-if="subject_type == 2">
                                <label for="" class="col-form-label">Phòng ban áp dụng</label>
                                <select id="" class="form-control" v-model="department_id">
                                    @foreach ($departments as $department)
                                        <option value="{{ $department->id }}">{{ $department->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group"  v-else-if="subject_type == 3">
                                <label for="" class="col-form-label">Vị trí áp dụng</label>
                                <select id="" class="form-control" v-model="position_id">
                                    @foreach ($positions as $position)
                                        <option value="{{ $position->id }}">{{ $position->name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group" v-else-if="subject_type == 4">
                                <label for="select_employee" class="col-form-label">Nhân viên áp dụng</label>
                                <select id="select_employee" class="form-control" v-model="employee_id">
                                    @foreach ($employees as $employee)
                                        <option value="{{ $employee->id }}">{{ $employee->fullname }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group row work-time">
                                <div class="col-lg-6">
                                    <label for="recipient-name" class="col-form-label">Thời gian làm việc</label>
                                    <date-picker lang="vn" type="time" v-model="work_time" range placeholder="Khoảng thời gian làm việc" format="HH:mm" value-type="format"></date-picker>
                                </div>
                                <div class="col-lg-6">
                                    <label for="recipient-name" class="col-form-label">Số công</label>
                                    <input type="number" class="form-control" placeholder="Nhập số công" v-model="actual_workday">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-lg-6">
                                    <label for="recipient-name" class="col-form-label">Thời gian trễ checkin (phút)</label>
                                    <date-picker lang="vn" type="time" v-model="checkin_late" placeholder="Chọn số phút" format="mm" value-type="format"></date-picker>
                                </div>
                                <div class="col-lg-6">
                                    <label for="recipient-name" class="col-form-label">Thời gian trễ checkout (phút)</label>
                                    <date-picker lang="vn" type="time" v-model="checkout_late" placeholder="Chọn số phút" format="mm" value-type="format"></date-picker>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-lg-6">
                                        <label for="recipient-name" class="col-form-label">Số giờ tối thiểu (> n giờ)</label>
                                        <input type="number" class="form-control" v-model="late_hour" placeholder="Nhập số giờ tối thiếu ">
                                    </div>
                                    <div class="col-lg-6">
                                        <label for="recipient-name" class="col-form-label">Số công</label>
                                        <input type="number" class="form-control" v-model="virtual_workday" placeholder="Nhập số công">
                                    </div>
                                </div>
                                <div class="mt-1">
                                    <i><b>Lưu ý: </b>Nếu số giờ làm việc tối thiểu > <b>n</b> giờ thì sẽ được <b>n</b> công</i>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="col-form-label">Ngày áp dụng trong tuần</label>
                                <div class="box-day-name">
                                    <span :class="dataWorkShiftDay.active ? 'item-day-name active' : 'item-day-name' " v-for="dataWorkShiftDay in dataWorkShiftDays" @click="chooseDateName(dataWorkShiftDay.id)">@{{ dataWorkShiftDay.name }}</span>
                                </div>
                            </div>
                            <div class="form-group interval-day">
                                <label class="col-form-label">Thời gian hiệu lực</label>
                                <date-picker v-model="intervalDay" lang="vn" range value-type="YYYY-MM" format="MM-YYYY" type="month" placeholder="Lựa chọn khoảng thời gian"></date-picker>
                                <input type="hidden" v-if="intervalDay" :value="intervalDay">
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-dismiss="modal">Hủy bỏ</button>
                        <button type="button" class="btn btn-primary btn-sm" @click="handleSubmmitAddWorkShift()">Lưu lại</button>
                    </div>
                </div>
            </div>
        </div>
        <div class="overlay-load">
            <img src="{{asset('frontend')}}/image/loading.gif" alt="">
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script  type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                work_time: '',
                actual_workday: 0,
                checkin_late: '',
                checkout_late: '',
                late_hour: 0,
                virtual_workday: 0,
                intervalDay: '',
                workShiftName: '',
                employee_id: null,
                position_id: null,
                department_id: null,
                subject_type: 1,
                company_interval_day: {!! json_encode(request()->get('company_interval_day') ? explode(",", request()->get('company_interval_day')) : 0)  !!},
                department_interval_day: {!!  json_encode(request()->get('department_interval_day') ? explode(",", request()->get('department_interval_day')) : 0 ) !!},
                employee_interval_day: {!!  json_encode(request()->get('employee_interval_day') ? explode(",", request()->get('employee_interval_day')) : 0 ) !!},
                position_interval_day: {!!  json_encode(request()->get('position_interval_day') ? explode(",", request()->get('position_interval_day')) : 0 ) !!},
                current_tab: "company_tab",
                dataWorkShiftDays: [
                    { id: 0, name: "Chủ Nhật", active: 0},
                    { id: 2, name: "Thứ 2", active: 1},
                    { id: 3, name: "Thứ 3", active: 1},
                    { id: 4, name: "Thứ 4", active: 1},
                    { id: 5, name: "Thứ 5", active: 1},
                    { id: 6, name: "Thứ 6", active: 1},
                    { id: 7, name: "Thứ 7", active: 0},
                ]
            },
            methods: {
                changeTab: (tab) => {
                    app.current_tab = tab;
                    var urlParam = new URL(window.location);
                    urlParam.searchParams.set('current_tab', tab);
                    window.history.pushState({}, '', urlParam);
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
                        work_shift_name: app.workShiftName,
                        subject_type: app.subject_type,
                        employee_id: app.employee_id,
                        position_id: app.position_id,
                        department_id: app.department_id,
                        work_time: app.work_time,
                        actual_workday: app.actual_workday,
                        checkin_late: app.checkin_late,
                        checkout_late: app.checkout_late,
                        late_hour: app.late_hour,
                        virtual_workday: app.virtual_workday,
                        days: days,
                        interval_day: app.intervalDay
                    }
                    try {
                        $('.overlay-load').css('display', 'flex');
                        const response = await axios.post(`{{ route('schedule-ajax-add-work-shift') }}`, data);
                        $('.overlay-load').css('display', 'none');
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Thêm lịch làm việc thành công',
                            icon: 'success'
                        }).then(() => {
                            let tab = "company_tab";
                            if (app.subject_type == 1) {
                                tab = "company_tab";
                            } else if (app.subject_type == 2) {
                                tab = "department_tab";
                            } else if (app.subject_type == 3) {
                                tab = "position_tab";
                            } else if (app.subject_type == 4) {
                                tab = "employee_tab";
                            }
                            var urlParam = new URL(window.location);
                            urlParam.searchParams.set('current_tab', tab);
                            window.history.pushState({}, '', urlParam);
                            app.onHanldeCloseSweet()
                        });
                    } catch (error) {
                        $('.overlay-load').css('display', 'none');
                        Swal.fire(
                            'Thêm lịch làm việc thất bại',
                            'Vui lòng liên hệ quản trị viên để được hỗ trợ',
                            'error'
                        );
                        console.log(error);
                    }
                },
                onHanldeCloseSweet: () => {
                    $('.overlay-load').css('display', 'flex');
                    location.reload();
                },
                onChangeTypeWorkSchedule: ($event) => {
                    if ($event.target.value) {
                        // tính năng đang phát triển
                    }
                }
            }
        });

        // set current_tab by params
        let params = (new URL(document.location)).searchParams;
        let current_tab = params.get('current_tab');
        app.current_tab = current_tab ? current_tab : 'company_tab';

        $('#select_employee').select2({
            placeholder: "Lựa chọn thành viên",
        });
    </script>
@endsection