<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = Auth::user();
        $nb_places = DB::table('places')->where('est_occupee', '=', 0)->count();
        $reservation = Reservation::where('user_id', '=', $user->id)->where('est_active', '=', 1)->first();
        $historique = Reservation::historique($user);
        return view('dashboard', ['user' => $user, 'nb_places' => $nb_places, 'reservation' => $reservation, 'historique' => $historique]);
    }
}
