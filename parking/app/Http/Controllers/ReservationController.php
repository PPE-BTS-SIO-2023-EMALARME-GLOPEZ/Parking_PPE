<?php

namespace App\Http\Controllers;

use App\Models\Place;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReservationController extends Controller
{

    public function create($user_id)
    {
        $reservation = new Reservation;

        $reservation->user_id = $user_id;

        $place_libre = DB::table('places')->where('est_occupee', 'is', 'false')->get();

        // Fonction qui utilise la variable $place_libre pour soit placer la réservation en file d'attente soit réserver la place
        echo $place_libre;
    }
}
