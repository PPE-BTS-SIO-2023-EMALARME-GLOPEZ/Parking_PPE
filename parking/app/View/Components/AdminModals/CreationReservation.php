<?php

namespace App\View\Components\AdminModals;

use App\Models\User as Utilisateur;
use Illuminate\View\Component;

class CreationReservation extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $users, public $places)
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
        return view('components.admin-modals.creation-reservation');
    }

    public function fetchFullName(Utilisateur $user)
    {
        return $user->prenom_utilisateur . ' ' . $user->nom_utilisateur;
    }
}
