<?php

namespace App\Http\Controllers;

use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class DashboardController extends Controller
{


    public function user_homepage()
    {
        $nb_places = DB::table('places')->where('est_occupee', '=', 0)->count();

        if (Gate::allows('admin')) {
            return view('admin_dashboard', ['user' => Auth::user(), 'nb_places' => $nb_places,]);
        } else {
            return view('user_dashboard', ['user' => Auth::user(), 'nb_places' => $nb_places,]);
        }
    }

    public function parametres()
    {
        $user = Auth::user();
        $nb_places = DB::table('places')->where('est_occupee', '=', 0)->count();

        return view('parametres', ['user' => $user, 'nb_places' => $nb_places,]);
    }
}
