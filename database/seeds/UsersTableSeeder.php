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
                'name' => 'DURAND MARC',
                'email' => 'rivard.johan@email.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$VjDInBl7SlJ08ltaetJjdeKG3uJ44oX2kjjPmzPLEDmGU0vR9OIzq',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2019-03-14 05:22:33',
                'updated_at' => '2019-03-14 05:22:36',
            ),
            4 => 
            array (
                'id' => 1,
                'role_id' => 1,
                'name' => 'support',
                'email' => 'support@bourbon-digital.com',
                'avatar' => 'users/August2018/KWQkYP2SxIktP9OUcmUk.jpeg',
                'password' => '$2y$10$X9M..b2stIB0Xabmtbr5s.vQMEx0Ks58ypam1B9XH27Pwzx2rSbya',
                'remember_token' => 'phATRzivlguhGRjtu2ra5QjnNPry8fvtj6DiEgcFvID0DSYz8RBdlrNXAEZT',
                'settings' => '{"locale":"fr"}',
                'created_at' => '2018-08-12 14:28:45',
                'updated_at' => '2019-03-14 05:38:33',
            ),
            5 => 
            array (
                'id' => 6,
                'role_id' => 4,
                'name' => 'ASSIST MéLODIE',
                'email' => 'assist-melodir@test.email',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$Iqb3/LEdM.rBfsmjjr3hm.GluKoXs0AiCW2WyH0trQLKbWjMvEH/y',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2019-03-14 06:28:26',
                'updated_at' => '2019-03-14 06:59:42',
            ),
            6 => 
            array (
                'id' => 8,
                'role_id' => 4,
                'name' => 'Test MODAL ON CGP',
                'email' => 'support@test.email',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$kU4.lSxcFOvd9Tu0M9PwxOe1gXk/47rWtI70xOqtvolkvGoNpToQu',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2019-03-14 09:19:08',
                'updated_at' => '2019-03-14 09:19:12',
            ),
            7 => 
            array (
                'id' => 9,
                'role_id' => 4,
                'name' => 'Consseily ALY',
                'email' => 'conseil.aly@email.com',
                'avatar' => 'users/default.png',
                'password' => '$2y$10$Pyw0s6JWnoPGfadVKBiwIuqQvXsedkenhgX58/UujTOflwTJnxuny',
                'remember_token' => NULL,
                'settings' => NULL,
                'created_at' => '2019-03-14 09:20:41',
                'updated_at' => '2019-03-14 09:20:44',
            ),
        ));
        
        
    }
}