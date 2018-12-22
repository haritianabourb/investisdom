<?php

use Illuminate\Database\Seeder;

class 12222018MenusTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('menus')->delete();
        
        \DB::table('menus')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
        ));
        
        
    }
}