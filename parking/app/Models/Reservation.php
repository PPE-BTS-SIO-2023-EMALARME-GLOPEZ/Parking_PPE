<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $attributes = [
        "date_fin_reservation" => null,
        "est_active" => false,
        "num_liste_attente" => null,
    ];
}
