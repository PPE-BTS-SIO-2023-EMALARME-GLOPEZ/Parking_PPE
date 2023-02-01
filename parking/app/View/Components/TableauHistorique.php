<?php

namespace App\View\Components;

use Carbon\Carbon;
use App\Models\Reservation;
use Carbon\CarbonInterval;
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

    public function formatDate($date)
    {
        return Carbon::parse($date)->format('\L\e d/m/Y à H:i:s');
    }

    public function reservationDuration(Reservation $reservation)
    {
        $start = Carbon::parse($reservation->date_debut_reservation);
        $end = Carbon::parse($reservation->date_fin_reservation);

        $carbonDiffMethods = [
            ' jours' => 'diffInDays',
            ' heures' => 'diffInHours',
            ' minutes' => 'diffInMinutes',
            ' secondes' => 'diffInSeconds',
        ];

        $duration = 0;

        foreach ($carbonDiffMethods as $timeUnit => $difference) {

            $duration = $start->$difference($end);

            if ($duration > 0) {
                return $duration . $timeUnit;
            }
        }
    }
}
