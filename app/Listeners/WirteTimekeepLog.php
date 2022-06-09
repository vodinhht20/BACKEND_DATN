<?php

namespace App\Listeners;

use App\Events\HandleCheckIn;
use App\Repositories\TimekeepLogRepository;
use App\Repositories\TimekeepRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\DB;

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
            $timekeep = $this->timekeepRepo->getTimekeepByDate($timekeepOption['date']);
            if (!$timekeep) {
                $timekeep = $this->timekeepRepo->create($timekeepOption);
            }
            $timekeepOption['timekeep_id'] = $timekeep->id;
            $this->timekeepLogRepo->create($timekeepOption);
        } catch (\Exception $ex) {
            \Log::error($ex->getMessage());
        }
    }
}
