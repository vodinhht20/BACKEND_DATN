<?php

namespace App\Http\Controllers;

use App\Service\TimesheetService;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Timekeep;
use App\Repositories\DepartmentRepository;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;

class TimesheetController extends Controller
{
    public function __construct(
        private TimesheetService $timesheetService,
        private TimekeepRepository $timekeepRepo,
        private DepartmentRepository $departmentRepo
    )
    {
        //
    }

    public function timesheet(Request $request)
    {
        $requestDepartments = explode(",", $request->departments);
        $departmentIds = [];
        $positionIds = [];
        $requestDepartments = array_filter($requestDepartments, function($e) {
            return (($e != "") || ($e != null));
        });
        foreach ($requestDepartments as $departmentId) {
            if (strpos($departmentId, "position_") === false) {
                $departmentIds[] = $departmentId;
            } else {
                $positionIds[] = trim($departmentId, "position_");
            }
        }

        $positionIdsByDepartments = Position::whereIn('department_id', $departmentIds)->pluck('id')->toArray();
        $positionIds = array_merge($positionIdsByDepartments, $positionIds);
        $inpMonth = $request->input('month', Carbon::now()->format("Y-m"));
        $monthYear = Carbon::createFromFormat("Y-m", $inpMonth);

        $options = [
            'with' => ['timekeepdetail' => function ($q) {
                    $q->select('timekeep_id', 'checkin_at');
                },
                'employee'],
            'date_from' => $monthYear->copy()->startOfMonth(),
            'date_to' => $monthYear->copy()->endOfMonth(),
            'keywords' => $request->keywords,
            'position_ids' => $positionIds
        ];
        $rootTimekeeps = $this->timekeepRepo->query($options)->get();

        $timesheetFormats = [];
        foreach ($rootTimekeeps as $timekeep) {
            $worktime = null;
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
            $formatDate = Carbon::createFromFormat("Y-m-d", $timekeep->date)->format('d-m');
            $timesheetFormats[$timekeep->employee_id]["employee"] = $timekeep->employee;
            $timesheetFormats[$timekeep->employee_id]["timesheet"][$formatDate] = [
                'id' => $timekeep->id,
                'checkin' => $checkinFormat,
                'checkout' => $checkoutFormat,
                'worktime' => $worktime
            ];
        }
        $departments = $this->departmentRepo->formatVueSelect();
        $timesheetFormats = $this->paginate($timesheetFormats, 4)->withPath("/timesheet");
        $formatDates = $this->timesheetService->getDayByMonth($monthYear);

        return view('admin.timesheet.index',compact("formatDates", "inpMonth", "timesheetFormats", "departments", "requestDepartments"));
    }

    private function paginate($items, $perPage = 5, $page = null, $options = [])
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


}
