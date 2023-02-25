<?php

namespace App\View\Components\Cards;

use Illuminate\View\Component;

class ListeUtilisateurs extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $utilisateurs)
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
        return view('components.cards.liste-utilisateurs');
    }
}
