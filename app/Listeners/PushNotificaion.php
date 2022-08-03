<?php

namespace App\Listeners;

use App\Repositories\EmployeeRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Notification;

class PushNotificaion implements ShouldQueue
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
        $notificationData = $event->notifications;

        $link = '';
        if ($notificationData['link'] && trim($notificationData['link']) != '') {
            if ($notificationData['domain'] == config('notification.domain.BE')) {
                $link = env('DOMAIN_BACKEND') . "/admin/ " . $notificationData['link'];
            } else if ($notificationData['domain'] == config('notification.domain.FE')) {
                $link = env('DOMAIN_FRONTEND') . $notificationData['link'];
            }
        }
        $options = [...$options, 'link' => $link];

        $employees = $this->employeeRepo->query(["ids" => $notificationData->employee_ids]);


        foreach ($employees as $employee) {
            Notification::send(null, new \App\Notifications\SendPushNotification("notifycation", $dataNoti, $fcmTokens));
        }
    }
}
