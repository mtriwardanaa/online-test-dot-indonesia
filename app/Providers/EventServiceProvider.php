<?php

namespace App\Providers;

use App\Events\CityFetched;
use App\Events\ProvinceFetched;
use App\Listeners\ProcessInsertCity;
use App\Listeners\ProcessInsertProvince;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event to listener mappings for the application.
     *
     * @var array<class-string, array<int, class-string>>
     */
    protected $listen = [
        Registered::class      => [
            SendEmailVerificationNotification::class,
        ],
        ProvinceFetched::class => [
            ProcessInsertProvince::class,
        ],
        CityFetched::class     => [
            ProcessInsertCity::class,
        ],
    ];

    /**
     * Register any events for your application.
     */
    public function boot(): void
    {
        //
    }

    /**
     * Determine if events and listeners should be automatically discovered.
     */
    public function shouldDiscoverEvents(): bool
    {
        return false;
    }
}
