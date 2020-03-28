<?php

namespace App\Http\Controllers;

use App\Events\ProductPurchased;
use Illuminate\Http\Request;
use App\Notifications\PaymentReceived;
use Illuminate\Support\Facades\Notification;

class PaymentsController extends Controller
{
    public function create()
    {
        return view('payments.create');
    }

    /**
     * Para crear la notificacion ejecutamos:
     *
     *  php artisan make:notification PaymentReceived
     */
    public function store()
    {
        request()->user()->notify(new PaymentReceived(900));

        /*
         * Teniendo una variable con el usuario
         * $user->notify(new PaymentReceived());
         *
         * Mediante Facade
         * Notification::send(request()->user(), new PaymentReceived());
         */

        // Ejecutar evento, las dos formas son válidas
        ProductPurchased::dispatch('toy');
        // event(new ProductPurchased('toy'));
    }
}
