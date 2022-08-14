<?php

namespace App\Console\Commands;

use App\Models\Employee;
use App\Models\Timekeep;
use App\Models\TimekeepDetail;
use App\Models\TimekeepLog;
use App\Repositories\TimekeepDetailRepository;
use App\Repositories\TimekeepLogRepository;
use App\Repositories\TimekeepRepository;
use Carbon\Carbon;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class InitDataTimesheet extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'data-fake:timesheet';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command fake data timesheet';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $date = $this->ask('Vui lòng nhập tháng năm (m-Y) cần fake data: ');
        try {
            $date = Carbon::createFromFormat("m-Y", $date);
        } catch (\Exception $ex) {
            return $this->error("Vui lòng nhập đúng định dạng tháng năm !");
        }
        if (2021 >= $date->format("Y")) {
            return $this->error("Số năm quá cũ, vui lòng nhập số năm > 2021");
        }
        if (Carbon::now()->format("Y-m") < $date->format("Y-m")) {
            return $this->error("Bạn chỉ có thể Fake data cho tháng này trong tương lại ^-^ !");
        }

        $timekeepRepo = app(TimekeepRepository::class);
        $timekeepDetailRepo = app(TimekeepDetailRepository::class);
        $timekeepDetailLogRepo = app(TimekeepLogRepository::class);
        $currentDate = Carbon::now()->format("Y-m-d");
        $employees = Employee::get();
        $totalDay = $date->daysInMonth;
        DB::beginTransaction();
        try {
            $this->info("-.-.-.-.-.-.-.-. Clear Data Exist -.-.-.-.-.-.-.-.");
            $timesheetOlds = Timekeep::where('date', ">=", $date->copy()->startOfMonth()->format("Y-m-d"))
                ->where('date', "<=", $date->copy()->endOfMonth()->format("Y-m-d"));
            $timesheetIds = $timesheetOlds->pluck('id');

            TimekeepDetail::whereIn("timekeep_id", $timesheetIds)->forceDelete();
            TimekeepLog::whereIn("timekeep_id", $timesheetIds)->forceDelete();
            $timesheetOlds->forceDelete();

            $this->info("-.-.-.-.-.-.-.-. Start Init Data -.-.-.-.-.-.-.-.");
            foreach ($employees as $employee) {
                $this->info("-.-.-.-.-.-.-.-. Đang Init dữ liệu cho Employee ID #$employee->id -.-.-.-.-.-.-.-.");
                for ($i = 1; $i <= $totalDay; $i++) {
                    $newDate = Carbon::parse($date->format("Y-m-$i"));
                    $newDateFormat = $newDate->format("Y-m-d");
                    if ($newDateFormat > $currentDate) {
                        break;
                    }
                    if (in_array($newDate->isoFormat("d"), [0, 6])) {
                        continue;
                    }
                    $this->info("------ Date [$newDateFormat] -------");
                    $arrayRandMinute = [0, 0, 0, 0, 0, 0, 0, 5, 11, 0, 0, 0, 0];
                    $minuteLate = $arrayRandMinute[array_rand($arrayRandMinute)];
                    $minuteEarly = $arrayRandMinute[array_rand($arrayRandMinute)];
                    $timekeepOptions = [
                        "date" => $newDateFormat,
                        "employee_id" => $employee->id,
                        "type" => config('timekeep.type.checkin'),
                        "worktime" => 1,
                        "minute_late" => $minuteLate,
                        "minute_early" => $minuteEarly,
                        "overtime_hour" => rand(0,5)
                    ];
                    $newTimekeep = $timekeepRepo->create($timekeepOptions);

                    $timekeepDetailOptions = [
                        "timekeep_id" => $newTimekeep->id,
                        "checkin_at" => $date->format("Y-m-$i 08:00:00"),
                        "ip" => "113.185.46.228",
                        "latitude" => "21.0277644",
                        "longitude" => "105.8341598",
                        "source" => "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/104.0.0.0 Safari/537.36"
                    ];
                    $timekeepDetailRepo->create($timekeepDetailOptions);
                    $timekeepDetailLogRepo->create([...$timekeepDetailOptions, "status" => config("timekeep.status.success")]);
                    $timekeepDetailRepo->create([...$timekeepDetailOptions, "checkin_at" => $date->format("Y-m-$i 18:00:00")]);
                    $timekeepDetailLogRepo->create([...$timekeepDetailOptions, "checkin_at" => $date->format("Y-m-$i 18:00:00"), "status" => config("timekeep.status.success")]);
                }
            }
            DB::commit();
            return $this->info("---> Đã hoàn thành Init Data (^-^) <----");
        } catch (\Exception $e) {
            DB::rollBack();
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            return $this->error("Đã có lỗi xảy ra ...!");
        }
    }
}
