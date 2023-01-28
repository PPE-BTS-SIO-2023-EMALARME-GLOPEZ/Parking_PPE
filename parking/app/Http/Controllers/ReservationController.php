<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    public function create(Request $request)
    {
        $user = auth()->user();

        if (!($user->reservation_id)) {
            $reservation = Reservation::create($user);
        }
    }
}
