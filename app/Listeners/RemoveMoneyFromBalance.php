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

        $balance->system_cash -= $event->cash;
        $balance->system_cheque -= $event->cheque;
        $balance->system_card -= $event->card;
        $balance->system_total -= $event->total;
        $balance->system_expenditure += $event->total;
        /*if (isset($event->credit)) {
            $balance->system_credit += $event->credit;
        }*/

        $balance->save();
    }
}
