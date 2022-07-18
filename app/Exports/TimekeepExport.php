<?php

namespace App\Exports;

use App\Models\Timekeep;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class TimekeepExport implements FromCollection,WithHeadings
{
    public function headings():array{
        return [
            'date',
            'Id',
            'employ_id',
            'worktime',
            'minute_late',
            'minute_early',
            'overtime_hour'

        ];
    }
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {
        // return Timekeep::all();
        return collect(Timekeep::getTimekeep());
    }
}
