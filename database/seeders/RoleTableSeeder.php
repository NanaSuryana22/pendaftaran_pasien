<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */

    public function run()
    {
        $role_admin = new Role();
        $role_admin->name = 'Admin';
        $role_admin->description = 'Administrator Aplikasi';
        $role_admin->save();

        $role_admin = new Role();
        $role_admin->name = 'Operator';
        $role_admin->description = 'Operator Aplikasi';
        $role_admin->save();
    }
}
