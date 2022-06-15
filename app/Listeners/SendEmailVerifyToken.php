<?php

namespace App\Listeners;

use App\Events\UserRegisted;
use App\Mail\TokenVerifyEmail;
use App\Repositories\EmployeeRepository;
use App\Repositories\UserRepositoryInterface;
use Exception;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Carbon\Carbon;
class SendEmailVerifyToken implements ShouldQueue
{
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
     * @param  \App\Events\UserRegisted  $event
     * @return void
     */
    public function handle(UserRegisted $event)
    {
        try {
            $token = hash('sha256', Str::random(60));
            $option = [
                'id' => $event->employee->id,
                'email_confirm_token' => $token,
            ];
            $this->employeeRepo->updateTokenVerifyEmail($option);
            $mailable = new TokenVerifyEmail($token,$event->employee->id);
            Mail::to($event->employee->email)->send($mailable);
        } catch (Exception $e) {
            Log::error("Không thể gửi mail \ Error message" . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine());
        }
    }
}
