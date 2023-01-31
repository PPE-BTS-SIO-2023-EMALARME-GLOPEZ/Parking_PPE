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

    /**
     * 
     * Crée une nouvelle réservation
     * 
     * @param User $user
     * @return Reservation $reservation 
     * 
     */
    public static function create(User $user)
    {
        $has_reservation_active = Reservation::active($user);

        if (is_null($has_reservation_active)) {
            $reservation = new Reservation;
            $reservation->est_active = true;
            $reservation->user_id = $user->id;
            $reservation->save();

            $place_disponible = Place::getDisponible();

            if (is_null($place_disponible)) {
                $reservation = Reservation::mettreEnAttente($reservation);
            } else {
                $reservation = Reservation::attribuerPlace($reservation, $place_disponible);
            }

            $user->reservation_id = $reservation->id;
            $user->save();

            return $reservation;
        }

        return redirect()->back();
    }

    public static function close(User $user)
    {
        $reservation = Reservation::find($user->reservation_id);
        $reservation->est_active = 0;
        $reservation->date_fin_reservation = now();
        $reservation->save();

        $user->reservation_id = null;
        $user->save();

        // Si l'utilisateur avait une place
        if (isset($reservation->place_id)) {
            Place::setDisponible($reservation);
        }
        // Si l'utilisateur était dans la file d'attente
        if (isset($reservation->position_liste_attente)) {
            ListeAttente::quitter($reservation);
            $reservation->delete();
        }
    }

    public static function historique($user)
    {
        $historique = Reservation::where('user_id', '=', $user->id)->where('est_active', '=', 0)->get();

        return $historique;
    }

    private static function active(User $user)
    {
        return Reservation::where('est_active', '=', 1)->where('user_id', '=', $user->id)->first();
    }

    public static function mettreEnAttente(Reservation $reservation)
    {
        $liste_attente = ListeAttente::add($reservation);

        // La reservation est dans la liste d'attente
        $reservation->position_liste_attente = $liste_attente->position;
        // La reservation n'a donc pas de place
        $reservation->place_id = null;

        $reservation->save();

        return $reservation;
    }

    public static function attribuerPlace(Reservation $reservation, Place $place_disponible)
    {
        Place::setIndisponible($place_disponible);

        // La reservation obtient une place
        $reservation->place_id = $place_disponible->id;

        // Elle n'est pas dans la file d'attente
        $reservation->position_liste_attente = null;

        // On récupére la durée de reservation fixée par l'admin dans les paramètres de l'application
        $duree_reservation = Parametre::find(1)->duree_reservations;

        // On fixe la date de début et de fin pour la réservation
        $reservation->date_debut_reservation = now();
        $reservation->date_fin_reservation = now()->add(CarbonInterval::days($duree_reservation));

        $reservation->save();
        return $reservation;
    }
}
