<?php

namespace App\Events;

use App\Models\Seat;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;
use Illuminate\Queue\SerializesModels;

class SeatSelected implements ShouldBroadcast
{
    use InteractsWithSockets, SerializesModels;

    public $seat;

    public function __construct(Seat $seat)
    {
        $this->seat = $seat;
    }

    public function broadcastOn()
    {
        return new PresenceChannel('seat-updates');
    }
}

