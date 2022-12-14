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

            array (
                'id' => 1,
                'nom' => 'Confort',
                'description' => 'Formule confort, aucune option en plus',
                'created_at' => '2018-09-19 17:31:00',
                'updated_at' => '2019-01-16 18:28:14',
                'slug' => 'confort',
            ),

            array (
                'id' => 2,
                'nom' => 'Confort  Echelonné',
                'description' => 'Formule Confort, avec prelevement',
                'created_at' => '2019-01-14 00:48:00',
                'updated_at' => '2019-01-16 18:27:39',
                'slug' => 'confort-echelonne',
            ),
            array (
                'id' => 3,
                'nom' => 'Serenité',
                'description' => 'Formule confort + assistance juridique offerte et meilleur prestation sur risque',
                'created_at' => '2018-09-19 17:31:00',
                'updated_at' => '2019-01-16 18:27:58',
                'slug' => 'serenite',
            ),

            array (
                'id' => 4,
                'nom' => 'Serenité Echelonné',
                'description' => 'Formule Serenité, avec prelevement',
                'created_at' => '2019-01-14 00:48:00',
                'updated_at' => '2019-01-16 18:27:20',
                'slug' => 'serenite-echelonne',
            ),
            array (
                'id' => 5,
                'nom' => 'Confort  Différé',
                'description' => 'Formule Confort, avec prelevement différé',
                'created_at' => '2019-01-14 00:48:00',
                'updated_at' => '2019-01-16 18:27:39',
                'slug' => 'confort-differe',
            ),
            array (
                'id' => 6,
                'nom' => 'Serenité Différé',
                'description' => 'Formule Serenité, avec prelevement',
                'created_at' => '2019-01-14 00:48:00',
                'updated_at' => '2019-01-16 18:27:20',
                'slug' => 'serenite-differe',
            ),

        ));


    }
}