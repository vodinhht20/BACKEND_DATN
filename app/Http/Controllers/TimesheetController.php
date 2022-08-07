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
use App\Imports\TimekeepImport;
use App\Repositories\EmployeeRepository;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;

class TimesheetController extends Controller
{
    public function __construct(
        private TimesheetService $timesheetService,
        private TimekeepRepository $timekeepRepo,
        private DepartmentRepository $departmentRepo,
        private PositionRepository $positionRepo,
        private EmployeeRepository $employeeRepo
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
        foreach ($requestDepartments as $requestKey) {
            $regex = "/^position_+[0-9]*$/"; // định dạng phù hơp:  position_12
            if (preg_match($regex, $requestKey)) {
                $positionIds[] = trim($requestKey, "position_");
            } else {
                $departmentIds[] = $requestKey;
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
        if ($request->departments && count($positionIds) == 0) {
            $options['position_ids'] = array(-9999);
        }
        $take = 10;
        $timekeeps = $this->timekeepRepo->query($options)->get();
        $timesheetFormats = $this->timekeepRepo->timesheetFormats($timekeeps);
        $departments = $this->departmentRepo->formatVueSelect();
        $timesheetFormats = $this->paginate($timesheetFormats, $take)->withPath("timesheet");
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
        foreach ($requestDepartments as $requestKey) {
            $regex = "/^position_+[0-9]*$/"; // định dạng phù hơp:  position_12
            if (preg_match($regex, $requestKey)) {
                $positionIds[] = trim($requestKey, "position_");
            } else {
                $departmentIds[] = $requestKey;
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

    public function importView(Request $request){
        return view('admin.timesheet.index');
    }

    public function importExcel(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'file' => 'required|mimes:xlsx|max:10000',
        ], [
            'date.required' => 'Vui lòng lựa chọn ngày',
            'file.required' => 'Vui lòng chọn file',
            'file.mimes' => 'Định dạng file không hợp lệ',
            'file.max' => 'Dung lượng file không quá 10MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 442);
        }
        $import = new TimekeepImport();
        Excel::import($import, $request->file('file'));
        $dataImports = $import->dataImport;
        $dataValidate = $import->validateFile;
        if ($dataValidate) {
            return response()->json([
                'status' => 'failed',
                'messages' => $dataValidate
            ], 442);
        }
        $employeeCodes = Arr::pluck($dataImports, 'ma_nhan_vien');
        $date = Carbon::createFromFormat("Y-m", $request->date);
        try {
            $options = [
                "date_from" => $date->copy()->startOfMonth()->format("Y-m-d"),
                "date_to" => $date->copy()->endOfMonth()->format("Y-m-d"),
            ];
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 'failed',
                'messages' => "Định dạng ngày tháng không hợp lệ"
            ], 442);
        }

        // Start import data
        $timekeeps = $this->timekeepRepo->getByEmployeeCode($employeeCodes, $options);
        $employees = $this->employeeRepo->query(["employee_codes" => $employeeCodes])
            ->select("id", "employee_code")
            ->get()->keyBy("employee_code");
        $regex = "/^ngay_+[0-9]*$/"; // định dạng phù hơp:  ngay_12052022
        $totalRecord = count($dataImports);
        $recordFailed = [];
        $recordSusscess = [];
        $recordNotExist = [];
        foreach ($dataImports as $data) {
            if (isset($employees[$data['ma_nhan_vien']])) {
                DB::beginTransaction();
                try {
                    foreach ($data as $key => $item) {
                        if (preg_match($regex, $key)) {
                            $formatDate =  ltrim($key, "ngay_");
                            $dateFormat = Carbon::createFromFormat("dmY", $formatDate)->format("Y-m-d");
                            $timekeep = $timekeeps->where("employee.employee_code", $data['ma_nhan_vien'])
                                ->where("date", $dateFormat)
                                ->first();
                            if (!($item > 0)) {
                                $recordSusscess[$data['ma_nhan_vien']] = $data['ma_nhan_vien'];
                                continue;
                            }
                            if ($timekeep) {
                                // Nếu dữ liệu nó update lớn hơn dữ liệu hiện tại thì update
                                if ($item > $timekeep->worktime ) {
                                    Log::info($timekeep->worktime . " -> " . $item);
                                    $timekeep->worktime = $item;
                                    $timekeep->type = config("timekeep.type.import");
                                    Log::info($timekeep->save());
                                }
                                $recordSusscess[$data['ma_nhan_vien']] = $data['ma_nhan_vien'];
                            } else {
                                $newTimeSheet = new Timekeep();
                                $newTimeSheet->worktime = $item;
                                $newTimeSheet->date = $dateFormat;
                                $newTimeSheet->employee_id = $employees[$data['ma_nhan_vien']]->id;
                                $newTimeSheet->type = config("timekeep.type.import");
                                $newTimeSheet->save();
                                $recordSusscess[$data['ma_nhan_vien']] = $data['ma_nhan_vien'];
                            }
                        }
                    }
                    DB::commit();
                } catch (\Exception $e) {
                    DB::rollBack();
                    $recordFailed[] = $data['ma_nhan_vien'];
                    $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
                    Log::error($message);
                }
            } else {
                $recordNotExist[$data['ma_nhan_vien']] = $data['ma_nhan_vien'];
            }
        }

        return response()->json([
            "status" => "success",
            "total_record" => $totalRecord,
            "record_failed" => array_values($recordFailed),
            "record_susscess" => array_values($recordSusscess),
            "record_not_exist" => array_values($recordNotExist),
        ]);
    }

    public function previewImport(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'file' => 'required|mimes:xlsx|max:10000',
        ], [
            'date.required' => 'Vui lòng lựa chọn ngày',
            'file.required' => 'Vui lòng chọn file',
            'file.mimes' => 'Định dạng file không hợp lệ',
            'file.max' => 'Dung lượng file không quá 10MB',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error_code' => 'validate_failed',
                'messages' => array($validator->messages()->first())
            ], 442);
        }
        $import = new TimekeepImport();
        Excel::import($import, $request->file('file'));
        $dataImports = $import->dataImport;
        $dataValidate = $import->validateFile;
        if ($dataValidate) {
            return response()->json([
                'status' => 'failed',
                'messages' => $dataValidate
            ], 442);
        }
        $employeeCodes = Arr::pluck($dataImports, 'ma_nhan_vien');
        $date = Carbon::createFromFormat("Y-m", $request->date);
        try {
            $options = [
                "date_from" => $date->copy()->startOfMonth()->format("Y-m-d"),
                "date_to" => $date->copy()->endOfMonth()->format("Y-m-d"),
            ];
        } catch (\Exception $ex) {
            return response()->json([
                'status' => 'failed',
                'messages' => "Định dạng ngày tháng không hợp lệ"
            ], 442);
        }

