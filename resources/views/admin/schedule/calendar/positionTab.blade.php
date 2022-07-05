<form action="" class="form-filter">
    <div class="row align-items-end">
        <div class="col-md-3">
            <label for="">Tên lịch làm việc:</label>
            <input type="text" name="position_calender_name" placeholder="Nhập từ khóa..." value="{{ request()->get('position_calender_name') }}" class="form-control filter-data">
        </div>
        <div class="col-md-3">
            <label for="">Tên vị trí:</label>
            <input type="text" name="position_name" placeholder="Nhập từ khóa..." value="{{ request()->get('position_name') }}" class="form-control filter-data">
        </div>
        <div class="col-md-3">
            <label for="">Tên ca làm:</label>
            <input type="text" name="position_shift_name" placeholder="Nhập từ khóa..." value="{{ request()->get('position_shift_name') }}" class="form-control filter-data">
        </div>
        <div class="col-md-3">
            <label for="">Thời gian hiệu lực:</label>
            <date-picker lang="vn" range v-model="position_interval_day" value-type="YYYY-MM-DD" format="DD-MM-YYYY" placeholder="Lựa chọn khoảng thời gian"></date-picker>
            <input type="hidden" name="position_interval_day" :value="position_interval_day">
        </div>
        <input type="hidden" :value="current_tab" name="current_tab">
        <div class="col-md-12 mt-3">
            <a href="{{ route('schedule-calender-index') }}?current_tab=position_tab" class="btn btn-inverse btn-sm waves-effect waves-light" style="float: right;">Tất cả</a>
            <button class="btn btn-primary btn-sm waves-effect waves-light mr-2" style="float: right;">Tìm kiếm</button>
        </div>
    </div>
</form>
<div class="mt-5 mb-2 row">
    <div class="col-4">Có <b>{{ $workSchedules['positionData']->total() }}</b> lịch làm việc trong danh sách</div>
</div>
<div class="">
    <div class="table-border-style">
        <div class="table-responsive scrollbar-custom">
            <table class="table align-middle-td">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Tên lịch làm việc</th>
                        <th>Vị trí</th>
                        <th>Ca làm việc trong lịch</th>
                        <th>Thời gian trễ</th>
                        <th>Công thiếu</th>
                        <th>Thời gian hiệu lực</th>
                        {{-- <th>Thao tác</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($workSchedules['positionData'] as $workSchedule)
                        <tr>
                            <td>#{{ $workSchedule->id }}</td>
                            <td>{{ $workSchedule->name }}</td>
                            <td>{{ $workSchedule->position ? $workSchedule->position->name : "N/A" }}</td>
                            <td>
                                <div class="ml-3 mt-2">Số công: <label class="badge badge-success" style="font-weight: 500;">{{ $workSchedule->actual_workday }} công</label></div>
                                <div class="content-line mt-2">
                                    <i class="ti-timer"></i>
                                    <span class="label label-inverse-primary ml-2">{{ \Carbon\Carbon::createFromFormat('H:i:s', $workSchedule->work_from_at)->format('H:i')  }} - {{ \Carbon\Carbon::createFromFormat('H:i:s', $workSchedule->work_to_at)->format('H:i') }}</span>
                                </div>
                                <div class="content-line mt-2">
                                    <i class="ti-calendar"></i>
                                    <span class="ml-2">
                                        @foreach ($workSchedule->days as $day)
                                            <label class="label label-inverse-success">{{ config("date.days.$day") }}</label>
                                        @endforeach
                                    </span>
                                </div>
                            </td>
                            <td>
                                @if ($workSchedule->checkin_late)
                                    <p>Checkin trễ: <label for="" class="badge badge-info ml-3" style="font-weight: 500;">{{ $workSchedule->checkin_late }} Phút</label></p>
                                @endif

                                @if ($workSchedule->checkout_late)
                                    <p>Checkout sớm: <label for="" class="badge badge-info" style="font-weight: 500;">{{ $workSchedule->checkout_late }} Phút</label></p>
                                @endif

                                @if (!($workSchedule->checkin_late || $workSchedule->checkout_late))
                                    <p>Không thiết lập</p>
                                @endif
                            </td>
                            <td>
                                @if ($workSchedule->late_hour)
                                    <p>Điều kiện: TG > <label for="" class="badge badge-primary" style="font-weight: 500;">{{ $workSchedule->late_hour }} giờ</label></p>
                                    <p>Số công: <label class="badge badge-success ml-2" style="font-weight: 500;">{{ $workSchedule->virtual_workday }} công</label></p>
                                @else
                                    <p>Không thiết lập</p>
                                @endif
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
                    @if (count($workSchedules['positionData']) == 0)
                        <tr>
                            <td colspan="7" class="box_data_empty">
                                <img src="{{asset('frontend')}}/image/empty_data.png" alt="">
                            </td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>
        <div style="float: right;">
            {{ $workSchedules['positionData']->appends(request()->query())->links() }}
        </div>
    </div>
</div>