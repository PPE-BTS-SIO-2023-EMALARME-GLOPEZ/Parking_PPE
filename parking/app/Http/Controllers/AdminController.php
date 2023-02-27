<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Place;
use App\Models\Reservation;
use App\Models\ListeAttente;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function afficherPlaces()
    {
        $liste_attente = ListeAttente::orderBy('position', 'asc')->get();
        return view('admin.places', ['user' => Auth::user(), 'places' => Place::all(), 'liste_attente' => $liste_attente,]);
    }

    public function afficherPageUtilisateurs()
    {
        $user = Auth::user();
        $utilisateurs = User::all();
        return view('admin.utilisateurs', ['user' => $user, 'utilisateurs' => $utilisateurs,]);
    }

    public function afficherReservations()
    {
        $user = Auth::user();
        $reservations = Reservation::all();

        return view('admin.reservations', ['user' => $user, 'users' => User::all(), 'places' => Place::all(), 'reservations' => $reservations]);
    }

    public function autoriserDemandeInscription(Request $request)
    {
        $user = User::find($request->user);
        $user->activerCompte();
        return redirect()->back();
    }

    public function desactiverUtilisateur(Request $request)
    {
        $user = User::find($request->user_id);
        $user->desactiverCompte();
        return redirect()->back();
    }

    public function deleteUser(Request $request)
    {
        $user = User::find($request->user_id);
        $user->supprimerCompte();
        return redirect()->back();
    }

    public function waitlistUp(Request $request)
    {
        $ticket = ListeAttente::find($request->id);
        $ticket->up();
        return redirect()->route('admin.places');
    }

    public function waitlistDown(Request $request)
    {
        $ticket = ListeAttente::find($request->id);
        $ticket->down();
        return redirect()->route('admin.places');
    }

    public function resetPassword(Request $request)
    {
        $user = User::find($request->user_id);

        $password_is_valid = UserController::validateNewPassword($request);

        if ($password_is_valid === true) {
            $user->changePassword($request['new_password']);
        }

        return redirect()->back();
    }

    public function ajouterPlace()
    {
        Place::ajouter();
        return redirect()->back();
    }

    public function supprimerPlace(Request $request)
    {
        $place = Place::find($request->place_id);
        $place->supprimer();

        return redirect()->back();
    }
}
