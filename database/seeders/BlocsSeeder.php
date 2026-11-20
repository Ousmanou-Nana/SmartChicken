<?php

namespace Database\Seeders;

use App\Models\Blocs;
use Illuminate\Database\Seeder;

class BlocsSeeder extends Seeder
{
    public function run(): void
    {
        foreach (['Bloc A', 'Bloc B', 'Bloc C'] as $label) {
            Blocs::firstOrCreate(['label_bloc' => $label]);
        }
    }
}
