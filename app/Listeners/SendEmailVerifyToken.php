<?php

namespace App\Listeners;

use App\Events\UserRegisted;
use App\Mail\TokenVerifyEmail;
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
    public function __construct(UserRepositoryInterface $userRepo)
    {
        $this->userRepo = $userRepo;
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
                'id' => $event->user->id,
                'email_confirm_token' => $token,
            ];
            $this->userRepo->updateTokenVerifyEmail($option);
            $mailable = new TokenVerifyEmail($token,$event->user->id);
            Mail::to($event->user->email)->send($mailable);
        } catch (Exception $e) {
            Log::error("Không thể gửi mail \ Error message" . $e->getMessage() . '\'' . ' in ' . $e->getFile() . ' line ' . $e->getLine());
        }
    }
}
