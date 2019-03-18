<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('users')->delete();

        \DB::table('users')->insert(array (

            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'djefoo',
                'email' => 'info@bourbon-digital.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$sbKtEZMULhIcgWkkX31Wq.5pALBZtmj0AarTz3RMRXwhAgsNWIoo2',
                'remember_token' => '92Nf9hQnfcL3A8CL4ro3HJVUXyJVwYVcLgqYc09WdoIjyDhu9Dc1OmSpmjK4',
                'settings' => NULL,
                'created_at' => '2018-08-13 13:25:50',
                'updated_at' => '2018-08-13 13:25:50',
            ),

            array (
                'id' => 3,
                'role_id' => 3,
                'name' => 'Administrateur',
                'email' => 'c.monel@investis-dom.com',
                'avatar' => 'users/August2018/I9E3dxrV7J5OEUAzqFK2.png',
                'password' => '$2y$10$kQTnOvxsdVaq4KeB6u6vquorkMEwv8yJlelP8gQu4YwZxwOL6I50m',
                'remember_token' => null,
                'settings' => '{"locale":"fr"}',
                'created_at' => '2018-08-23 17:14:58',
                'updated_at' => '2018-08-23 17:14:58',
            ),

            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'support',
                'email' => 'support@bourbon-digital.com',
                'avatar' => 'users/August2018/KWQkYP2SxIktP9OUcmUk.jpeg',
                'password' => '$2y$10$X9M..b2stIB0Xabmtbr5s.vQMEx0Ks58ypam1B9XH27Pwzx2rSbya',
                'remember_token' => null,
                'settings' => '{"locale":"fr"}',
                'created_at' => '2018-08-12 14:28:45',
                'updated_at' => '2019-03-14 05:38:33',
            ),

        ));


    }
}