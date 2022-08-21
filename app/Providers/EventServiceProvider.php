<?php

namespace App\Providers;

use App\Events\HandleCheckIn;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\UserRegisted;
use App\Listeners\PushDataRakingRealtime;
use App\Listeners\PushNotificaion;
use App\Listeners\SendEmailVerifyToken;
use App\Listeners\WirteTimekeepLog;
use App\Events\HandleCreateRequest;
use App\Listeners\CheckHackCheckin;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        UserRegisted::class => [
            SendEmailVerifyToken::class
        ],

        HandleCheckIn::class => [
            WirteTimekeepLog::class,
            PushDataRakingRealtime::class,
            CheckHackCheckin::class
        ],

        HandleCreateRequest::class => [
            PushNotificaion::class,
        ]
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     *
     * @return bool
     */
    public function shouldDiscoverEvents()
    {
        return false;
    }
}
