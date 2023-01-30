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

    public function close()
    {
        $user = Auth::user();
        Reservation::close($user);

        return redirect('dashboard');
    }
}
