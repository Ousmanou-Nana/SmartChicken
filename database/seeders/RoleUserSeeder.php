<?php

namespace Database\Seeders;

use App\Models\Roles;
use App\Models\Users;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    public function run(): void
    {
        $user = Users::where('login_user', 'fermier-demo')->firstOrFail();
        $role = Roles::where('label', 'Eleveur')->firstOrFail();

        $user->roles()->syncWithoutDetaching([$role->getKey()]);
    }
}
