<?php

namespace App\Listeners;

use App\Models\Noti;
use App\Repositories\EmployeeRepository;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
class PushNotificaion
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
        try {
            $notificationData = $event->notifications;
            $link = '';
            if ($notificationData['link'] && trim($notificationData['link']) != '') {
                if ($notificationData['request_domain'] == config('notification.domain.BE')) {
                    $link = env('DOMAIN_BACKEND') . "/adm" . "in/" . $notificationData['link'];
                } else if ($notificationData['request_domain'] == config('notification.domain.FE')) {
                    $link = $notificationData['link'];
                }
            }
            $notificationData = [...$notificationData, 'link' => $link, 'created_at' => '1 giây trước', 'id' => "new"];
            $fcmTokens = $this->employeeRepo->query(["ids" => $notificationData['employee_ids']])->pluck('fcm_token')->toArray();
            Notification::send(null, new \App\Notifications\SendPushNotification("noti_create_request", json_encode(["data" => $notificationData]), $fcmTokens));
        } catch (\Exception $e) {
            $message = '[' . date('Y-m-d H:i:s') . '] Error message \'' . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine();
            Log::error($message);
            Noti::telegramLog('Push Notification Failed', $message);
        }
    }
}
