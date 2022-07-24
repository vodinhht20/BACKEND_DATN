<?php

namespace App\Http\Controllers;

use App\Service\TimesheetService;
use App\Models\Employee;
use App\Models\Position;
use App\Models\Timekeep;
use App\Repositories\DepartmentRepository;
use App\Repositories\PositionRepository;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Collection;
use App\Exports\TimekeepExport;
use Maatwebsite\Excel\Facades\Excel;

class TimesheetController extends Controller
{
    public function __construct(
        private TimesheetService $timesheetService,
        private TimekeepRepository $timekeepRepo,
        private DepartmentRepository $departmentRepo,
        private PositionRepository $positionRepo
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
        $positionIdsByDepartments = $this->positionRepo->query(["department_id" => $departmentIds])->pluck('id')->toArray();
        $positionIds = array_merge($positionIdsByDepartments, $positionIds);
        $inpMonth = $request->input('month', Carbon::now()->format("Y-m")) ?: Carbon::now()->format("Y-m");
        $monthYear = Carbon::createFromFormat("Y-m", $inpMonth);
        $options = [
            'with' => ['timekeepDetail' => function ($q) {
                    $q->select('timekeep_id', 'checkin_at');
                },
                'employee'],
            'date_from' => $monthYear->copy()->startOfMonth(),
            'date_to' => $monthYear->copy()->endOfMonth(),
            'keywords' => $request->keywords,
            'position_ids' => $positionIds
        ];
        $timekeeps = $this->timekeepRepo->query($options)->get();
        $timesheetFormats = $this->timekeepRepo->timesheetFormats($timekeeps);
        $departments = $this->departmentRepo->formatVueSelect();
        $timesheetFormats = $this->paginate($timesheetFormats, 20)->withPath("timesheet");
        $formatDates = $this->timesheetService->getDayByMonth($monthYear);
        return view('admin.timesheet.index',compact("formatDates", "inpMonth", "timesheetFormats", "departments", "requestDepartments"));

    }

    private function paginate($items, $perPage = 5, $page = null, $options = []): LengthAwarePaginator
    {
        $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
        $items = $items instanceof Collection ? $items : Collection::make($items);
        return new LengthAwarePaginator($items->forPage($page, $perPage), $items->count(), $perPage, $page, $options);
    }


    public function exportIntoExcel(Request $request)
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
        $positionIdsByDepartments = $this->positionRepo->query(["department_id" => $departmentIds])->pluck('id')->toArray();
        $positionIds = array_merge($positionIdsByDepartments, $positionIds);
        $inpMonth = $request->input('month', Carbon::now()->format("Y-m")) ?: Carbon::now()->format("Y-m");
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
        $timekeeps = $this->timekeepRepo->query($options)->get();
        $timesheetFormats = $this->timekeepRepo->timesheetFormats($timekeeps);
        $formatDates = $this->timesheetService->getDayByMonth($monthYear);
        $fileName = "timekeep_" . date('Y_m_d_H_i') . ".xlsx";
        return Excel::download(new TimekeepExport($timesheetFormats, $formatDates), $fileName);
    }

}
