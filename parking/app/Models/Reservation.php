<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Support\Carbon;

class Reservation extends Model
{
    use HasFactory;

    protected $attributes = [
        "date_fin_reservation" => null,
        "est_active" => null,
        "position_liste_attente" => null,
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

    public static function create(User $user)
    {
        $reservation_active = Reservation::where('est_active', '=', 1)->where('user_id', '=', $user->id)->first();

        if (is_null($reservation_active)) {

            $reservation = new Reservation;
            $reservation->est_active = true;

            $reservation->user_id = $user->id;
            //$reservation->save();

            $place_libre = Place::disponible();

            if (is_null($place_libre)) {
                // Ajouter l'utilisteur à la file d'attente 
                $liste_attente = ListeAttente::add($user);

                // Ajoute la position en file d'attente à la réservation
                $reservation->position_liste_attente = $liste_attente->position;
                $reservation->place_id = null;
            } else {
                // Si il y a une place disponible elle est attibuée a la réservation
                Place::reserver($place_libre);
                $reservation->place_id = $place_libre->id;
                $reservation->position_liste_attente = null;
                $duree_reservation = Parametre::find(1)->duree_reservations;
                $reservation->date_fin_reservation = now()->add(CarbonInterval::days($duree_reservation));
            }


            $user->reservation_id = $reservation->id;
            $user->save();

            return $reservation;
        }

        return redirect()->back()->flash('message', 'Vous avez déja une réservation active');
    }

    public static function close(User $user)
    {
        $reservation = Reservation::find($user->reservation_id);

        $reservation->est_active = 0;
        $reservation->date_fin_reservation = now();
        $reservation->save();

        $place = Place::find($reservation->place_id);
        $place->est_occupee = 0;
        $place->save();

        $user->reservation_id = null;
        $user->save();
    }

    public static function historique($user)
    {
        $historique = Reservation::where('user_id', '=', $user->id)->where('est_active', '=', 0)->get();

        return $historique;
    }
}
