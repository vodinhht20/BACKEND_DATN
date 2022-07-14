<?php

namespace App\Listeners;

use App\Events\HandleCheckIn;
use App\Models\Employee;
use App\Models\Noti;
use App\Repositories\TimekeepLogRepository;
use App\Repositories\TimekeepRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class WirteTimekeepLog
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private TimekeepLogRepository $timekeepLogRepo, private TimekeepRepository $timekeepRepo)
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
        try {
            $timekeepOption = $event->timekeep;
            $timekeep = $this->timekeepRepo->getTimekeepByDate($timekeepOption['date'], $timekeepOption['employee_id']);
            if (!$timekeep) {
                $timekeep = $this->timekeepRepo->create($timekeepOption);
            }
            $timekeepOption['timekeep_id'] = $timekeep->id;
            $this->timekeepLogRepo->create($timekeepOption);
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            Noti::telegramLog('Event Checkin Log', $message);
        }
    }
}
