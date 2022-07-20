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
    public function __construct($timesheetFormats,$departments,$formatDates)
    {
    
        $this->timesheetFormats = $timesheetFormats;
        $this->departments = $departments;
        $this->formatDates = $formatDates;
    }
    public function view(): View
    {
        return view('admin.timesheet.exporttimesheet',[
            'timesheetFormats'=>$this->timesheetFormats,
            'departments'=>$this->departments,
            'formatDates'=>$this->formatDates
        ]);
    }
    
}
