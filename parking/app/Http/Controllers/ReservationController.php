<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;

class ReservationController extends Controller
{

    public function create($user_id)
    {
        $reservation = new Reservation;
    }
}
