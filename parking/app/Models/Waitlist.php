<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    use HasFactory;

    public static function add($reservation)
    {
        $waitlist = new Waitlist;
        $max_position = Waitlist::max('position');

        $waitlist->reservation_id = $reservation->id;
        $waitlist->position = $max_position ? $max_position + 1 : 1;

        $waitlist->save();

        return $waitlist;
    }

    public static function remove()
    {
        $first = Waitlist::query()->where('position', '=', 1);
        $reservation = Reservation::find($first->reservation_id);

        $first->delete();
        Waitlist::decrement('position');
        dd($reservation);
        return $reservation;
    }
}
