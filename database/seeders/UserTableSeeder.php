<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UserTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_admin = Role::where('name', 'Admin')->first();
        $role_user_operator = Role::where('name', 'Operator')->first();

        $admin = new User();
        $admin->name = 'Admin';
        $admin->email = 'admin@gmail.com';
        $admin->password = bcrypt('123456789');
        $admin->save();
        $admin->roles()->attach($role_admin);

        $user_member = new User();
        $user_member->name = 'Nana Suryana';
        $user_member->email = 'nanasuryana@gmail.com';
        $user_member->password = bcrypt('12345678');
        $user_member->save();
        $user_member->roles()->attach($role_user_operator);
    }
}
