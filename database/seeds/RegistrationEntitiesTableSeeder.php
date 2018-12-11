<?php

use Illuminate\Database\Seeder;

class RegistrationEntitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('registration_entities')->delete();
        
        \DB::table('registration_entities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'CMA',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:05',
                'updated_at' => '2018-09-19 17:29:05',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'RC',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:05',
                'updated_at' => '2018-09-19 17:29:05',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'Exploitant Agricole',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:05',
                'updated_at' => '2018-09-19 17:29:05',
            ),
        ));
        
        
    }
}