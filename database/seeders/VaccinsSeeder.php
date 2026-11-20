<?php

namespace Database\Seeders;

use App\Models\Vaccins;
use Illuminate\Database\Seeder;

class VaccinsSeeder extends Seeder
{
    public function run(): void
    {
        foreach ([
            'Newcastle' => 1000,
            'Gumboro' => 1200,
            'Marek' => 1500,
        ] as $label => $price) {
            Vaccins::updateOrCreate(
                ['label_vaccin' => $label],
                ['prix_vaccin' => $price],
            );
        }
    }
}
