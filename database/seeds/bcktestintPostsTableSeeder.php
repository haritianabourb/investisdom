<?php

use Illuminate\Database\Seeder;

class bcktestintPostsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('posts')->delete();
        
        
        
    }
}