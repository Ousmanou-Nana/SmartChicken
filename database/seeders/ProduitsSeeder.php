<?php

namespace Database\Seeders;

use App\Models\Blocs;
use App\Models\Produits;
use App\Models\Users;
use Illuminate\Database\Seeder;

class ProduitsSeeder extends Seeder
{
    public function run(): void
    {
        $user = Users::where('login_user', 'fermier-demo')->firstOrFail();
        $bloc = Blocs::where('label_bloc', 'Bloc A')->firstOrFail();

        foreach ([
            [
                'label_produit' => 'Oeufs frais',
                'description_produit' => 'Oeufs frais produits a la ferme.',
                'type_produit' => 'OEUF',
                'quantite_produit' => 120,
                'prix_produit' => 250.00,
            ],
            [
                'label_produit' => 'Poulets de chair',
                'description_produit' => 'Poulets eleves dans le Bloc A.',
                'type_produit' => 'POULE',
                'quantite_produit' => 35,
                'prix_produit' => 4500.00,
            ],
        ] as $attributes) {
            Produits::firstOrCreate(
                [
                    'label_produit' => $attributes['label_produit'],
                    'id_user' => $user->getKey(),
                    'id_bloc' => $bloc->getKey(),
                ],
                $attributes + [
                    'id_user' => $user->getKey(),
                    'id_bloc' => $bloc->getKey(),
                ],
            );
        }
    }
}
