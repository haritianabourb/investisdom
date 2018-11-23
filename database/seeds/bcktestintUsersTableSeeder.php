<?php

use Illuminate\Database\Seeder;

class bcktestintUsersTableSeeder extends Seeder
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
                'id' => 1,
                'role_id' => 1,
                'name' => 'support',
                'email' => 'support@bourbon-digital.com',
                'avatar' => 'users/August2018/KWQkYP2SxIktP9OUcmUk.jpeg',
                'password' => '$2y$10$osF.tWlhnq3xTCiQCVFmpu314vdxwH6A7Tsqhl19MPAowVn0YRzOK',
                'remember_token' => 'eaB9CN1DQL53ltS97S8RAlZn2Xy8ZhysDIGCeLph2p1I7xHwT1dOQejlPNhS',
                'settings' => '{"locale":"en"}',
                'created_at' => '2018-08-12 14:28:45',
                'updated_at' => '2018-08-12 15:16:22',
            ),
            1 => 
            array (
                'id' => 3,
                'role_id' => 3,
                'name' => 'Administrateur',
                'email' => 'c.monel@investis-dom.com',
                'avatar' => 'users/August2018/I9E3dxrV7J5OEUAzqFK2.png',
                'password' => '$2y$10$kQTnOvxsdVaq4KeB6u6vquorkMEwv8yJlelP8gQu4YwZxwOL6I50m',
                'remember_token' => '5FTkzPwiJMcMpcRKJ8zICwrmjr95pYhM6ifokc0nBUD7dLGfPLN9NeLLZC2l',
                'settings' => '{"locale":"fr"}',
                'created_at' => '2018-08-23 17:14:58',
                'updated_at' => '2018-08-23 17:14:58',
            ),
            2 => 
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
            3 => 
            array (
                'id' => 2,
                'role_id' => 1,
                'name' => 'djefoo',
                'email' => 'info@bourbon-digital.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$sbKtEZMULhIcgWkkX31Wq.5pALBZtmj0AarTz3RMRXwhAgsNWIoo2',
                'remember_token' => 'N3yld79eDt9Tx4ghhhGreF3GXgLCqNIvV8OK2VbiFy9RNCxKSx2rWt1TDWvs',
                'settings' => NULL,
                'created_at' => '2018-08-13 13:25:50',
                'updated_at' => '2018-08-13 13:25:50',
            ),
        ));
        
        
    }
}