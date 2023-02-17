<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\View\View;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

class InscriptionController extends Controller
{
    public function afficherVue(): View
    {
        return view('auth.register');
    }

    public function store(Request $request): RedirectResponse
    {
        $donnéesValidées = InscriptionController::validateData($request);

        $user = User::create($donnéesValidées);

        auth()->login($user);

        return redirect()->route('login');
    }

    private static function validateData(Request $request)
    {

        $donnéesValidées = $request->validate([
            'nom_utilisateur' => ['required', 'min:2'],
            'prenom_utilisateur' => ['required', 'min:3'],
            'username' => ['required', 'unique:users'],
            'password' =>  ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['same:password'],
        ]);

        return $donnéesValidées;
    }
}
