<?php

namespace App\Events;

use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class ExpenseWasCreated
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $cash;
    public $card;
    public $cheque;
    public $total;

    /**
     * Create a new event instance.
     *
     * @param $cash
     * @param $card
     * @param $cheque
     * @param $total
     */
    public function __construct($cash, $card, $cheque, $total)
    {
        $this->cash = $cash;
        $this->card = $card;
        $this->cheque = $cheque;
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
