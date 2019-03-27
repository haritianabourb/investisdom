<?php

use Illuminate\Database\Seeder;

class NatureEntitiesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {


        \DB::table('nature_entities')->delete();

        \DB::table('nature_entities')->insert(array (

            array (
                'id' => 1,
                'name' => 'Individuel',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:05',
                'updated_at' => '2018-09-19 17:29:05',
            ),

            array (
                'id' => 2,
                'name' => 'Société',
                'description' => NULL,
                'created_at' => '2018-09-19 17:29:05',
                'updated_at' => '2018-09-19 17:29:05',
            ),
        ));


    }
}