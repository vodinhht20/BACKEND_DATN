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
            'employee_id' => $row['employee_id'],
            'date'=>$row['date'],
            'type'=>$row['type'],
            'worktime' => $row['worktime'],
            'minute_late' => $row['minute_late'],
            'minute_early' => $row['minute_early'],
            'overtime_hour' => $row['overtime_hour'],

        ]);
    }
}
