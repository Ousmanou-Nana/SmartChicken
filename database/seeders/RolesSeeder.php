<?php

namespace Database\Seeders;

use App\Models\Roles;
use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    public function run(): void
    {
        Roles::firstOrCreate(['label' => 'Administrateur']);
        Roles::firstOrCreate(['label' => 'Eleveur']);
    }
}
