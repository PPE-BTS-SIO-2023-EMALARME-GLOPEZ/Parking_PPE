<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function afficherPlaces()
    {
        return view('admin.places', ['user' => Auth::user(), '']);
    }

    public function afficherPageUtilisateurs()
    {
        $user = Auth::user();
        $utilisateurs = User::all();
        return view('admin.utilisateurs', ['user' => $user, 'utilisateurs' => $utilisateurs,]);
    }

    public function autoriserDemandeInscription(Request $request)
    {
        $user = User::find($request->user);
        $user->activerCompte();
        return redirect()->back();
    }
}
