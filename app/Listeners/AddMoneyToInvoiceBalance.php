<?php

namespace App\Listeners;

use App\Events\InvoiceWasCreated;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Support\Facades\Auth;

class AddMoneyToInvoiceBalance
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
     * @param  InvoiceWasCreated  $event
     * @return void
     */
    public function handle(InvoiceWasCreated $event)
    {
        $balance = Auth::user()->balances()->lastBalance();

        $balance->system_invoice_cash += $event->cash;
        $balance->system_invoice_cheque += $event->cheque;
        $balance->system_invoice_card += $event->card;
        $balance->system_invoice_total += $event->total;

        $balance->save();
    }
}
