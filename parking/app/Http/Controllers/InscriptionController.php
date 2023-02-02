<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class InscriptionController extends Controller
{
    public function create()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {

        $donnees_valides = InscriptionController::validateData($request);

        if ($donnees_valides) {
            $user = User::create($request->all());

            auth()->login($user);
        }

        return redirect()->route('login');
    }

    private static function validateData(Request $request)
    {

        $validator = Validator::make($request->all(), [
            'nom_utilisateur' => ['required'],
            'prenom_utilisateur' => ['required'],
            'username' => ['required', 'unique:users'],
            'password' =>  ['required', 'confirmed', 'min:8'],
            'password_confirmation' => ['same:password'],
        ]);


        if ($validator->fails()) {
            return redirect('register')->withErrors($validator)->withInput();
        }

        return true;
    }
}
