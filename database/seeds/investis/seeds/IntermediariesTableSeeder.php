<?php

use Illuminate\Database\Seeder;

class IntermediariesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('intermediaries')->delete();
        
    }
}