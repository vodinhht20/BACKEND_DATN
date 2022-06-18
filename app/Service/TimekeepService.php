<?php
namespace App\Service;

use Carbon\Carbon;
use DateTimeZone;

class TimekeepService {

    /**
     * Hàm kiểm tra vị trí có thuộc bán kính location gốc hay không.
     *
     * @param float $longitudeRoot Kinh độ gốc
     * @param float $latitudeRoot Vĩ độ gốc
     * @param float $longitude Kinh độ cần kiểm tra
     * @param float $latitude Vĩ độ cần kiểm tra
     * @param integer $radius Bán kính
     * @return boolean
     */

    public function isLocationInRadius($longitudeRoot, $latitudeRoot, $longitude, $latitude, $radius = 500): bool
    {
        $rootLongi = deg2rad($longitudeRoot);
        $rootLati = deg2rad($latitudeRoot);
        $longi = deg2rad($longitude);
        $lati = deg2rad($latitude);
        $difflong = $longi - $rootLongi;
        $difflat = $lati - $rootLati;
        $radian = pow(sin($difflat / 2), 2) + cos($rootLati) * cos($lati) * pow(sin ($difflong / 2), 2);
        $distance = round(6378.8 * (2 * asin(sqrt($radian)) * 1000));
        if ($distance <= $radius) {
            return true;
        }
        return false;
    }
}