<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InscriptionController extends Controller
{
    public function afficher()
    {
        return view('auth.register');
    }
}
