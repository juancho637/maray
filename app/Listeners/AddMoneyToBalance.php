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

        $balance->system_cash += $event->cash;
        $balance->system_cheque += $event->cheque;
        $balance->system_card += $event->card;
        /*if (isset($event->credit)) {
            $balance->system_credit += $event->credit;
        }*/
        $balance->system_total += $event->total;

        $balance->save();
    }
}
