<?php

use Illuminate\Database\Seeder;

class RolesTableSeeder extends Seeder
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

            array (
                'id' => 1,
                'name' => 'admin',
                'display_name' => 'Administrator',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),

            array (
                'id' => 2,
                'name' => 'user',
                'display_name' => 'Normal User',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),

            array (
                'id' => 3,
                'name' => 'investisdom',
                'display_name' => 'Administrateur',
                'created_at' => '2018-08-23 17:10:46',
                'updated_at' => '2018-08-23 17:10:46',
            ),

            array (
                'id' => 5,
                'name' => 'investors',
                'display_name' => 'Investisseur',
                'created_at' => '2019-01-05 06:22:09',
                'updated_at' => '2019-01-05 06:22:09',
            ),

            array (
                'id' => 4,
                'name' => 'cgp',
                'display_name' => 'Conseiller en gestion de patrimoine',
                'created_at' => '2019-01-05 06:20:55',
                'updated_at' => '2019-01-05 06:22:26',
            ),
        ));


    }
}