<?php

namespace App\Events;

use App\Models\RideRequest;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class RideRequestApproved
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    /**
     * @var \App\RideRequest
     */
    public $rideRequest;

    /**
     * Create a new event instance.
     *
     * @param \App\RideRequest $rideRequest
     */
    public function __construct(RideRequest $rideRequest)
    {
        $this->rideRequest = $rideRequest;
    }
}
