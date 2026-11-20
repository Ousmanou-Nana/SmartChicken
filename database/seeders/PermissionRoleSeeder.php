<?php

namespace Database\Seeders;

use App\Models\Permissions;
use App\Models\Roles;
use Illuminate\Database\Seeder;

class PermissionRoleSeeder extends Seeder
{
    public function run(): void
    {
        $roles = Roles::all()->keyBy('label');
        $permissions = Permissions::all();

        $roles->get('Administrateur')
            ->permissions()
            ->syncWithoutDetaching($permissions->modelKeys());

        $roles->get('Eleveur')
            ->permissions()
            ->syncWithoutDetaching(
                $permissions
                    ->where('label_permission', 'Consulter les produits')
                    ->modelKeys(),
            );
    }
}
