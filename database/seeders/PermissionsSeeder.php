<?php

namespace Database\Seeders;

use App\Models\Permissions;
use Illuminate\Database\Seeder;

class PermissionsSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'Consulter les utilisateurs',
            'Gerer les utilisateurs',
            'Consulter les produits',
            'Gerer les produits',
            'Gerer les commandes',
            'Gerer les blocs',
            'Gerer les vaccins',
        ] as $permission) {
            Permissions::firstOrCreate(['label_permission' => $permission]);
        }
    }
}
