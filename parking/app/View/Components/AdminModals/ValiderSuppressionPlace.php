<?php

namespace App\View\Components\AdminModals;

use Illuminate\View\Component;

class ValiderSuppressionPlace extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
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
        return view('components.admin-modals.valider-suppression-place');
    }
}
