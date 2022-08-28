@extends('admin.layouts.main')
@section('title')
<title>TimeWorks Manager</title>
@endsection
@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css?v1.0.5">
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
    <div class="box-section-timesheet row app_vue">
        {{-- <div class="col-md-12 col-lg-2 col-sm-12 tabs row">
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item" @click="changeTab('timesheet')" :class="{ active: current_tab == 'timesheet'}">
                <i class=" ti-clipboard"></i>
                <p>Bảng công</p>
            </div>
            <div class="col-lg-12 col-md-3 col-sm-4 tab-item" @click="changeTab('setting')" :class="{ active: current_tab == 'setting'}">
                <i class=" ti-settings"></i>
                <p>Cài đặt ngày chốt công</p>
            </div>
        </div> --}}
        <div class="col-md-12 col-lg-12 col-sm-12 card">
            <div class="tab-pane card-header" :class="{ active: current_tab == 'timesheet'}" >
                <div class="row align-items-center unset-width">
                    <div class="col-7">
                        <h4>Quản lí bảng công</h4>
                    </div>
                    <div class="col-5 d-flex justify-content-end">
                        <a href="javascript:void(0)" class="btn btn-outline-primary btn-round waves-effect waves-light mr-2" data-toggle="modal" data-target="#modal_synchronized">
                            <i class="ti-reload"></i>
                            Đồng bộ dữ liệu
                        </a>
                        <a href="{{ route("export-excel-timesheet") }}?{{ http_build_query(request()->query()) }}" class="btn btn-outline-primary btn-round waves-effect waves-light">
                            <i class="ti-printer"></i>
                            Xuất Excel
                        </a>
                    </div>
                </div>
                <form action="" class="mt-3">
                    <div class="row unset-width">
                        <div class="form-group col-lg-12">
                            <input type="text" name="keywords" placeholder="Nhập tên nhân viên..." id="keywords" filter="keywords" class="form-control filter-data" value="{{ request()->keywords }}">
                        </div>
                        <div class="form-group col-lg-4">
                            <input class="form-control" type="hidden" name="month" :value="inputMounth" placeholder="Lựa chọn tháng">
                            <date-picker v-model="inputMounth" type="month" value-type="YYYY-MM" format="MM-YYYY" placeholder="Select month" name="month"></date-picker>
                        </div>
                        <div class="form-group col-lg-4">
                            <input type="hidden" name="departments" :value="departmentValue">
                            <treeselect v-model="departmentValue" :multiple="true" :options="departments" :disable-branch-nodes="true"/>
                        </div>
                        <div class="form-group col-lg-4">
                            <button class="btn btn-primary btn-sm">Tìm Kiếm</button>
                        </div>
                    </div>
                </form>
                <div class="task_Manager" style="margin-top: 20px">
                    <div class="flex" style="display: flex">
                        <div class="items-center" >
                            <div class="w-10 h-10 rounded-full" style="background-color: var(--color-hr-4);"></div>
                            <span class="text-grey55">Chấm công đúng giờ</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: var(--color-hr-5);"></div>
                            <span class="text-grey55">Đi muộn/ Về sớm</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: var(--color-hr-1);"></div>
                            <span class="text-grey55">Công bên ngoài</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: var(--color-hr-6);"></div>
                            <span class="text-grey55">Không chấm công</span>
                        </div>
                        <div class="items-center">
                            <div class="w-10 h-10 rounded-full" style="background-color: var(--color-hr-3);"></div>
                            <span class="text-grey55">Có lỗi</span>
                        </div>
                    </div>
                    <div>
                        <p>Có <b>{{ $timesheetFormats->total() }}</b> nhân viên trong danh sách</p>
                    </div>
                    <div class="table-border-style">
                        <div class="table-responsive scrollbar-custom" style="width:100%;">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th class="ps-absolute" style="height: 65px !important;">Tên nhân viên</th>
                                        @foreach ($formatDates as $date => $dateName)
                                            <th class="tabletimekeeps @if ($loop->index == 0) ps-left  @endif">
                                                {{$date}}
                                                <br/>
                                                {{$dateName}}
                                            </th>
                                        @endforeach
                                        <th class="table-align-center">Công thực tế</th>
                                        <th class="table-align-center">Công nghỉ phép</th>
                                        <th class="table-align-center">Công nghỉ lễ</th>
                                        <th class="table-align-center">Công không lương</th>
                                        <th class="table-align-center">Số giờ OT</th>
                                        <th class="table-align-center">Giờ làm việc</th>
                                        <th class="table-align-center">Số phút đi muộn</th>
                                        <th class="table-align-center">Số phút về sớm</th>
                                        <th class="table-align-center">Công hiện tại</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($timesheetFormats as $timesheet)
                                    <tr>
                                        <td class="ps-absolute">{{ $timesheet['employee']?->fullname }}</td>
                                            @foreach ($formatDates as $date => $dateName)
                                                @if (isset($timesheet['timesheet'][$date]))
                                                    @php
                                                        $timesheetByDate = $timesheet['timesheet'][$date];
                                                        $className = "bg-customize-hr-4";
                                                        if ($timesheetByDate["minute_late"] > 0 || $timesheetByDate["minute_early"] >  0) {
                                                            $className = "bg-customize-hr-5";
                                                        } else if ($timesheetByDate["type"] == config("timekeep.type.import")) {
                                                            $className = "bg-customize-hr-1";
                                                        } else if (empty($timesheetByDate['worktime'])) {
                                                            $className = "bg-customize-hr-6";
                                                        }
                                                    @endphp
                                                    <td class="tabletimekeeps {{ $className }} @if ($loop->index == 0) ps-left  @endif">
                                                        <div class="flex-col">
                                                            <span>{{ $timesheetByDate['worktime'] }}</span>
                                                        </div>
                                                    </td>
                                                @else
                                                    <td class="tabletimekeeps bg-customize-hr-6">
                                                        <div class="flex-col">
                                                            <span>0</span>
                                                        </div>
                                                    </td>
                                                @endif
                                            @endforeach
                                            <td>{{ $timesheet['sum_reality_worktime'] ?? 0 }}</td>
                                            <td>{{ $timesheet["sum_leave_worktime"] ?? 0 }}</td>
                                            <td>{{ $timesheet["sum_holiday_worktime"] ?? 0 }}</td>
                                            <td>{{ $timesheet['sum_no_salary_worktime'] ?? 0 }}</td>
                                            <td>{{ $timesheet['sum_overtime_hour_worktime'] }}</td>
                                            <td>{{ $timesheet['sum_worktime_hour'] }}</td>
                                            <td>{{ $timesheet['sum_minute_late_worktime'] }}</td>
                                            <td>{{ $timesheet['sum_minute_early_worktime'] }}</td>
                                            <td>{{ $timesheet['sum_current_worktime'] }}</td>
                                        </tr>
                                    @endforeach

                                    @if (count($timesheetFormats) == 0)
                                        <tr>
                                            <td class="ps-absolute" style="height: 300px !important;">...</td>
                                            <td colspan="{{ count($formatDates) + 9 }}" class="box_data_empty"  style="height: 300px !important;">
                                                <img src="{{asset('frontend')}}/image/empty_data.png" alt="" style="width: 220px ;">
                                            </td>
                                        </tr>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                        <div class="dataTables_pager" style="margin-top: 30px; float: right;">
                            {{  $timesheetFormats->appends(request()->all()) }}
                        </div>
                    </div>
                </div>
            </div>
            <div class="tab-pane card-block setting-timesheet" :class="{ active: current_tab == 'setting'}">
                <h2>Cài đặt ngày chốt công</h2>
                <p>Chọn 1 trong 2 cách</p>
                <div class="tab-radio">
                    <div class="item" >
                        <input type="radio" value="OP01" name="checked" v-model="settingPicked">
                        <label for="">Ngày cuối cùng của tháng </label>
                    </div>
                    <div class="item">
                        <input type="radio" value="OP02"  name="checked" v-model="settingPicked">
                        <label for=""> Người dùng tự chọn ngày cố định mỗi tháng</label>
                    </div>
                </div>
                <div class="tab-select-time" v-if="settingPicked == 'OP02'">
                    <div class="select-time">
                        <label fotab-select-timer="">Chọn ngày chấm công bất kỳ trong tháng</label>
                        <select name=""  class="form-control ml-2">
                            @for ($day = 1; $day <= 31; $day++)
                                <option value="{{$day}}">Ngày {{$day}}</option>
                            @endfor
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary btn-sm" style="float:right; margin-right:30px">Lưu</button>
            </div>
        </div>

        @include('admin.timesheet._partials.modals');

        <div class="overlay-load" style="position: fixed !important; text-align: center;">
            <img src="{{asset('frontend')}}/image/loading.gif" alt="">
            <p style="color: #3c2525;" id="label-loading">Vui lòng chờ ...</p>
        </div>
    </div>
