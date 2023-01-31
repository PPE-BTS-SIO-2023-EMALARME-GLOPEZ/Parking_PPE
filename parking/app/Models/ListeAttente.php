<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ListeAttente extends Model
{
    use HasFactory;

    public static function add(Reservation $reservation)
    {
        $liste_attente = new ListeAttente;
        $max_position = ListeAttente::max('position');

        $liste_attente->reservation_id = $reservation->id;

        $liste_attente->position = $max_position ? $max_position + 1 : 1;

        $liste_attente->save();

        return $liste_attente;
    }

    public static function retirerPremier()
    {
        $first_in_list = ListeAttente::where('position', '=', 1)->first();

        $reservation =  Reservation::find($first_in_list->reservation_id);

        $first_in_list->delete();
        ListeAttente::query()->update(['position' => DB::raw('position - 1')]);
        Reservation::query()->update(['position_liste_attente' => DB::raw('position_liste_attente - 1')]);

        return $reservation;
    }

    public static function quitter(Reservation $reservation)
    {
        $user = ListeAttente::where('reservation_id', '=', $reservation->id)->first();

        $following_reservations_in_queue = ListeAttente::where('position', '>', $user->position)->get();

        $following_reservations_in_queue->map(function ($following_reservation) {
            $following_reservation->position -= 1;
            $following_reservation->save();
        });
    }
}
