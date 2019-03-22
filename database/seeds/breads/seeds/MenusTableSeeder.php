<?php

use Illuminate\Database\Seeder;

class MenusTableSeeder extends Seeder
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
            
            array (
                'id' => 1,
                'name' => 'admin',
                'created_at' => '2018-08-12 14:26:04',
                'updated_at' => '2018-08-12 14:26:04',
            ),
            
            array (
                'id' => 2,
                'name' => 'user',
                'created_at' => '2019-02-19 10:13:33',
                'updated_at' => '2019-02-19 10:13:33',
            ),
        ));
        
        
    }
}