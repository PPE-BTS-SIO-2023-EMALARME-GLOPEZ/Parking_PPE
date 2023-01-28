<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function __invoke()
    {
        $user = auth()->user();
        $nb_places = DB::table('places')->where('est_occupee', '=', 0)->count();
        return view('dashboard', ['user' => $user, 'nb_places' => $nb_places]);
    }
}