        // Start import data
        $timekeeps = $this->timekeepRepo->getByEmployeeCode($employeeCodes, $options);
        $employees = $this->employeeRepo->query(["employee_codes" => $employeeCodes])
            ->select("id", "employee_code")
            ->get()->keyBy("employee_code");
        $regex = "/^ngay_+[0-9]*$/"; // định dạng phù hơp:  ngay_12052022
        $dataFomart = [];
        $recordNotExist = [];
        foreach ($dataImports as $data) {
            if (isset($employees[$data['ma_nhan_vien']])) {
                try {
                    foreach ($data as $key => $item) {
                        if (preg_match($regex, $key)) {
                            $formatDate =  ltrim($key, "ngay_");
                            $dateFormat = Carbon::createFromFormat("dmY", $formatDate);
                            $timekeep = $timekeeps->where("employee.employee_code", $data['ma_nhan_vien'])
                                ->where("date", $dateFormat->format("Y-m-d"))
                                ->first();
                            if ($timekeep) {
                                $dataFomart[$data['ma_nhan_vien']][$dateFormat->format("d-m-Y")] = [
                                    "root" => $timekeep->worktime,
                                    "new" => $item
                                ];
                            } else {
                                $dataFomart[$data['ma_nhan_vien']][$dateFormat->format("d-m-Y")] = [
                                    "root" => 0,
                                    "new" => $item
                                ];
                            }
                        }
                    }
                } catch (\Exception $e) {
                    $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
                    Log::error($message);
                    return response()->json([
                        "status" => "failed",
                        "message" => "Không thể đọc được file vào lúc này"
                    ]);
                }
            } else {
                $recordNotExist[] = $data['ma_nhan_vien'];
            }
        }

        return response()->json([
            "status" => "success",
            "data" => $dataFomart,
            "recordNotExist" => $recordNotExist,
        ]);
    }

}
