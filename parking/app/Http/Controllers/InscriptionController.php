<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nom_utilisateur' => ['required'],
            'prenom_utilisateur' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' =>  ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['same:password'],
        ]);

        $user = User::create($validatedData);

        auth()->login($user);

        return redirect()->route('login');
    }
}
