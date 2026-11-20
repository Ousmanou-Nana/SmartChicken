<?php

namespace Database\Seeders;

use App\Models\Commandes;
use App\Models\Users;
use Illuminate\Database\Seeder;

class CommandesSeeder extends Seeder
{
    public function run(): void
    {
        $user = Users::where('login_user', 'fermier-demo')->firstOrFail();

        Commandes::firstOrCreate(
            [
                'id_user' => $user->getKey(),
                'date_commande' => '2026-01-01 09:00:00',
            ],
            [
                'total_commande' => 12500,
                'statut_commande' => 'EN_COURS',
            ],
        );
    }
}
