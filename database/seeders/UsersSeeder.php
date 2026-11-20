<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class UsersSeeder extends Seeder
{
    public function run(): void
    {
        Users::firstOrCreate(
            ['login_user' => 'fermier-demo'],
            [
                'nom_user' => 'Fermier',
                'prenom_user' => 'Demo',
                'email_user' => 'fermier-demo@smartchicken.test',
                'phone_user' => '0000000000',
                'sexe' => 'M',
                'password_user' => Str::random(40),
                'statut_user' => 'ACTIF',
            ],
        );
    }
}
