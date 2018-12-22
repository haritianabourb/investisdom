<?php

use Illuminate\Database\Seeder;

class 12222018LeaseholdersTableSeeder extends Seeder
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
                'updated_at' => '2018-09-27 05:57:59',
                'capital' => '1222',
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
            2 => 
            array (
                'id' => 3,
                'name' => 'test1',
                'registered_key' => '3215465484512',
                'address_1' => 'test',
                'address_2' => NULL,
                'postal_code' => 97400,
                'city' => 'saintdenis',
                'started_at' => '2018-10-03 20:13:00',
                'created_at' => '2018-10-16 16:19:23',
                'updated_at' => '2018-10-16 16:19:23',
                'capital' => '6000',
                'registration_city' => 'saintdenis',
                'type_immatriculation' => 'CMA',
                'forme_juridique' => 'EI',
                'activity' => '2013-02-03',
                'depend_groupeco' => '1',
                'type_operation' => '02',
                'regime_impot' => 'IR',
                'site_web' => 'https://www.test.com',
                'contact_id' => '4',
                'name_bank' => 'sg',
                'agence_bank' => 'stdenis',
                'iban_bank' => '216545462131524',
                'bic_bank' => '21324635412',
                'numero_compte' => '320321641120132064541',
                'insee_upload' => '[{"download_link":"leaseholders\\/October2018\\/lwJeHlixhjelmfIdzyS8.pdf","original_name":"SO027.pdf"}]',
            'kbis_upload' => '[{"download_link":"leaseholders\\/October2018\\/qUethfIWIQUW4x2iKHfp.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'attest_regul_soc_upload' => '[{"download_link":"leaseholders\\/October2018\\/DEZGdBIk7oSpnsHsSoZX.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'regul_soc_ant_upload' => '[{"download_link":"leaseholders\\/October2018\\/CJQCWHHjpDKQdNm8EpnG.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'attest_regul_fisc_upload' => '[{"download_link":"leaseholders\\/October2018\\/wieJqAwHilrwUNKA1eX0.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'regul_fisc_ant_upload' => '[{"download_link":"leaseholders\\/October2018\\/0wQXiAjgwhrVM5g8J8Cg.pdf","original_name":"cerfa_10198-09 (1).pdf"},{"download_link":"leaseholders\\/October2018\\/hebh0g3OCLKiS1SuZwZL.pdf","original_name":"default (5).pdf"}]',
            'depot_greffe_bilan_upload' => '[{"download_link":"leaseholders\\/October2018\\/f4zKPi58JEjrSx6q8e6O.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'depot_greffe_ant_upload' => '[{"download_link":"leaseholders\\/October2018\\/Kssk4hCwuKEElKuRfrUQ.pdf","original_name":"cerfa_10198-09 (1).pdf"},{"download_link":"leaseholders\\/October2018\\/xENa0xEXBrMprYuH2TXS.pdf","original_name":"default (5).pdf"}]',
            'liasse_fisc_upload' => '[{"download_link":"leaseholders\\/October2018\\/u9h1TWxKAXQAl6alndGO.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
                'liasse_fisc_ant_upload' => NULL,
            'avis_impot_upload' => '[{"download_link":"leaseholders\\/October2018\\/ZnahkDwJMGY2ppPoZzep.pdf","original_name":"cerfa_10198-09 (1).pdf"},{"download_link":"leaseholders\\/October2018\\/UH2aFqSIR9TMBrPQNxzp.pdf","original_name":"default (5).pdf"}]',
            'avis_impot_ant_upload' => '[{"download_link":"leaseholders\\/October2018\\/7JR8rf7CZQQCg3ELSacH.pdf","original_name":"cerfa_10198-09 (1).pdf"},{"download_link":"leaseholders\\/October2018\\/hmKjlid9P8D1BWK7Ve1J.pdf","original_name":"default (5).pdf"}]',
            'statut_ent_upload' => '[{"download_link":"leaseholders\\/October2018\\/93pRkJgapR4Vq3HVDMsb.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'cni_upload' => '[{"download_link":"leaseholders\\/October2018\\/QxoLqm8wipFR1B97h480.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'rib_upload' => '[{"download_link":"leaseholders\\/October2018\\/KjeXhSnonz3SvGXgNX7v.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'extrait_compte_upload' => '[{"download_link":"leaseholders\\/October2018\\/jovpy173VVqmTLU6uckB.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
            'decouvert_autorise_upload' => '[{"download_link":"leaseholders\\/October2018\\/Pir5BYyOWCH9xdY9RJlF.pdf","original_name":"cerfa_10198-09 (1).pdf"}]',
                'aut_admin_exercer_upload' => NULL,
                'situation_patrimonial_dir_upload' => NULL,
                'permis_conduire_upload' => NULL,
                'assurance_resp_civile_upload' => NULL,
                'documents_divers_upload' => NULL,
                'vp_upload' => NULL,
                'exo_tva' => true,
                'key_ape' => '01.11',
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'ENTREPRISE SC',
                'registered_key' => '123123123',
                'address_1' => '11 RUE DES CANOTS',
                'address_2' => NULL,
                'postal_code' => 97427,
                'city' => 'ETANG SALE',
                'started_at' => '2018-10-08 06:54:00',
                'created_at' => '2018-10-17 03:04:43',
                'updated_at' => '2018-10-17 03:06:29',
                'capital' => '1222',
                'registration_city' => 'SAINT PIERRE',
                'type_immatriculation' => 'CMA',
                'forme_juridique' => 'EI',
                'activity' => '2018-10-17',
                'depend_groupeco' => '0',
                'type_operation' => '01',
                'regime_impot' => 'IR',
                'site_web' => NULL,
                'contact_id' => '2',
                'name_bank' => 'BFC',
                'agence_bank' => 'ETANG SALE',
                'iban_bank' => 'FR76434578²75848957984589738475',
                'bic_bank' => 'ERHGRTHRTH',
                'numero_compte' => '66473993823436589',
                'insee_upload' => '[{"download_link":"leaseholders\\/October2018\\/PRw2VoNihpLGh4wGXMvW.pdf","original_name":"2069-rci-sd_2055.pdf"}]',
                'kbis_upload' => '[{"download_link":"leaseholders\\/October2018\\/ejnU9JBWGC4ZJ30uUry1.pdf","original_name":"181001 Simul PAUSE FUSO.pdf"}]',
            'attest_regul_soc_upload' => '[{"download_link":"leaseholders\\/October2018\\/OPfHpvjWZ3pnE1UROPkQ.pdf","original_name":"badge_participant (1).pdf"}]',
                'regul_soc_ant_upload' => '[{"download_link":"leaseholders\\/October2018\\/n94dBQ1rgYnjHmoLHcpd.pdf","original_name":"181010 Simul ARTS CAMION.pdf"}]',
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
                'key_ape' => '43.12A',
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => 'M DISTRIBUTION',
                'registered_key' => '123123123',
                'address_1' => '48 RN1',
                'address_2' => 'RDM',
                'postal_code' => 97412,
                'city' => 'BRAS PANON',
                'started_at' => '2018-10-01 07:18:00',
                'created_at' => '2018-10-18 03:22:07',
                'updated_at' => '2018-10-22 09:40:39',
                'capital' => '1000',
                'registration_city' => 'SAINT DENIS',
                'type_immatriculation' => 'RCS',
                'forme_juridique' => 'SARL',
                'activity' => '2018-09-17 00:00:00',
                'depend_groupeco' => '0',
                'type_operation' => '01',
                'regime_impot' => 'IS',
                'site_web' => NULL,
                'contact_id' => '1',
                'name_bank' => 'BFC',
                'agence_bank' => 'SAINT BENOIT',
                'iban_bank' => 'FR76453454534534',
                'bic_bank' => 'BFCORERXXXX',
                'numero_compte' => '4135454353461364',
                'insee_upload' => '[{"download_link":"leaseholders\\/October2018\\/J3fBZcvhaMUOyFvnJvyJ.pdf","original_name":"181001 Simul PAUSE VITO.pdf"}]',
            'kbis_upload' => '[{"download_link":"leaseholders\\/October2018\\/iptBvCbSuzzKPesGRYUl.pdf","original_name":"badge_participant (1).pdf"}]',
                'attest_regul_soc_upload' => '[{"download_link":"leaseholders\\/October2018\\/FjsEYyz3uSXaAWY0wcOB.pdf","original_name":"edf CM.pdf"}]',
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
                'key_ape' => '43.12A',
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
            5 => 
            array (
                'id' => 32,
                'name' => 'testloc2',
                'registered_key' => '1234567891212',
                'address_1' => '33 rue banana',
                'address_2' => NULL,
                'postal_code' => 97400,
                'city' => 'st denis',
                'started_at' => NULL,
                'created_at' => '2018-12-11 18:32:01',
                'updated_at' => '2018-12-11 18:32:01',
                'capital' => '6000',
                'registration_city' => 'st denis',
                'type_immatriculation' => 'CMA',
                'forme_juridique' => 'EI',
                'activity' => NULL,
                'depend_groupeco' => '1',
                'type_operation' => NULL,
                'regime_impot' => NULL,
                'site_web' => NULL,
                'contact_id' => '41',
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
                'key_ape' => '01.47',
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
            6 => 
            array (
                'id' => 33,
                'name' => 'ARTS',
                'registered_key' => '000000000',
                'address_1' => '1 GRANDE RUE',
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => 'SAINT LEU',
                'started_at' => NULL,
                'created_at' => '2018-12-13 02:47:12',
                'updated_at' => '2018-12-13 02:47:12',
                'capital' => '1000',
                'registration_city' => NULL,
                'type_immatriculation' => 'RCS',
                'forme_juridique' => 'EURL',
                'activity' => NULL,
                'depend_groupeco' => '0',
                'type_operation' => NULL,
                'regime_impot' => NULL,
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
                'key_ape' => '49.41A',
                'fin_exercice' => NULL,
                'effectif_company' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_clerib' => NULL,
            ),
            7 => 
            array (
                'id' => 34,
                'name' => 'PONPON',
                'registered_key' => '1176662773',
                'address_1' => 'KBBBHBB',
                'address_2' => 'NNHHHH',
                'postal_code' => 12221,
                'city' => 'NKKLMK',
                'started_at' => NULL,
                'created_at' => '2018-12-19 09:02:29',
                'updated_at' => '2018-12-19 09:02:29',
                'capital' => '1011',
                'registration_city' => 'ST DENIS',
                'type_immatriculation' => 'CMA',
                'forme_juridique' => 'EI',
                'activity' => NULL,
                'depend_groupeco' => '0',
                'type_operation' => NULL,
                'regime_impot' => NULL,
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