@endsection

@section('page-script')
    <script src="{{ asset('frontend/js/datepicker.js') }}"></script>
    <script>
        Vue.component('treeselect', VueTreeselect.Treeselect);
        Vue.config.devtools = true
        var app = new Vue({
            el: '.app_vue',
            data: {
                inputMounth: "{{ $inpMonth }}",
                departmentValue: {!! json_encode($requestDepartments) !!},
                departments: {!! json_encode($departments) !!},
                current_tab: "timesheet",
                settingPicked: "",
                inputMounthImport: "",
                formFileImport: "",
                dataPreview: {},
                inputFile: "",
                recordNotExist: {}
            },
            methods: {
                changeTab: (tab) => {
                    app.current_tab = tab;
                },
                synchronized: () => {
                    Swal.fire({
                        title: 'Xác nhận đồng bộ',
                        text: "Bạn đã xem trước dữ liệu và không có gì sai sót. Hành động này không thể khôi phục. Xác nhận đồng bộ ?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Xác nhận'
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $('.overlay-load').css('display', 'flex');
                            var data = new FormData();
                            data.append('file', document.getElementById('inpFile').files[0]);
                            data.append('date', app.inputMounthImport);
                            data.append('file', app.formFileImport);
                            $("#label-loading").html("Vui lòng chờ ...");
                            setTimeout(() => {
                                $("#label-loading").html("Vui lòng đợi ... ! <br/>Chúng tôi đang xử lý thông tin ...");
                            }, 5000);
                            axios.post("{{route('import-excel-timesheet')}}", data, {
                                headers: {
                                    'Content-Type': 'multipart/form-data'
                                },
                                onUploadProgress: function(progressEvent) {
                                    console.log("percentCompleted", percentCompleted);
                                    var percentCompleted = Math.round( (progressEvent.loaded * 100) / progressEvent.total );
                                }
                            })
                            .then(({data}) => {
                                $('.overlay-load').css('display', 'none');
                                Swal.fire({
                                    title: 'Thành công',
                                    html: `
                                    <div>
                                        <p>Đã đồng bộ thàng công: </p>
                                        <ul>
                                            <li>Tổng số: <b>${data.total_record}</b> bản ghi</li>
                                            <li>Thành công: <b>${data.record_susscess.length}</b> bản ghi</li>
                                            <li>Thất bại: <b>${data.record_failed.length}</b> bản ghi</li>
                                            <li>Nhân viên không tồn tại: <b>${data.record_not_exist.length}</b> bản ghi</li>
                                        </ul>
                                    </div>`,
                                    icon: 'success'
                                }).then(() => {
                                    location.reload();
                                });
                            })
                            .catch(error => {
                                $('.overlay-load').css('display', 'none');
                                Swal.fire({
                                    title: 'Thất bại',
                                    html: `Đồng bộ thất bại`,
                                    icon: 'warning'
                                });
                            });
                        }
                    })
                },
                previewDataImport: () => {
                    app.dataPreview = {};
                    app.recordNotExist = {};
                    var data = new FormData();
                    data.append('file', document.getElementById('inpFile').files[0]);
                    data.append('date', app.inputMounthImport);
                    data.append('file', app.formFileImport);
                    axios.post("{{route('preview-import-excel-timesheet')}}", data, {
                        headers: {
                            'Content-Type': 'multipart/form-data'
                        }
                    })
                    .then(({data}) => {
                        app.dataPreview = data.data;
                        app.recordNotExist = data.recordNotExist;
                    })
                    .catch((error) => {
                        $('#modal_preview_import').modal('hide');
                        Swal.fire({
                            title: 'Thất bại',
                            html: error?.response?.data?.messages || "Đã có lỗi xảy ra",
                            icon: 'warning'
                        });
                    })
                },
                changeFileImport: ($event) => {
                    // const dataForm = $event.target.files[0];
                    // app.formFileImport = new FormData();
                    // app.formFileImport.append('file', dataForm);
                },
                validateDay: (date) => {
                    console.log("date: ", date);
                    return false;
                }
            },
        });
    </script>
@endsection
