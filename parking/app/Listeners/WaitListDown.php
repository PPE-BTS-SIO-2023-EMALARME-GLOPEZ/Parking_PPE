<?php

namespace App\Listeners;

use App\Models\Place;
use App\Models\Waitlist;
use App\Events\CloseReservation;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class WaitListDown
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
     * @param  \App\Events\CloseReservation  $event
     * @return void
     */
    public function handle(CloseReservation $event)
    {
        $first_reservation_in_list = Waitlist::remove();
        $place_libre = Place::disponible();
        $first_reservation_in_list->place_id = $place_libre->id;
        Place::reserver($place_libre);
    }
}
