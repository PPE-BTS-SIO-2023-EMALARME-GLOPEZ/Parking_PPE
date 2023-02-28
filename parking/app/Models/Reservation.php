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

    public static function create(User $user)
    {
        $reservation = new Reservation;
        $reservation->est_active = true;
        $reservation->user_id = $user->id;
        $reservation->save();

        $place_disponible = Place::getFirstPlaceDisponible();

        if (isset($place_disponible)) {
            $reservation->attribuerPlace($place_disponible);
        } else {
            $reservation->mettreEnAttente();
        }

        $user->setReservationId($reservation);
    }


    public static function close(User $user)
    {
        $reservation = Reservation::find($user->reservation_id);
        $reservation->est_active = 0;
        $reservation->date_fin_reservation = now();
        $reservation->save();

        $user->clearReservationId();

        if (isset($reservation->place_id)) {
            Place::setDisponible($reservation);
        }

        if (isset($reservation->position_liste_attente)) {
            ListeAttente::quitter($reservation);
            $reservation->delete();
        }
    }

    private function occupeUnePlace(): bool
    {
        return isset($this->place_id);
    }

    private function estDansLaListeAttente(): bool
    {
        return isset($this->position_liste_attente);
    }

    public static function historique($user)
    {
        $historique = Reservation::where('user_id', '=', $user->id)->where('est_active', '=', 0)->get();

        return $historique;
    }

    private function mettreEnAttente()
    {
        $liste_attente = ListeAttente::add($this);

        $this->position_liste_attente = $liste_attente->position;
        $this->place_id = null;

        $this->save();
    }

    public function attribuerPlace(Place $place_disponible)
    {
        Place::setIndisponible($place_disponible);

        // La reservation obtient une place
        $this->place_id = $place_disponible->id;

        // Elle n'est pas dans la file d'attente
        $this->position_liste_attente = null;

        // On récupére la durée de reservation fixée par l'admin dans les paramètres de l'application
        $delay = Parametre::find(1)->duree_reservation;

        // On fixe la date de début et de fin pour la réservation
        $this->date_debut_reservation = now();
        $this->date_fin_reservation = Carbon::now()->addDays($delay);

        $this->save();
    }

    public function libererPlacePourSuppression()
    {
        $user = $this->user()->first();

        $this->est_active = 0;
        $this->date_fin_reservation = now();
        $this->save();

        $user->clearReservationId();
    }
}
