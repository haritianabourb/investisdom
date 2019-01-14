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
        
        \DB::table('leaseholders')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'KAR NORD',
                'registered_key' => '12344234234',
                'address_1' => '11 BVD DU CHAUDRON',
                'address_2' => NULL,
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'started_at' => '2018-08-27 13:38:00',
                'created_at' => '2018-09-26 09:39:08',
                'updated_at' => '2018-09-26 10:36:52',
                'capital' => '1333',
                'registration_city' => 'SAINTE CLOTILDE',
                'type_immatriculation' => NULL,
                'forme_juridique' => NULL,
                'activity' => NULL,
                'depend_groupeco' => NULL,
                'type_operation' => NULL,
                'regime_impot' => NULL,
                'site_web' => NULL,
                'contact_id' => NULL,
                'name_bank' => NULL,
                'agence_bank' => NULL,
                'iban_bank' => NULL,
                'bic_bank' => NULL,
                'numero_compte' => NULL,
                'insee_upload' => NULL,
                'kbis_upload' => NULL,
                'attest_regul_soc_upload' => NULL,
                'regul_soc_ant_upload' => NULL,
                'attest_regul_fisc_upload' => NULL,
                'regul_fisc_ant_upload' => NULL,
                'depot_greffe_bilan_upload' => NULL,
                'depot_greffe_ant_upload' => NULL,
                'liasse_fisc_upload' => NULL,
                'liasse_fisc_ant_upload' => NULL,
                'avis_impot_upload' => NULL,
                'avis_impot_ant_upload' => NULL,
                'statut_ent_upload' => NULL,
                'cni_upload' => NULL,
                'rib_upload' => NULL,
                'extrait_compte_upload' => NULL,
                'decouvert_autorise_upload' => NULL,
                'aut_admin_exercer_upload' => NULL,
                'situation_patrimonial_dir_upload' => NULL,
                'permis_conduire_upload' => NULL,
                'assurance_resp_civile_upload' => NULL,
                'documents_divers_upload' => NULL,
                'vp_upload' => NULL,
                'exo_tva' => NULL,
                'key_ape' => NULL,
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'TICOCO',
                'registered_key' => '1234455666',
                'address_1' => '62 BVD DU CHAUDRON',
                'address_2' => 'Centre d\'affaires CADJEE',
                'postal_code' => 97490,
                'city' => 'SAINTE CLOTILDE',
                'started_at' => '2018-08-28 09:57:00',
                'created_at' => '2018-09-27 05:57:59',
                'updated_at' => '2018-12-27 13:22:28',
                'capital' => '1222',
                'registration_city' => 'SAINTE CLOTILDE',
                'type_immatriculation' => 'CMA',
                'forme_juridique' => 'EI',
                'activity' => NULL,
                'depend_groupeco' => '1',
                'type_operation' => '01',
                'regime_impot' => 'IR',
                'site_web' => NULL,
                'contact_id' => '1',
                'name_bank' => NULL,
                'agence_bank' => NULL,
                'iban_bank' => NULL,
                'bic_bank' => NULL,
                'numero_compte' => NULL,
                'insee_upload' => NULL,
                'kbis_upload' => NULL,
                'attest_regul_soc_upload' => NULL,
                'regul_soc_ant_upload' => NULL,
                'attest_regul_fisc_upload' => NULL,
                'regul_fisc_ant_upload' => NULL,
                'depot_greffe_bilan_upload' => NULL,
                'depot_greffe_ant_upload' => NULL,
                'liasse_fisc_upload' => NULL,
                'liasse_fisc_ant_upload' => NULL,
                'avis_impot_upload' => NULL,
                'avis_impot_ant_upload' => NULL,
                'statut_ent_upload' => NULL,
                'cni_upload' => NULL,
                'rib_upload' => NULL,
                'extrait_compte_upload' => NULL,
                'decouvert_autorise_upload' => NULL,
                'aut_admin_exercer_upload' => NULL,
                'situation_patrimonial_dir_upload' => NULL,
                'permis_conduire_upload' => NULL,
                'assurance_resp_civile_upload' => NULL,
                'documents_divers_upload' => NULL,
                'vp_upload' => NULL,
                'exo_tva' => false,
                'key_ape' => '01.11',
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
        ));
        
        
    }
}