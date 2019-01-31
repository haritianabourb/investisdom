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
            0 => 
            array (
                'id' => 4,
                'role_id' => 1,
                'name' => 'Artur',
                'email' => 'artur@bourbon-digital.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$C2KfpVIZNOYIfttS1J0aeuKD1rA0.OUnaVl1lUuBkvlNFDZvlwNJS',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2018-10-02 05:20:07',
                'updated_at' => '2018-10-02 05:20:07',
            ),
            1 => 
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
            2 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'name' => 'Administrateur',
                'email' => 'c.monel@investis-dom.com',
                'avatar' => 'users/August2018/I9E3dxrV7J5OEUAzqFK2.png',
                'password' => '$2y$10$kQTnOvxsdVaq4KeB6u6vquorkMEwv8yJlelP8gQu4YwZxwOL6I50m',
                'remember_token' => 'hdog5o46F8RxoSNcHg368s87JyLLZtYzNA084e4v2wsLAGTbzVbXy8Pr0sv8',
                'settings' => '{"locale":"fr"}',
                'created_at' => '2018-08-23 17:14:58',
                'updated_at' => '2018-08-23 17:14:58',
            ),
            3 => 
            array (
                'id' => 5,
                'role_id' => 4,
                'name' => 'Contact1 TEST1',
                'email' => 'test@email.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$D5MGFwzP.AYXtTCQJVCsw.7Ws47SwTtAMiJN24ZjGn5MGLWQ74Z4e',
                'remember_token' => NULL,
                'settings' => '{"locale":"en"}',
                'created_at' => '2019-01-11 10:55:43',
                'updated_at' => '2019-01-30 08:00:15',
            ),
            4 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'support',
                'email' => 'support@bourbon-digital.com',
                'avatar' => 'users/August2018/KWQkYP2SxIktP9OUcmUk.jpeg',
                'password' => '$2y$10$osF.tWlhnq3xTCiQCVFmpu314vdxwH6A7Tsqhl19MPAowVn0YRzOK',
                'remember_token' => 'zrng7JRVEevFscPQ80vmnIhkOZxELvsPtbdBCbdQFgU8a3Ks1kyS8n5F1noP',
                'settings' => '{"locale":"en"}',
                'created_at' => '2018-08-12 14:28:45',
                'updated_at' => '2018-08-12 15:16:22',
            ),
        ));
        
        
    }
}