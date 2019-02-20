<?php

use Illuminate\Database\Seeder;

class ContactsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('contacts')->delete();
        
        \DB::table('contacts')->insert(array (
            0 => 
            array (
                'id' => 1,
                'fistname' => 'John',
                'lastname' => 'Doe14',
                'address_1' => 'rue coco',
                'address_2' => NULL,
                'postal_code' => 97400,
                'city' => 'st denis',
                'born_on' => '1978-07-20 08:37:00',
                'born_in' => 'st pierre',
                'born_in_postal' => '97410',
                'created_at' => '2018-10-12 04:41:18',
                'updated_at' => '2018-10-12 04:41:18',
                'civilite' => NULL,
                'function' => NULL,
                'tel_fixe' => NULL,
                'gsm' => NULL,
                'fax' => NULL,
                'email' => "john.doe14@email.com",
                'user_id' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'fistname' => 'RIVARD',
                'lastname' => 'Johan',
                'address_1' => '1 Rue didier',
                'address_2' => NULL,
                'postal_code' => 94200,
                'city' => 'LA VARENNE SAINT HILAIRE',
                'born_on' => '2018-10-12 00:00:00',
                'born_in' => 'PARIS',
                'born_in_postal' => '75000',
                'created_at' => '2018-10-12 12:39:23',
                'updated_at' => '2018-10-12 12:39:23',
                'civilite' => NULL,
                'function' => NULL,
                'tel_fixe' => NULL,
                'gsm' => NULL,
                'fax' => NULL,
                'email' => "rivard.johan@email.com",
                'user_id' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'fistname' => 'CLAIN',
                'lastname' => 'SAMUEL',
                'address_1' => '11 BVD DU CHAUDRON',
                'address_2' => NULL,
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'born_on' => '2018-10-01 06:59:00',
                'born_in' => 'ST DENIS',
                'born_in_postal' => '97450',
                'created_at' => '2018-10-17 02:59:26',
                'updated_at' => '2018-10-17 02:59:26',
                'civilite' => NULL,
                'function' => NULL,
                'tel_fixe' => NULL,
                'gsm' => NULL,
                'fax' => NULL,
                'email' => "clain.samuel@email.com",
                'user_id' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'fistname' => 'MORISCOT',
                'lastname' => 'Guillaume',
                'address_1' => '48 RN1 RDM',
                'address_2' => NULL,
                'postal_code' => 97412,
                'city' => 'BRAS-PANON',
                'born_on' => '1993-02-09 07:20:00',
                'born_in' => 'SAINT DENIS',
                'born_in_postal' => '97400',
                'created_at' => '2018-10-18 03:20:43',
                'updated_at' => '2018-10-18 03:20:43',
                'civilite' => NULL,
                'function' => NULL,
                'tel_fixe' => NULL,
                'gsm' => NULL,
                'fax' => NULL,
                'email' => "m.guillaume@email.com",
                'user_id' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'fistname' => 'ABYLON',
                'lastname' => 'Francis',
                'address_1' => '22 rue du marteau',
                'address_2' => NULL,
                'postal_code' => 97460,
                'city' => 'SAINT PAUL',
                'born_on' => '1973-07-25 07:33:00',
                'born_in' => 'SAINT DENIS',
                'born_in_postal' => '97400',
                'created_at' => '2018-10-18 03:33:57',
                'updated_at' => '2018-10-18 03:33:57',
                'civilite' => NULL,
                'function' => NULL,
                'tel_fixe' => NULL,
                'gsm' => NULL,
                'fax' => NULL,
                'email' => "you.know.what@email.com",
                'user_id' => NULL,
            )
        ));

        
        
    }
}