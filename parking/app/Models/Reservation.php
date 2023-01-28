<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Reservation extends Model
{
    use HasFactory;

    protected $attributes = [
        "date_fin_reservation" => null,
        "est_active" => false,
        "num_liste_attente" => null,
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function place(): HasOne
    {
        return $this->hasOne(Place::class);
    }

    public function historiqueReservations(): HasOne
    {
        return $this->hasOne(User::class);
    }

    public static function create($user)
    {
        $reservation = new Reservation;
        $place_libre = DB::table('places')->where('est_occupee', '=', 0)->get();

        $reservation->user_id = $user->id;
        $reservation->est_active = true

        if (!($place_libre)) {
            $waitlist = Waitlist::add($user);

            $reservation->num_liste_attente = $waitlist->position;
            $reservation->place_id = null;
        }
        else {
            $reservation->place_id = 
        }
    }
}
