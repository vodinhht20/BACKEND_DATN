<?php
namespace App\Service;

use App\Libs\Slack;
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

    /**
    * @param Carbon|null $firstTime
    * @param Carbon|null $lastTime
    * @return float
    */
    public function getDifferentHours(Carbon $firstTime = null, Carbon $lastTime = null): float
    {
        $differentHours = 0;
        try {
            if (!$firstTime) {
                return $differentHours;
            }
            if ($lastTime) {
                $differentHours = round($firstTime->floatDiffInHours($lastTime), 1);
            }
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            Slack::error($message);
        }
        return $differentHours;
    }
}