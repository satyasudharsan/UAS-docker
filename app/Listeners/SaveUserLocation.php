<?php

namespace App\Listeners;

use App\Events\UserLoggedIn;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class SaveUserLocation
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

    use InteractsWithQueue;

    /**
     * Handle the event.
     *
     * @param \App\Events\UserLoggedIn $event
     * @return void
     */
    public function handle(UserLoggedIn $event)
    {
        // Update the user's location data
        $event->user->location->update([
            'latitude' => $event->location->latitude,
            'longitude' => $event->location->longitude,
            'temperature_min' => $event->location->temperature_min,
            'temperature_max' => $event->location->temperature_max,
        ]);
    }
}
