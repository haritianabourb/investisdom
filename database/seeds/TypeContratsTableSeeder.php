<?php

use Illuminate\Database\Seeder;

class TypeContratsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('type_contrats')->delete();
        
        \DB::table('type_contrats')->insert(array (
            0 => 
            array (
                'id' => 1,
                'nom' => 'Confort',
                'slug' => 'confort',
                'description' => 'Formule confort, aucune option en plus',
                'created_at' => '2018-09-19 17:31:43',
                'updated_at' => '2018-09-19 17:31:43',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Serenité',
                'slug' => 'serenite',
                'description' => 'Formule confort + assistance juridique offerte et meilleur prestation sur risque',
                'created_at' => '2018-09-19 17:31:55',
                'updated_at' => '2018-09-19 17:31:55',
            ),
            2 => 
            array (
                'id' => 3,
                'nom' => 'Serenité Echelonné',
                'slug' => "serenite-echelonne",
                'description' => 'Formule Serenité, avec prelevement',
                'created_at' => '2019-01-14 00:48:01',
                'updated_at' => '2019-01-14 00:48:01',
            ),
            3 => 
            array (
                'id' => 4,
                'nom' => 'Confort  Echelonné',
                'slug' => 'confort-echelonne',
                'description' => 'Formule Confort, avec prelevement',
                'created_at' => '2019-01-14 00:48:25',
                'updated_at' => '2019-01-14 00:48:25',
            ),
        ));
        
        
    }
}