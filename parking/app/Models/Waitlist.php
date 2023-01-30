<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Waitlist extends Model
{
    use HasFactory;

    public static function add($user)
    {
        $waitlist = new Waitlist;
        $max_position = Waitlist::max('position');

        $waitlist->user_id = $user->id;
        $waitlist->position = $max_position ? $max_position + 1 : 1;

        $waitlist->save();

        return $waitlist;
    }
}
