<?php

use Illuminate\Database\Seeder;

class InvestorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('investors')->delete();
        
    }
}