<?php

namespace App\Http\Controllers\Api;

use App\Events\HandleCheckIn;
use App\Http\Controllers\Controller;
use App\Libs\Slack;
use App\Models\Employee;
use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use App\Repositories\TimekeepRepository;
use App\Repositories\WorkScheduleRepository;
use App\Service\TimesheetService;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redis;
use Illuminate\Support\Facades\Validator;

class TimekeepingController extends Controller
{
    public function __construct(
        private TimekeepRepository $timekeepRepo,
        private EmployeeRepository $employeeRepo,
        private WorkScheduleRepository $workScheduleRepo,
        private TimesheetService $timesheetService
    )
    {
        //
    }

    public function checkIn(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'latitude' => 'required',
            'longitude' => 'required',
        ], [
            'latitude.required' => 'Vĩ độ không được để trống',
            'longitude.required' => 'Kinh độ không được để trống',
        ]);

        if ($validator->fails()) {
            return response()->json([
                "message" => $validator->messages()->first(),
                'error_code' => 'field_required'
            ], 404);
        }

        $currentDate = Carbon::now();
        $currentAdminId = Auth::user()->id;
        $latitude = (float)$request->latitude;
        $longitude = (float)$request->longitude;
        $options = [
            'ip' => $request->ip(),
            'latitude' => $latitude,
            'longitude' => $longitude,
            'type' => config('timekeep.type.checkin'),
            'date' => $currentDate->format('Y-m-d'),
            'employee_id' => $currentAdminId,
            'checkin_at' => $currentDate,
            'source' => $request->header('User-Agent')
        ];

        $attendanceSetting = json_decode(Redis::get('attendance_setting') ?? '[]');
        // Kiểm tra nếu yêu cầu bắt wifi công ty
        if (in_array(config('attendance_setting.options.wifi'), $attendanceSetting)) {
            $ipCompanies = $this->employeeRepo->getWifiIPByEmployeeId($currentAdminId);
            if (!in_array($request->ip(), $ipCompanies)) {
                $options['status'] = config('timekeep.status.failed');
                event(new HandleCheckIn($options));
                return response()->json([
                    'message' => 'Check in bị từ chối. IP: ' . $request->ip(),
                    'error_code' => 'checkin_access_denied'
                ]);
            }
        }

        // Kiểm tra nếu yêu cầu checkin đúng địa điểm
        if (in_array(config('attendance_setting.options.gps'), $attendanceSetting)) {
            $isLocaionInBranch = $this->timekeepRepo->isLocaionInBranch($longitude, $latitude, $currentAdminId);
            if (!$isLocaionInBranch) {
                $options['status'] = config('timekeep.status.failed');
                event(new HandleCheckIn($options));
                return response()->json([
                    'message' => 'Checkin thất bại. Bạn không thể chấm công ở địa điểm này',
                    'error_code' => 'checkin_failed'
                ]);
            }
        }

        // Lấy ra thời gian làm việc của nhân viên ngày hôm đấy
        $workScheduleForTheDay = $this->workScheduleRepo->workScheduleForTheDay($currentDate->format('Y-m-d'), $currentAdminId);
        // Thời điểm checkin hợp lệ
        $maxCheckin = Carbon::createFromFormat('H:i:s', $workScheduleForTheDay->work_from_at)
            ->addMinutes($workScheduleForTheDay->checkin_late);
        // Thời điểm checkout hợp lệ
        $minCheckout = Carbon::createFromFormat('H:i:s', $workScheduleForTheDay->work_to_at)
            ->subMinutes($workScheduleForTheDay->checkin_late);

        // Nếu nó có lịch làm việc vào ngày hôm nay thì mới được checkin
        if ($workScheduleForTheDay) {
            // Lấy ra thời điểm checkin sớm nhất của ngày hôm nay
            $firstTimekeep = $this->timekeepRepo->getFirstCheckin($currentDate->format('Y-m-d'), $currentAdminId);

            if ($firstTimekeep) {
                // Tính thời gian về sớm
                $earlyMinute = $minCheckout->diffInMinutes($currentDate);
                if ($currentDate < $minCheckout) {
                    $options['minute_early'] = $earlyMinute;
                }

               // Tính số công làm việc
                $checkinInWork = Carbon::parse($firstTimekeep->checkin_at)->format('H:i:s');
                $checkoutInWork = $currentDate->format('H:i:s');
                if ($checkinInWork < $workScheduleForTheDay->work_from_at) {
                    $checkinInWork = $workScheduleForTheDay->work_from_at;
                }

                if ($checkoutInWork > $workScheduleForTheDay->work_to_at) {
                    $checkoutInWork = $workScheduleForTheDay->work_to_at;
                }

                // Thời gian làm việc thực tế
                $checkinInWork = Carbon::createFromFormat("H:i:s", $checkinInWork);
                $checkoutInWork = Carbon::createFromFormat("H:i:s", $checkoutInWork);
                $workTime = $this->timesheetService->getDifferentHours($checkinInWork, $checkoutInWork);

                // Xảy ra 3 trường hợp khi chấm công: 1. Chấm công đúng giờ, 2. Chấm công thiếu giờ có công, 3. Chấm công thiếu giò không công
                if ($maxCheckin->format("Y-m-d H:i:s") >= $firstTimekeep->checkin_at && $minCheckout->format("Y-m-d H:i:s") <= $currentDate->format('Y-m-d H:i:s')) {
                    $options['worktime'] = $workScheduleForTheDay->actual_workday;
                } else if ($workTime >= $workScheduleForTheDay->late_hour) {
                    $options['worktime'] = $workScheduleForTheDay->virtual_workday;
                } else {
                    $options['worktime'] = 0;
                }
            } else {
                // Tính thời gian đi muộn
                $lateMinute = $currentDate->diffInMinutes($maxCheckin);
                if ($maxCheckin > $currentDate) {
                    $options['minute_late'] = $lateMinute;
                }
            }
        } else {
            $options['status'] = config('timekeep.status.failed');
            event(new HandleCheckIn($options));
            return response()->json([
                'message' => 'Bạn không thể chấm công ngoài ca làm việc',
                'error_code' => 'checkin_failed'
            ]);
        }
        DB::beginTransaction();
        try {
            $this->timekeepRepo->checkin($options);
            $dataCheckinByDay = $this->timekeepRepo->dataCheckinByDay($currentDate->format('Y-m-d'), $currentAdminId);
            $options['status'] = config('timekeep.status.success');
            event(new HandleCheckIn($options));
            DB::commit();
            return response()->json([
                'status' => 'success',
                'data' => $dataCheckinByDay
            ]);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            \Log::error($message);
            Noti::telegramLog('Checkin Client', $message);
            DB::rollBack();
            $options['status'] = config('timekeep.status.failed');
            event(new HandleCheckIn($options));
            return response()->json([
                'message' => 'Checkin thất bại. Vui lòng liên hệ bộ phận kỹ thuật để được hỗ trợ',
                'error_code' => 'checkin_failed'
            ]);
        }
    }

    public function getCurrentDataCheckin(Request $request)
    {
        $currentAdminId = Auth::user()->id;
        $currentDate = Carbon::now()->format('Y-m-d');
        $dataCheckin = $this->timekeepRepo->dataCheckinByDay($currentDate, $currentAdminId);
        return response()->json([
            'data' => $dataCheckin
        ]);
    }
}
