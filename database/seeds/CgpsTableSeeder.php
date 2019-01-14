<?php

use Illuminate\Database\Seeder;

class CgpsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('cgps')->delete();
        
        \DB::table('cgps')->insert(array (
            0 => 
            array (
                'id' => 5,
                'name' => 'AEG FI',
                'registered_key' => '123456789',
                'address_1' => 'ZONE INDUSTRIELLE DE BEL AIR',
                'address_2' => NULL,
                'postal_code' => 97450,
                'city' => 'SAINT LOUIS',
                'started_at' => '2018-10-08 00:00:00',
                'created_at' => '2018-10-12 05:45:30',
                'updated_at' => '2018-10-12 05:45:30',
                'capital' => '1000',
                'registration_city' => 'SAINT LOUIS',
                'ape_key' => NULL,
                'etablishment_code' => NULL,
                'contact_id' => 3,
                'juridical_registration' => 'SAS',
                'activity' => 'CGP',
                'identifiant' => NULL,
                'contact_status' => 'Gérant',
                'convention' => NULL,
                'status' => NULL,
                'kbis' => NULL,
                'rib' => NULL,
                'cni' => NULL,
                'type_registration' => NULL,
                'assurances' => NULL,
                'assurances_anterieures' => NULL,
                'remuneration' => NULL,
                'remu_fixe' => NULL,
                'network' => NULL,
                'network_yes' => NULL,
            ),
            1 => 
            array (
                'id' => 4,
                'name' => 'OPES PATRIMOINE',
                'registered_key' => '234345246',
                'address_1' => '1 rue Didier',
                'address_2' => NULL,
                'postal_code' => 94200,
                'city' => 'LA VARENNE SAINT HILAIRE',
                'started_at' => '2018-09-10 14:05:00',
                'created_at' => '2018-09-26 10:06:24',
                'updated_at' => '2018-10-12 12:44:37',
                'capital' => '30000',
                'registration_city' => 'NANTERRE',
                'ape_key' => NULL,
                'etablishment_code' => NULL,
                'contact_id' => 1,
                'juridical_registration' => 'SARL',
                'activity' => 'CGP',
                'identifiant' => NULL,
                'contact_status' => 'Gérant',
                'convention' => NULL,
                'status' => NULL,
                'kbis' => NULL,
                'rib' => NULL,
                'cni' => NULL,
                'type_registration' => 'EI',
                'assurances' => NULL,
                'assurances_anterieures' => NULL,
                'remuneration' => NULL,
                'remu_fixe' => NULL,
                'network' => NULL,
                'network_yes' => NULL,
            ),
            2 => 
            array (
                'id' => 6,
                'name' => 'VYP PATRIMOINE',
                'registered_key' => '123123123',
                'address_1' => '1 RUE DU LION',
                'address_2' => NULL,
                'postal_code' => 69000,
                'city' => 'LYON',
                'started_at' => '2018-10-01 07:08:00',
                'created_at' => '2018-10-21 03:10:05',
                'updated_at' => '2018-10-21 03:10:05',
                'capital' => '1222',
                'registration_city' => 'LYON',
                'ape_key' => NULL,
                'etablishment_code' => NULL,
                'contact_id' => 1,
                'juridical_registration' => 'SARL',
                'activity' => 'CGP',
                'identifiant' => NULL,
                'contact_status' => 'Gérant',
                'convention' => NULL,
                'status' => NULL,
                'kbis' => NULL,
                'rib' => NULL,
                'cni' => NULL,
                'type_registration' => 'RCS',
                'assurances' => NULL,
                'assurances_anterieures' => NULL,
                'remuneration' => NULL,
                'remu_fixe' => NULL,
                'network' => NULL,
                'network_yes' => NULL,
            ),
        ));
        
        
    }
}