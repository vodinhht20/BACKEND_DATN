<?php

namespace App\Listeners;

use App\Events\HandleCheckIn;
use App\Libs\FirebasePushDataReatime;
use App\Models\Noti;
use App\Notifications\SendPushNotification;
use App\Repositories\EmployeeRepository;
use App\Repositories\TimekeepRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Kutia\Larafirebase\Facades\Larafirebase;

class PushDataRakingRealtime
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private EmployeeRepository $employeeRepo, private TimekeepRepository $timekeepRepo)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(HandleCheckIn $event)
    {
        $timekeepOption = $event->timekeep;
        if ($timekeepOption['status'] == config('timekeep.status.success')) {
            try {
                $employees = $this->employeeRepo->getEmployeeOfBranch($timekeepOption['employee_id']);
                $fcmTokens = $employees->whereNotNull('fcm_token')->pluck('fcm_token')->unique()->toArray();
                $date = $timekeepOption['date'];
                $rakingData = $this->timekeepRepo->TimekeepRankingByEmployeeId($timekeepOption['employee_id'], $date);
                $data = json_encode(["data" => $rakingData]);
                Notification::send(null, new \App\Notifications\SendPushNotification("timekeep_ranking", $data, $fcmTokens));
            } catch (\Exception $e) {
                $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
                Log::error($message);
                Noti::telegramLog('Event Checkin Log', $message);
            }
        }
    }
}
