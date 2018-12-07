<?php

use Illuminate\Database\Seeder;

class 12072018TypeEntitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_entities')->delete();
        
        \DB::table('type_entities')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Investis Dom',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'SNC',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'CGP',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'Investisseur',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'Apporteur Affaire',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            5 => 
            array (
                'id' => 6,
                'name' => 'Fournisseur',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            6 => 
            array (
                'id' => 7,
                'name' => 'Locataire',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
            7 => 
            array (
                'id' => 8,
                'name' => 'Banque',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:04',
                'updated_at' => '2018-09-19 17:29:04',
            ),
        ));
        
        
    }
}