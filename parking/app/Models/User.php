<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Attribute;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Facades\Hash;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $attributes = [
        "est_admin" => false,
    ];

    /**
     * Retourne la réservation active de l'utilisateur
     * 
     * @return Reservation $reservation
     */
    public function reservation(): HasOne
    {
        return $this->hasOne(Reservation::class);
    }

    public function  historiqueReservations(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }

    public static function create(array $data)
    {
        $user = new User;
        $user->nom_utilisateur = $data['nom_utilisateur'];
        $user->prenom_utilisateur = $data['prenom_utilisateur'];
        $user->username = $data['username'];
        $user->password = Hash::make($data['password']);
        $user->est_admin = false;
        $user->reservation_id = null;
        //$user->est_actif = false;

        $user->save();

        return $user;
    }

    public function setReservationId($reservation)
    {
        $this->reservation_id = $reservation->id;
        $this->save();
    }

    public function clearReservationId()
    {
        $this->reservation_id = null;
        $this->save();
    }

    public function getReservationActive()
    {
        return Reservation::where('est_active', '=', 1)->where('user_id', '=', $this->id)->first();
    }

    public function getReservation()
    {
        if (is_null($this->getReservationActive())) {

            Reservation::create($this);
            session()->flash('message', 'Reservation effectuée !');
        }
    }
}
