<?php

use Illuminate\Database\Seeder;

class TranslationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('translations')->delete();
        
        \DB::table('translations')->insert(array (
            0 => 
            array (
                'id' => 1,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 22,
                'locale' => 'en',
                'value' => 'Proposition de Financement',
                'created_at' => '2018-12-24 11:22:41',
                'updated_at' => '2018-12-24 11:22:41',
            ),
            1 => 
            array (
                'id' => 2,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 22,
                'locale' => 'en',
                'value' => 'Propositions de Financement',
                'created_at' => '2018-12-24 11:22:41',
                'updated_at' => '2018-12-24 11:22:41',
            ),
            2 => 
            array (
                'id' => 3,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 6,
                'locale' => 'en',
                'value' => 'Banque',
                'created_at' => '2018-12-27 06:30:38',
                'updated_at' => '2018-12-27 06:30:38',
            ),
            3 => 
            array (
                'id' => 4,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 6,
                'locale' => 'en',
                'value' => 'Banques',
                'created_at' => '2018-12-27 06:30:38',
                'updated_at' => '2018-12-27 06:30:38',
            ),
            4 => 
            array (
                'id' => 5,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 12,
                'locale' => 'en',
                'value' => 'Investisseur',
                'created_at' => '2019-01-05 06:26:22',
                'updated_at' => '2019-01-05 06:26:22',
            ),
            5 => 
            array (
                'id' => 6,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 12,
                'locale' => 'en',
                'value' => 'Investisseurs',
                'created_at' => '2019-01-05 06:26:22',
                'updated_at' => '2019-01-05 06:26:22',
            ),
            6 => 
            array (
                'id' => 7,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 17,
                'locale' => 'en',
                'value' => 'Réservation',
                'created_at' => '2019-01-10 04:35:38',
                'updated_at' => '2019-01-10 04:35:38',
            ),
            7 => 
            array (
                'id' => 8,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 17,
                'locale' => 'en',
                'value' => 'Réservations',
                'created_at' => '2019-01-10 04:35:38',
                'updated_at' => '2019-01-10 04:35:38',
            ),
            8 => 
            array (
                'id' => 9,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 13,
                'locale' => 'en',
                'value' => 'Locataire',
                'created_at' => '2019-01-13 18:00:18',
                'updated_at' => '2019-01-13 18:00:18',
            ),
            9 => 
            array (
                'id' => 10,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 13,
                'locale' => 'en',
                'value' => 'Locataires',
                'created_at' => '2019-01-13 18:00:18',
                'updated_at' => '2019-01-13 18:00:18',
            ),
            10 => 
            array (
                'id' => 11,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 7,
                'locale' => 'en',
                'value' => 'CGP',
                'created_at' => '2019-01-13 18:02:05',
                'updated_at' => '2019-01-13 18:02:05',
            ),
            11 => 
            array (
                'id' => 12,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 7,
                'locale' => 'en',
                'value' => 'CGP',
                'created_at' => '2019-01-13 18:02:05',
                'updated_at' => '2019-01-13 18:02:05',
            ),
        ));
        
        
    }
}