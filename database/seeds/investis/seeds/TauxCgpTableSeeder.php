<?php

use Illuminate\Database\Seeder;

class TauxCgpTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {

        \DB::table('taux_cgp')->delete();

    }
}