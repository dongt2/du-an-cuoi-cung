<?php

namespace App\Events;

use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class SeatSelected implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $seatId;

    public function __construct($seatId)
    {
        $this->seatId = $seatId;
    }

    public function broadcastOn()
    {
        return new PresenceChannel('seats');
    }
}

