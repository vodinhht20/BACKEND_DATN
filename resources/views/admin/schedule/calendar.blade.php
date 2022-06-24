@extends('admin.layouts.main')
@section('title')
<title>Cài đặt lịch làm việc</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/calendar.css')}}">
    <link rel="stylesheet" href="{{asset('frontend/css/select2.min.css')}}">
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
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Thêm ca làm việc cho công ty</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                </div>
                <div class="modal-body">
                    <form>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Tên lịch làm việc</label>
                            <input type="text" class="form-control" name="workShiftName" v-model="workShiftName">
                        </div>
                        <div class="form-group">
                            <label for="applyFor" class="col-form-label">Áp dụng cho</label>
                            <select id="applyFor" class="form-control" v-model="applyFor" @change="onChangeTypeWorkSchedule($event)">
                                <option value="1" selected>Toàn công ty</option>
                                <option value="2">Phòng ban</option>
                                <option value="3">Vị trí</option>
                                <option value="4">Nhân viên</option>
                            </select>
                        </div>
                        <div class="form-group" v-if="applyFor == 2">
                            <label for="" class="col-form-label">Phòng ban áp dụng</label>
                            <select id="" class="form-control">
                            </select>
                        </div>
                        <div class="form-group"  v-else-if="applyFor == 3">
                            <label for="" class="col-form-label">Vị trí áp dụng</label>
                            <select id="" class="form-control">
                            </select>
                        </div>
                        <div class="form-group" v-else-if="applyFor == 4">
                            <label for="select_employee" class="col-form-label">Nhân viên áp dụng</label>
                            <select id="select_employee" class="form-control">
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="recipient-name" class="col-form-label">Ca làm việc</label>
                            <div v-for="(workshift, index) in dataWorkShifts" class="company-shift">
                                <div class="row mt-2 align-items-center">
                                    <div class="col-11 row" style="margin: unset; grid-column-gap: 10px; align-items: center;">
                                        <input type="text" class="form-control col-5" name="shiftName[]" v-model="workshift.shiftName" placeholder="Tên ca làm">
                                        <date-picker v-model="workshift.shiftTime" lang="vn" type="time" range placeholder="Select time" format="HH:mm" value-type="format"></date-picker>
                                    </div>
                                    <div class="col-1 btn-remote btn-remove" v-if="dataWorkShifts.length > 1  && dataWorkShifts.length != index+1" @click="removeWorkShift(index)"><i class="ti-close"></i></div>
                                    <div class="col-1 btn-remote btn-add" v-else @click="addWorkShift"><i class="ti-plus"></i></div>
                                </div>
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
                            <date-picker v-model="intervalDay" lang="vn" range value-type="YYYY-MM-DD" format="DD-MM-YYYY"></date-picker>
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
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script src="{{ asset('frontend/js/select2.min.js') }}"></script>
    <script  type="text/javascript">
        var app = new Vue({
            el: '#app',
            data: {
                intervalDay: '',
                workShiftName: '',
                applyFor: null,
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
                        Swal.fire({
                            title: 'Thành công',
                            text: 'Thêm lịch làm việc thành công',
                            icon: 'success'
                        }).then(() => {
                            app.onHanldeCloseSweet()
                        });
                    } catch (error) {
                        Swal.fire(
                            'Thêm lịch làm việc thất bại',
                            'Vui lòng liên hệ quản trị viên để được hỗ trợ',
                            'error'
                        );
                        console.log(error);
                    }
                },
                onHanldeCloseSweet: () => {
                    location.reload();
                },
                onChangeTypeWorkSchedule: ($event) => {
                    if ($event.target.value) {

                    }
                }

            }
        })
        $('#select_employee').select2({
            placeholder: "Lựa chọn thành viên",
        });
    </script>
@endsection