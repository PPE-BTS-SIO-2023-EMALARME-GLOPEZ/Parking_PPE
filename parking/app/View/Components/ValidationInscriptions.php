<?php

namespace App\View\Components;

use App\Models\User;
use Illuminate\View\Component;
use Illuminate\Database\Eloquent\Collection;

class ValidationInscriptions extends Component
{
    public Collection $utilisateurs_en_attente;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public Collection $utilisateurs)
    {
        $this->utilisateurs_en_attente = $utilisateurs->intersect(User::where('est_actif', '=', 0)->get());
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.validation-inscriptions');
    }
}
