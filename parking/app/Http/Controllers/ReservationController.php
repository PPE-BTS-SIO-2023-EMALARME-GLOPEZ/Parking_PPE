<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function create()
    {
        $user = Auth::user();

        if (!($user->reservation_id)) {
            Reservation::create($user);
            session()->flash('message', 'Reservation effectuée !');
        } else {
            session()->flash('message', 'Vous avez déja une réservation #' . $user->reservation_id);
        }

        return redirect('dashboard');
    }

    public function delete()
    {
        $user = Auth::user();
        $reservation = Reservation::find($user->reservation_id);

        $reservation->est_active = 0;
        $reservation->save();

        if ($reservation->place_id) {
            $place = Place::find($reservation->place_id);
            $place->est_occupee = 0;
            $place->save();
        }

        $user->reservation_id = null;
        $user->save();

        return redirect('dashboard');
    }
}
