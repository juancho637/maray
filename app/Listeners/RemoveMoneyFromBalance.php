<?php

namespace App\Listeners;

use App\Events\ExpenseWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class RemoveMoneyFromBalance
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
     * @param  ExpenseWasCreated  $event
     * @return void
     */
    public function handle($event)
    {
        $balance = Auth::user()->balances()->lastBalance();

        $balance->system_real_cash -= $event->cash;
        $balance->system_real_cheque -= $event->cheque;
        $balance->system_real_card -= $event->card;
        $balance->system_real_expenditure += $event->total;
        $balance->system_real_total -= $event->total;

        $balance->save();
    }
}
