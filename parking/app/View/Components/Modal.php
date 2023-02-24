<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Modal extends Component
{
    public string $content;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public string $nom)
    {
        switch ($nom) {
            case "creerUtilisateur":
                $this->content = "admin-modals.ajouter-utilisateur";
                break;
            case "optionsUtilisateur":
                $this->content = "admin-modals.options-utilisateur";
                break;
            case "validerSuppressionPlace":
                $this->content = "admin-modals.valider-suppression-place";
                break;
        }
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.modal');
    }
}
