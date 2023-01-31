<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\Reservation;
use Illuminate\View\Component;

class TableauHistorique extends Component
{
    public $historique;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct($user)
    {
        $this->historique = Reservation::historique($user);
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.tableau-historique', ['historique' => $this->historique]);
    }

    public function formatDate(String $date)
    {
        return Carbon::parse($date)->format('d/m/Y à H:i:s');
    }
}
