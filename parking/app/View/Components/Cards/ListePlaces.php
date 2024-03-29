<?php

namespace App\View\Components\Cards;

use App\Models\Place;
use App\Models\Reservation;
use Illuminate\View\Component;

class ListePlaces extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $places)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.liste-places');
    }

    public function fetchUsername(Place $place)
    {
        if ($place->est_occupee) {
            $reservation = Reservation::where('place_id', '=', $place->id)->first();
            $user = $reservation->user()->first();
            $username = $user->username;
            return "@" . $username;
        }
        return "(non attribuée)";
    }
}
