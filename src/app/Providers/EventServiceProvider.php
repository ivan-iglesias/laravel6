<?php

namespace App\Providers;

use App\Events\ProductPurchased;
use App\Listeners\AwardAchivements;
use App\Listeners\SendShareableCoupon;
use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],
        /*
        ProductPurchased::class => [
            AwardAchivements::class,
            SendShareableCoupon::class
        ]
        */
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }

    /**
     * Para no tener que añadirlos manualmente arriba. Leera el método "handle"
     * de las clases de la carpeta "Listeners" para determinar el evento.
     */
    public function shouldDiscoverEvents()
    {
        return true;
    }
}
