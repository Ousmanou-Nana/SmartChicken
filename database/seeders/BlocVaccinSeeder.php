<?php

namespace Database\Seeders;

use App\Models\Blocs;
use App\Models\Vaccins;
use Illuminate\Database\Seeder;

class BlocVaccinSeeder extends Seeder
{
    public function run(): void
    {
        $vaccinIds = Vaccins::all()->modelKeys();

        Blocs::all()->each(
            fn (Blocs $bloc) => $bloc->vaccins()->syncWithoutDetaching($vaccinIds),
        );
    }
}
