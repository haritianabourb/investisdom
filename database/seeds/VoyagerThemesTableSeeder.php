<?php

use Illuminate\Database\Seeder;

class VoyagerThemesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('voyager_themes')->delete();
        
        \DB::table('voyager_themes')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Now UI',
                'folder' => 'now-ui',
                'active' => 1,
                'version' => '0.1',
                'created_at' => '2019-01-14 02:21:13',
                'updated_at' => '2019-01-14 02:21:18',
            ),
        ));
        
        
    }
}