<?php

namespace App\Exports;

use App\Models\Timekeep;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithStrictNullComparison;

class TimekeepExport implements FromView,ShouldAutoSize,WithStrictNullComparison
{
    use Exportable;
    public function __construct($timesheetFormats, $formatDates)
    {

        $this->timesheetFormats = $timesheetFormats;
        $this->formatDates = $formatDates;
    }
    public function view(): View
    {
        return view('admin.timesheet.exporttimesheet',[
            'timesheetFormats'=>$this->timesheetFormats,
            'formatDates'=>$this->formatDates
        ]);
    }

}
