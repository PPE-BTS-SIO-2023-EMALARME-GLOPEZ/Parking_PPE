<?php

namespace App\Models;

use Carbon\CarbonInterval;
use Illuminate\Support\Facades\DB as DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Place extends Model
{
    use HasFactory;

    protected $attributes = [
        "est_occupee" => false,
    ];

    public function reservation(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    public function getReservationActive()
    {
        return DB::table('reservations')->where('place_id', '=', $this->id)->where('est_active', '=', 1)->first();
    }

    public static function getFirstPlaceDisponible()
    {
        return Place::where('est_occupee', '=', 0)->first();
    }

    public static function setIndisponible(Place $place)
    {
        $place->est_occupee = 1;
        $place->save();
    }

    public static function setDisponible(Reservation $reservation)
    {
        $place_libérée = Place::find($reservation->place_id);
        $place_libérée->est_occupee = false;
        $place_libérée->save();


        if (ListeAttente::count() > 0) {
            Place::reattribuer($place_libérée);
        }
    }

    private static function reattribuer(Place $place_libérée)
    {
        $reservation = ListeAttente::retirerPremier();
        $reservation->attribuerPlace($place_libérée);
    }

    public static function ajouter()
    {
        $place = new Place;
        $place->save();
    }

    public function supprimer()
    {
        $reservation_en_cours = Reservation::where('place_id', '=', $this->id)->where('est_active', '=', 1)->get()->first();

        if ($reservation_en_cours) {
            $reservation_en_cours->libererPlacePourSuppression();
        }

        $this->supprimerHistorique();
        $this->delete();
    }

    public function libererPourReattribution()
    {
        if ($this->est_occupee) {
            $reservation = Reservation::where('place_id', '=', $this->id)->where('est_active', '=', 1)->first();
            $reservation->est_active = 0;
            $reservation->date_fin_reservation = now();
            $reservation->save();

            $user = $reservation->user()->first();
            $user->clearReservationId();

            if (isset($reservation->position_liste_attente)) {
                ListeAttente::quitter($reservation);
                $reservation->delete();
            }
        }

        return $this;
    }

    public function supprimerHistorique()
    {
        $reservations = Reservation::where('place_id', '=', $this->id)->where('est_active', '=', 0)->get();

        foreach ($reservations as $reservation) {
            $reservation->delete();
        }
    }
}
