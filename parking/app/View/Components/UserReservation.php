<?php

namespace App\View\Components;

use App\Models\User;
use App\Models\Reservation;
use Illuminate\View\Component;

class UserReservation extends Component
{
    public $reservation;
    public $user;
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
        $this->reservation = Reservation::where('user_id', '=', $user->id)->where('est_active', '=', 1)->first();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.user-reservation', ['reservation' => $this->reservation, 'user' => $this->user]);
    }

    public function formatDate($date)
    {
        return \Carbon\Carbon::parse($date)->format('d/m/Y à H:i:s');
    }
}
