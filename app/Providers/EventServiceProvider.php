<?php

namespace App\Providers;

use Illuminate\Support\Facades\Event;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        'App\Events\DepositWasCreated' => [
            'App\Listeners\AddMoneyToBalance',
        ],
        'App\Events\CreditPaymentWasCreated' => [
            'App\Listeners\AddMoneyToBalance',
        ],
        'App\Events\PurchaseOrderWasCreated' => [
            'App\Listeners\AddMoneyToBalance',
        ],
        'App\Events\ExpenseWasCreated' => [
            'App\Listeners\RemoveMoneyFromBalance',
        ],
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
}
