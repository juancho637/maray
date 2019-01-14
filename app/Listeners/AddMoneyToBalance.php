<?php

namespace App\Listeners;

use App\Events\PurchaseOrderWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class AddMoneyToBalance
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  PurchaseOrderWasCreated  $event
     * @return void
     */
    public function handle($event)
    {
        $balance = Auth::user()->balances()->lastBalance();

        $balance->system_real_cash += $event->cash;
        $balance->system_real_cheque += $event->cheque;
        $balance->system_real_card += $event->card;
        $balance->system_real_total += $event->total;

        $balance->system_global_cash += $event->cash;
        $balance->system_global_cheque += $event->cheque;
        $balance->system_global_card += $event->card;
        $balance->system_global_total += $event->total;

        $balance->save();
    }
}
