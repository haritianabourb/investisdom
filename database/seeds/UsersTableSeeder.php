<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Role;
use TCG\Voyager\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
            $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => 'info@bourbon-digital.com',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);

            User::create([
                'name'           => 'Support',
                'email'          => 'support@bourbon-digital.com',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);

            User::create([
                'name'           => 'Administrateur',
                'email'          => 'c.monel@investis-dom.com ',
                'password'       => bcrypt('password'),
                'remember_token' => str_random(60),
                'role_id'        => $role->id,
            ]);
        }
    }
}
