<?php

use Illuminate\Database\Seeder;

class LeaseholdersTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('leaseholders')->delete();
        
        
    }
}