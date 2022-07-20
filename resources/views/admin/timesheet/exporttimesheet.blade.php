@section('style-page')
    <link rel="stylesheet" href="{{asset('frontend/css/datepicker.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@riophae/vue-treeselect@^0.4.0/dist/vue-treeselect.min.css">
    <link rel="stylesheet" href="{{asset('frontend')}}/css/company-work.css?v1.0.2">
@endsection
<H2>Bảng công nhân viên</H2>
<table class="table table-hover">
    <thead>
        <tr>
            <th>Tên nhân viên</th>
            @foreach ($formatDates as $date => $dateName)
                <th class="tabletimekeeps">
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
            <td>{{ $timesheet['employee']->fullname }}</td>
                @foreach ($formatDates as $date => $dateName)
                    @if (isset($timesheet['timesheet'][$date]))
                        <td class="tabletimekeeps">
                            <div class="flex-col">
                                @php
                                    $timesheetByDate = $timesheet['timesheet'][$date] ?? 0.0;
                                \Log::info($timesheetByDate);
                                \Log::info($date);

                                @endphp
                                <span>{{ $timesheetByDate['worktime'] ?: 0.0 }}</span>
                            </div>
                        </td>
                    @else
                        <td class="tabletimekeeps">
                            <div>
                                <span>0.0</span>
                            </div>
                        </td>
                    @endif
                @endforeach
                <td>{{ $timesheet['sum_reality_worktime'] ?? 0 }}</td>
                <td>{{ $timesheet["sum_leave_worktime"] ?? 0 }}</td>
                <td>{{ $timesheet["sum_holiday_worktime"] ?? 0 }}</td>
                <td>{{ $timesheet['sum_no_salary_worktime'] ?? 0 }}</td>
                <td>{{ $timesheet['sum_overtime_hour_worktime']?? 0 }}</td>
                <td>{{ $timesheet['sum_worktime_hour'] ?? 0 }}</td>
                <td>{{ $timesheet['sum_minute_late_worktime'] ?? 0}}</td>
                <td>{{ $timesheet['sum_minute_early_worktime'] ?? 0}}</td>
                <td>{{ $timesheet['sum_current_worktime']?? 0 }}</td>
            </tr>
        @endforeach
    </tbody>
</table>