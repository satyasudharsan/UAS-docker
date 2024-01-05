<?php

namespace App\Events;

use App\Models\User;
use App\Models\Location;
use Illuminate\Broadcasting\Channel;
use Illuminate\Queue\SerializesModels;
use Illuminate\Broadcasting\PrivateChannel;
use Illuminate\Broadcasting\PresenceChannel;
use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Contracts\Broadcasting\ShouldBroadcast;

class UserLoggedIn
{
    use Dispatchable, InteractsWithSockets, SerializesModels;

    public $user;
    public $location; // Mengganti recommendation dengan location

    /**
     * Create a new event instance.
     *
     * @param \App\Models\User $user
     * @param \App\Models\Location $location // Mengganti Recommendation dengan Location
     */
    public function __construct(User $user, Location $location) // Mengganti Recommendation dengan Location
    {
        $this->user = $user;
        $this->location = $location; // Mengganti recommendation dengan location
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
