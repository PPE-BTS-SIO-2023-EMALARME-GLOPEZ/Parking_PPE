<?php

namespace App\View\Components\Cards;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\View\Component;
use App\Models\ListeAttente as WaitList;

class ListeAttente extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $liste)
    {
        //
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.cards.liste-attente');
    }

    public function getNomPrenomUtilisateur(WaitList $ticket): String
    {
        $reservation = Reservation::find($ticket->reservation_id);
        $user = User::find($reservation->user_id);

        $nom = $user->nom_utilisateur;
        $prenom = $user->prenom_utilisateur;

        return $nom . ' ' . $prenom;
    }

    public function getReservation(WaitList $ticket)
    {
        return Reservation::find($ticket->reservation_id);
    }
}
