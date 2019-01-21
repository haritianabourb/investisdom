<?php

use Illuminate\Database\Seeder;

class SncsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('sncs')->delete();
        
        \DB::table('sncs')->insert(array (
            0 => 
            array (
                'id' => 17,
                'name' => 'MARVIC 17',
                'registered_key' => NULL,
                'address_1' => NULL,
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => NULL,
                'started_at' => NULL,
                'created_at' => '2018-11-06 04:57:37',
                'updated_at' => '2018-11-06 04:57:37',
                'type_entities_id' => 2,
                'registration_entities_id' => 1,
                'total_invest' => '0',
                'tax_rate' => '0',
                'total_amount_ri' => '0',
                'total_net_intake' => '0',
                'total_hono' => '0',
                'total_comm_cgp' => '0',
                'total_comm_app' => '0',
                'total_get' => '0',
                'investors_tax_reservation' => '0',
                'investors_tax_proposition' => '0',
                'gerant_id' => NULL,
                'associe_first' => NULL,
                'associe_second' => NULL,
                'part_asso_first' => NULL,
                'part_asso_second' => NULL,
                'nbre_part_total' => NULL,
                'capital' => NULL,
                'forme_juridique' => NULL,
                'versement_capital' => NULL,
                'date_crea' => NULL,
                'type_snc' => NULL,
                'status' => 'IN_STOCK',
                'nic' => NULL,
                'statuts' => NULL,
                'agrement' => NULL,
                'attest_domiciliation' => NULL,
                'kbis' => NULL,
                'rib' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
        ));
        
        
    }
}