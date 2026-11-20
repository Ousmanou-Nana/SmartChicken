<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::firstOrCreate(
            ['email' => 'test@example.com'],
            [
                'name' => 'Test User',
                'password' => 'password',
            ],
        );

        $this->call([
            RolesSeeder::class,
            PermissionsSeeder::class,
            BlocsSeeder::class,
            VaccinsSeeder::class,
            UsersSeeder::class,
            RoleUserSeeder::class,
            PermissionRoleSeeder::class,
            BlocVaccinSeeder::class,
            CommandesSeeder::class,
            ProduitsSeeder::class,
        ]);
    }
}
