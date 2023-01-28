<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login()
    {
        return view('auth.login');
    }

    public function authenticate(Request $request)
    {
        $request->validate([
            'username' => ['required'],
            'password' => ['required', 'min:8'],
        ]);

        if (auth()->attempt($request->only('username', 'password'))) {
            $user_id = auth()->user()->id;
            return redirect()->route('dashboard');
        }

        return redirect()->back()->withErrors('Identifiants incorrects :-(');
    }

    public function logout()
    {
        auth()->logout();
        return redirect()->route('login');
    }
}
