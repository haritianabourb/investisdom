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
                'description' => 'Formule confort, aucune option en plus',
                'created_at' => '2018-09-19 17:31:43',
                'updated_at' => '2018-09-19 17:31:43',
            ),
            1 => 
            array (
                'id' => 2,
                'nom' => 'Serenité',
                'description' => 'Formule confort + assistance juridique offerte et meilleur prestation sur risque',
                'created_at' => '2018-09-19 17:31:55',
                'updated_at' => '2018-09-19 17:31:55',
            ),
        ));
        
        
    }
}