<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();
        \App\Models\Place::factory(3)->create();
        \App\Models\Parametre::factory(1)->create();
        $this->admin();
    }

    private function admin()
    {
        $admin = new User;
        $admin->nom_utilisateur = ucfirst(env('ADMIN_NAME', 'admin'));
        $admin->prenom_utilisateur = ucfirst(env('ADMIN_SURNAME', 'admin'));
        $admin->username = env('ADMIN_USERNAME', 'admin');
        $admin->password = Hash::make(env('ADMIN_PASSWORD', 'password'));
        $admin->est_admin = true;
        $admin->reservation_id = null;
        $admin->est_actif = true;
        $admin->save();
    }
}
