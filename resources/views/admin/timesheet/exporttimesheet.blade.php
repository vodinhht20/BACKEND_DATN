<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <H2>Bảng công nhân viên</H2>
<table class="table table-hover">
    <thead>
</head>
<body>
    <table class="table table-hover">
        <tr>
            <th>Mã nhân viên</th>
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
        @foreach ($timesheetFormats as $timesheet)
        <tr>
            <td>{{ $timesheet['employee']->fullname }}</td>
            <td>{{ $timesheet['employee']->employee_code }}</td>
                @foreach ($formatDates as $date => $dateName)
                    @if (isset($timesheet['timesheet'][$date]))
                        <td class="tabletimekeeps">
                            <div class="flex-col">
                                <span>{{ $timesheet['timesheet'][$date]['worktime'] ?: 0.0 }}</span>
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
</body>
</html>
    </table>

</body>
</html>
