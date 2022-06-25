<div class="row align-items-end">
    <div class="col-md-3">
        <label for="">Tên lịch làm việc:</label>
        <input type="text" name="employee_calender_name" placeholder="Nhập từ khóa..." filter="employee_calender_name" class="form-control filter-data">
    </div>
    <div class="col-md-3">
        <label for="">Tên nhân viên:</label>
        <input type="text" name="employee_name" placeholder="Nhập từ khóa..." filter="employee_name" class="form-control filter-data">
    </div>
    <div class="col-md-3">
        <label for="">Tên ca làm:</label>
        <input type="text" name="employee_shift_name" placeholder="Nhập từ khóa..." filter="employee_shift_name" class="form-control filter-data">
    </div>
    <div class="col-md-3">
        <label for="">Thời gian hiệu lực:</label>
        <input type="text" name="employee_interval_day" placeholder="Nhập từ khóa..." filter="employee_interval_day" class="form-control filter-data">
    </div>
    <div class="col-md-12 mt-3">
        <button class="btn btn-inverse btn-sm waves-effect waves-light" style="float: right;">Tất cả</button>
        <button class="btn btn-primary btn-sm waves-effect waves-light mr-2" style="float: right;">Tìm kiếm</button>
    </div>
</div>
<div class="mt-5 mb-2 row">
    <div class="col-4">Có <b>{{ $workSchedules['employeeData']->total() }}</b> lịch làm việc trong danh sách</div>
</div>
<div class="">
    <div class="table-border-style">
        <div class="table-responsive">
            <table class="table align-middle-td">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên lịch làm việc</th>
                        <th>Nhân viên</th>
                        <th>Ca làm việc trong lịch</th>
                        <th>Thời gian hiệu lực</th>
                        {{-- <th>Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workSchedules['employeeData'] as $workSchedule)
                        <tr>
                            <td>#{{ $workSchedule->id }}</td>
                            <td>{{ $workSchedule->name }}</td>
                            <td>
                                @if ($workSchedule->employee)
                                    [{{ $workSchedule->employee->id }}] {{ $workSchedule->employee->fullname }}
                                @else
                                    N/A
                                @endif
                            </td>
                            <td>
                                @foreach ($workSchedule->workShift as $workShiftItem)
                                    <div class="content-line mt-2">
                                        <i class="ti-timer"></i>
                                        <strong>{{ $workShiftItem->name }}</strong>
                                        <span class="label label-inverse-primary ml-2">{{ \Carbon\Carbon::createFromFormat('H:i:s', $workShiftItem->work_from)->format('H:i')  }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $workShiftItem->work_to)->format('H:i') }}</span>
                                    </div>
                                @endforeach
                                <div class="content-line mt-2">
                                    <i class="ti-calendar"></i>
                                    <span>
                                        @foreach ($workSchedule->days as $day)
                                            <label class="label label-inverse-success">{{ config("date.days.$day") }}</label>
                                        @endforeach
                                    </span>
                                </div>
                            </td>
                            <td>
                                <div>
                                    <span class="label-blur">Từ</span>
                                    <span>
                                        {{ $workSchedule->allow_from }}
                                    </span>
                                </div>
                                <div class="mt-2">
                                    <span class="label-blur">Đến</span>
                                    <span>
                                        {{ $workSchedule->allow_to }}
                                    </span>
                                </div>
                            </td>
                            {{-- <td>
                                <div class="dropdown">
                                    <button class="btn btn-sm btn-show-more" type="button" id="dropdownMenuButton" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" title="Xem thêm">
                                        <i class="ti-more-alt"></i>
                                    </button>
                                    <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                        <a class="dropdown-item" href="">Xem chi tiết</a>
                                        <a class="dropdown-item" href="">Chỉnh sửa lịch làm việc</a>
                                        <a class="dropdown-item" href="">Xóa lịch làm việc</a>
                                    </div>
                                </div>
                            </td> --}}
                        </tr>
                    @endforeach
                </tbody>
            </table>
            <div style="float: right;">
                {{ $workSchedules['employeeData']->appends(request()->query())->links() }}
            </div>
        </div>
    </div>
</div>