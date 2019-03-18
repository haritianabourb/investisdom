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

            array (
                'id' => 13,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 19,
                'locale' => 'en',
                'value' => 'Taux Cgp',
                'created_at' => '2019-01-14 07:23:49',
                'updated_at' => '2019-01-14 07:23:49',
            ),

            array (
                'id' => 14,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 19,
                'locale' => 'en',
                'value' => 'Taux Cgps',
                'created_at' => '2019-01-14 07:23:49',
                'updated_at' => '2019-01-14 07:23:49',
            ),

            array (
                'id' => 15,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 20,
                'locale' => 'en',
                'value' => 'Type Contrat',
                'created_at' => '2019-01-16 18:26:52',
                'updated_at' => '2019-01-16 18:26:52',
            ),

            array (
                'id' => 16,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 20,
                'locale' => 'en',
                'value' => 'Type Contrats',
                'created_at' => '2019-01-16 18:26:52',
                'updated_at' => '2019-01-16 18:26:52',
            ),

            array (
                'id' => 17,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 4,
                'locale' => 'en',
                'value' => 'Contact',
                'created_at' => '2019-02-19 07:21:44',
                'updated_at' => '2019-02-19 07:21:44',
            ),

            array (
                'id' => 18,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 4,
                'locale' => 'en',
                'value' => 'Contacts',
                'created_at' => '2019-02-19 07:21:44',
                'updated_at' => '2019-02-19 07:21:44',
            ),

            array (
                'id' => 19,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 40,
                'locale' => 'en',
                'value' => 'Dashboard',
                'created_at' => '2019-02-19 10:20:50',
                'updated_at' => '2019-02-19 10:28:16',
            ),

            array (
                'id' => 20,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 41,
                'locale' => 'en',
                'value' => 'Réservations',
                'created_at' => '2019-02-19 10:21:25',
                'updated_at' => '2019-02-19 10:28:36',
            ),

            array (
                'id' => 22,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 43,
                'locale' => 'en',
                'value' => 'Investisseurs',
                'created_at' => '2019-02-19 10:27:28',
                'updated_at' => '2019-02-19 10:28:56',
            ),

            array (
                'id' => 23,
                'table_name' => 'data_types',
                'column_name' => 'display_name_singular',
                'foreign_key' => 1,
                'locale' => 'en',
                'value' => 'User',
                'created_at' => '2019-02-26 06:27:42',
                'updated_at' => '2019-02-26 06:27:42',
            ),

            array (
                'id' => 24,
                'table_name' => 'data_types',
                'column_name' => 'display_name_plural',
                'foreign_key' => 1,
                'locale' => 'en',
                'value' => 'Users',
                'created_at' => '2019-02-26 06:27:42',
                'updated_at' => '2019-02-26 06:27:42',
            ),

            array (
                'id' => 25,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 44,
                'locale' => 'en',
                'value' => '',
                'created_at' => '2019-03-04 11:27:55',
                'updated_at' => '2019-03-04 11:27:55',
            ),

            array (
                'id' => 26,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 45,
                'locale' => 'en',
                'value' => '',
                'created_at' => '2019-03-12 11:49:37',
                'updated_at' => '2019-03-12 11:49:37',
            ),

            array (
                'id' => 27,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 46,
                'locale' => 'en',
                'value' => '',
                'created_at' => '2019-03-12 11:51:55',
                'updated_at' => '2019-03-12 11:51:55',
            ),

            array (
                'id' => 28,
                'table_name' => 'menu_items',
                'column_name' => 'title',
                'foreign_key' => 47,
                'locale' => 'en',
                'value' => '',
                'created_at' => '2019-03-14 18:04:23',
                'updated_at' => '2019-03-14 18:04:23',
            ),
        ));


    }
}