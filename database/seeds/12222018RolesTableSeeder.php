<?php

use Illuminate\Database\Seeder;

class 12222018RolesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('roles')->delete();
        
        \DB::table('roles')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Normal User',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'investisdom',
                'display_name' => 'Administrateur',
                'created_at' => '2018-08-23 17:10:46',
                'updated_at' => '2018-08-23 17:10:46',
            ),
        ));
        
        
    }
}