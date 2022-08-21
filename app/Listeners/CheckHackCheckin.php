<?php

namespace App\Listeners;

use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
class CheckHackCheckin
{
    use InteractsWithQueue;
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct(private EmployeeRepository $employeeRepo)
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        $timekeepOption = $event->timekeep;
        if ($timekeepOption['status'] == config('timekeep.status.success')) {
            $employee = $this->employeeRepo->find($timekeepOption['employee_id']);
            if ($employee) {
                $plainText = $timekeepOption['device_id'] . $timekeepOption['date'] . $timekeepOption['ip'];
                $hashKey = md5($plainText);
                $employee->hash_last_checkin = $hashKey;
                $employee->save();

                $hashKeyExist = $this->employeeRepo
                    ->query(['branch_id', $employee->branch_id, 'not_in_id' => array($employee->id)])
                    ->where("hash_last_checkin", $hashKey)
                    ->first();
                if ($hashKeyExist) {
                    Noti::warringCheckin($employee, $timekeepOption['ip']);
                }
            }
        }
    }
}
