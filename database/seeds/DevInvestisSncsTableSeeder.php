<?php

use Illuminate\Database\Seeder;

class DevInvestisSncsTableSeeder extends Seeder
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
                'id' => 11,
                'name' => '23 2',
                'registered_key' => NULL,
                'address_1' => NULL,
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => NULL,
                'started_at' => NULL,
                'created_at' => '2018-10-31 14:06:46',
                'updated_at' => '2018-10-31 14:06:46',
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
            1 => 
            array (
                'id' => 12,
                'name' => '23 12',
                'registered_key' => NULL,
                'address_1' => NULL,
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => NULL,
                'started_at' => NULL,
                'created_at' => '2018-10-31 14:06:46',
                'updated_at' => '2018-10-31 14:06:46',
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
            2 => 
            array (
                'id' => 13,
                'name' => 'Marvic3',
                'registered_key' => NULL,
                'address_1' => '33 rue de la colline Camélia',
                'address_2' => NULL,
                'postal_code' => 97400,
                'city' => 'Saint-Denis - 97400',
                'started_at' => NULL,
                'created_at' => '2018-10-31 14:16:39',
                'updated_at' => '2018-10-31 14:16:39',
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
                'gerant_id' => '1',
                'associe_first' => '1',
                'associe_second' => '1',
                'part_asso_first' => '70',
                'part_asso_second' => '30',
                'nbre_part_total' => '5000',
                'capital' => '100000',
                'forme_juridique' => 'EI',
                'versement_capital' => '5000',
                'date_crea' => '2018-10-10',
                'type_snc' => '01',
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
            3 => 
            array (
                'id' => 1,
                'name' => 'MARVIC 126',
                'registered_key' => '12444566',
                'address_1' => '62 BVD DU CHAUDRON',
                'address_2' => 'Centre d\'affaires CADJEE',
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'started_at' => '2018-09-26 14:16:00',
                'created_at' => '2018-09-26 10:16:49',
                'updated_at' => '2018-11-02 06:50:18',
                'type_entities_id' => 2,
                'registration_entities_id' => NULL,
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
                'status' => 'ACTIVE',
                'nic' => '52521',
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
            4 => 
            array (
                'id' => 14,
                'name' => 'MARVIC 127',
                'registered_key' => '843479999',
                'address_1' => '62 Boulevard du Chaudron',
                'address_2' => NULL,
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'started_at' => NULL,
                'created_at' => '2018-10-31 15:44:50',
                'updated_at' => '2018-11-02 16:56:18',
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
                'gerant_id' => '2',
                'associe_first' => '13',
                'associe_second' => '4',
                'part_asso_first' => '900',
                'part_asso_second' => '100',
                'nbre_part_total' => '1000',
                'capital' => '100',
                'forme_juridique' => 'EI',
                'versement_capital' => NULL,
                'date_crea' => '2018-10-03',
                'type_snc' => '01',
                'status' => 'ACTIVE',
                'nic' => '00016',
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
            5 => 
            array (
                'id' => 15,
                'name' => 'BOURBON',
                'registered_key' => NULL,
                'address_1' => 'VILLA 18 NAUTICLUB',
                'address_2' => NULL,
                'postal_code' => 97434,
                'city' => 'SAINT GILLES LES BAINS',
                'started_at' => NULL,
                'created_at' => '2018-11-06 03:25:02',
                'updated_at' => '2018-11-06 03:25:02',
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
                'gerant_id' => '14',
                'associe_first' => '14',
                'associe_second' => '13',
                'part_asso_first' => '990',
                'part_asso_second' => '10',
                'nbre_part_total' => '1000',
                'capital' => '100',
                'forme_juridique' => 'EI',
                'versement_capital' => '100',
                'date_crea' => '2018-11-06',
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
            6 => 
            array (
                'id' => 16,
                'name' => 'MARVIC 16',
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
            7 => 
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