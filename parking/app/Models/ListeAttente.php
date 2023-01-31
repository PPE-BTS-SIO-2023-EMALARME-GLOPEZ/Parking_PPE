<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListeAttente extends Model
{
    use HasFactory;

    public static function add($user)
    {
        $liste_attente = new ListeAttente;
        $max_position = ListeAttente::max('position');

        $liste_attente->user_id = $user->id;
        $liste_attente->position = $max_position ? $max_position + 1 : 1;

        $liste_attente->save();

        return $liste_attente;
    }
}
