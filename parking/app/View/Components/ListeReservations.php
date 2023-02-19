<?php

namespace App\View\Components;

use Carbon\Carbon;
use Illuminate\View\Component;

class ListeReservations extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(public $reservations)
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
        return view('components.liste-reservations');
    }

    public function formatDate($date)
    {
        return Carbon::parse($date)->format('d/m/Y');
    }
}
