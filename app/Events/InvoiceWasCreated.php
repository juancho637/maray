<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class InvoiceWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cash;
    public $cheque;
    public $card;
    public $total;

    /**
     * Create a new event instance.
     *
     * @param $cash
     * @param $cheque
     * @param $card
     * @param $total
     */
    public function __construct($cash, $cheque, $card, $total)
    {
        $this->cash = $cash;
        $this->cheque = $cheque;
        $this->card = $card;
        $this->total = $total;
    }

    /**
     * Get the channels the event should broadcast on.
     *
     * @return \Illuminate\Broadcasting\Channel|array
     */
    public function broadcastOn()
    {
        return new PrivateChannel('channel-name');
    }
}
