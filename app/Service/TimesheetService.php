<?php
namespace App\Service;

use Carbon\Carbon;
use DateTimeZone;

class TimesheetService {
    public function getDayByMonth(Carbon $date)
    {
        $totalDayInMonth = $date->daysInMonth;
        $arrDate = [];
        for ($index = 1; $index <= $totalDayInMonth; $index++) {
            $itemDay = $index . "-" . $date->format("m-Y");
            $day = Carbon::createFromFormat("d-m-Y" ,$itemDay);
            $arrDate[$day->format("d-m")] = $day->locale('vi_VN')->dayName;
        }
        return $arrDate;
    }
}