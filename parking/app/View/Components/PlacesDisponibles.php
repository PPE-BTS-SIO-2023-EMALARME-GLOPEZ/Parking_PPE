<?php

namespace App\View\Components;

use Illuminate\View\Component;
use Illuminate\Support\Facades\DB;

class PlacesDisponibles extends Component
{
    public $nbPlaces;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->nbPlaces = DB::table('places')->where('est_occupee', '=', 0)->count();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.places-disponibles');
    }
}
