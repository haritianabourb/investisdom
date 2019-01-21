<?php

use Illuminate\Database\Seeder;

class BanksTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('banks')->delete();
        
        \DB::table('banks')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'asasas',
                'capital' => NULL,
                'address_1' => 'sasasa',
                'address_2' => 'sasas',
                'postal_code' => 97400,
                'city' => 'sasasas',
                'registration_entities_id' => NULL,
                'registered_key' => 'sasasas',
                'registration_city' => NULL,
                'registered_at' => NULL,
                'entities_id' => NULL,
                'default' => NULL,
                'represantant_id' => NULL,
                'contacts_id' => NULL,
                'created_at' => '2018-12-31 06:35:16',
                'updated_at' => '2018-12-31 06:35:16',
            ),
        ));
        
        
    }
}