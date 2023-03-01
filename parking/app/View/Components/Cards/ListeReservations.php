<?php

namespace App\View\Components\Cards;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Reservation;
use Illuminate\View\Component;

class ListeReservations extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $reservations)
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
        return view('components.cards.liste-reservations');
    }

    public function fetchDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }

    public function fetchUsername(Reservation $reservation)
    {
        $user = User::find($reservation->user_id);

        return '@' . $user->username;
    }
}
