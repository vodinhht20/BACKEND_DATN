<?php

namespace App\Http\Controllers;

use App\Service\TimesheetService;
use App\Models\Employee;
use App\Models\Timekeep;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TimesheetController extends Controller
{
    public function __construct(private TimesheetService $timesheetService, private TimekeepRepository $timekeepRepo)
    {
        //
    }
    public function timesheet(Request $request)
    {
        $rootTimekeeps = Timekeep::with(['timekeepdetail' => function ($q) {
            $q->select('timekeep_id', 'checkin_at');

        },
        'employee'
        ])->get();



        $worktime = null;
        
        $newTimekeeps = collect();
        foreach ($rootTimekeeps as $timekeep) {
            $checkin = $timekeep->timekeepdetail->first();
            $checkout = $timekeep->timekeepdetail->last();
            if ($checkin) {

                $checkinCarbon = Carbon::parse($checkin->checkin_at);
                $checkoutCarbon = Carbon::parse($checkout->checkin_at);

                $checkinFormat = $checkinCarbon->format('H:i');
                $checkoutFormat =$checkoutCarbon->format('H:i');

                $checkoutFormat = $checkoutFormat == $checkinFormat ? null : $checkoutFormat;
                $worktime = $this->timesheetService->getDifferentHours($checkinCarbon,$checkoutCarbon);
            }
           
            $newTimekeeps[]=([
                'id' => $timekeep->id,
                'employee' => $timekeep->employee,
                'date' => $timekeep->date,
                'checkin' => $checkinFormat,
                'checkout' => $checkoutFormat,
                'worktime' => $worktime
                
            ]);
    

        
        }
        
        // dd($newTimekeeps);

        // $timeSheets = $this->timekeepRepo->dataCheckinByDay("2022-06-13", 1);
        $inpMonth = $request->input('month', Carbon::now()->format("Y-m"));
        $monthYear = Carbon::createFromFormat("Y-m", $inpMonth);
        $formatDates = $this->timesheetService->getDayByMonth($monthYear);
        $currentMonth = Carbon::now()->format('Y-m');
      
        $employ = Employee::with('timekeep')
        ->OrderBy('id', 'asc')
        ->paginate(5);
        
        return view('admin.timesheet.index',compact('currentMonth', "formatDates", "inpMonth","employ","newTimekeeps"));

        
    }
    


}
