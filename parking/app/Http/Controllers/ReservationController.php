<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ReservationController extends Controller
{

    public function create(Request $request)
    {
        $user = Auth::user();

        if (is_null($user->reservation_id)) {
            Reservation::create($user);
            session()->flash('message', 'Reservation effectuée !');
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
