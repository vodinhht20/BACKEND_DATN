<?php

namespace App\Imports;

use App\Models\Timekeep;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TimekeepImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Timekeep([
            'employee_id' => $row[0],
            'date'=>$row[1],
            'type'=>$row[2],
            'worktime' => $row[3],
            'minute_late' => $row[4],
            'minute_early' => $row[5],
            'overtime_hour' => $row[6],

        ]);
    }
}
