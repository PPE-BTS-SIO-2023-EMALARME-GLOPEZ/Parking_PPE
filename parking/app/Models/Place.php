<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

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

    public static function disponible()
    {
        return Place::where('est_occupee', '=', 0)->first();
    }

    public static function reserver(Place $place)
    {
        $place->est_occupee = 1;
        $place->save();
    }

    public static function liberer(Place $place)
    {
        $place->est_occupee = false;
        $place->save();
    }
}
