<?php

use Illuminate\Database\Seeder;

class InvestorsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('investors')->delete();
        
        \DB::table('investors')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'Investisseur Test',
                'registered_key' => '9876543210',
                'address_1' => '33',
                'address_2' => NULL,
                'postal_code' => 97400,
                'city' => 'Saint Denis',
                'started_at' => '2018-09-20 10:17:00',
                'cgp_id' => NULL,
                'created_at' => '2018-09-20 06:19:03',
                'updated_at' => '2018-09-20 06:19:03',
                'type_entities_id' => 4,
                'nature_entities_id' => 2,
                'registration_entities_id' => 10203,
                'capital' => '5000',
                'registration_city' => 'Saint Denis',
                'cgp_attached' => NULL,
                'contact_attached' => NULL,
                'civilite' => NULL,
                'prenom_invest' => NULL,
                'name_invest' => NULL,
                'birth_date' => NULL,
                'birth_location' => NULL,
                'birth_cp' => NULL,
                'name_jeunefille_invest' => NULL,
                'email_invest' => NULL,
                'country_invest' => NULL,
                'fixe_invest' => NULL,
                'gsm_invest' => NULL,
                'fax_invest' => NULL,
                'regime_mat_invest' => NULL,
                'father_invest' => NULL,
                'madre_invest' => NULL,
                'profession_invest' => NULL,
                'prenom_conjoint' => NULL,
                'nom_conjoint' => NULL,
                'nom_jeunefille_conjoint' => NULL,
                'birth_conjoint' => NULL,
                'cni' => NULL,
                'justificatif_adress' => NULL,
                'kbis' => NULL,
                'avis_impot' => NULL,
                'rib' => NULL,
                'check_resa' => NULL,
                'check_frais' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_cle_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'Investisseur Test 2',
                'registered_key' => '0125461316656654654848',
                'address_1' => '1, rue du test 2',
                'address_2' => 'Bat 2, 3Eme etage, Bureau E422',
                'postal_code' => 12345,
                'city' => 'testville',
                'started_at' => '2018-09-03 08:32:00',
                'cgp_id' => NULL,
                'created_at' => '2018-09-21 04:32:54',
                'updated_at' => '2018-09-21 04:32:54',
                'type_entities_id' => 4,
                'nature_entities_id' => 1,
                'registration_entities_id' => 10205,
                'capital' => '5000',
                'registration_city' => 'Saint Denis',
                'cgp_attached' => NULL,
                'contact_attached' => NULL,
                'civilite' => NULL,
                'prenom_invest' => NULL,
                'name_invest' => NULL,
                'birth_date' => NULL,
                'birth_location' => NULL,
                'birth_cp' => NULL,
                'name_jeunefille_invest' => NULL,
                'email_invest' => NULL,
                'country_invest' => NULL,
                'fixe_invest' => NULL,
                'gsm_invest' => NULL,
                'fax_invest' => NULL,
                'regime_mat_invest' => NULL,
                'father_invest' => NULL,
                'madre_invest' => NULL,
                'profession_invest' => NULL,
                'prenom_conjoint' => NULL,
                'nom_conjoint' => NULL,
                'nom_jeunefille_conjoint' => NULL,
                'birth_conjoint' => NULL,
                'cni' => NULL,
                'justificatif_adress' => NULL,
                'kbis' => NULL,
                'avis_impot' => NULL,
                'rib' => NULL,
                'check_resa' => NULL,
                'check_frais' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_cle_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'investisseurTest1',
                'registered_key' => '3215465484512',
                'address_1' => '12 rue du test',
                'address_2' => NULL,
                'postal_code' => 97400,
                'city' => 'saint-denis',
                'started_at' => '2018-07-10 14:26:00',
                'cgp_id' => NULL,
                'created_at' => '2018-09-24 10:27:38',
                'updated_at' => '2018-09-24 10:27:38',
                'type_entities_id' => 4,
                'nature_entities_id' => 2,
                'registration_entities_id' => 45421321,
                'capital' => '8000',
                'registration_city' => 'saint-pierre',
                'cgp_attached' => NULL,
                'contact_attached' => NULL,
                'civilite' => NULL,
                'prenom_invest' => NULL,
                'name_invest' => NULL,
                'birth_date' => NULL,
                'birth_location' => NULL,
                'birth_cp' => NULL,
                'name_jeunefille_invest' => NULL,
                'email_invest' => NULL,
                'country_invest' => NULL,
                'fixe_invest' => NULL,
                'gsm_invest' => NULL,
                'fax_invest' => NULL,
                'regime_mat_invest' => NULL,
                'father_invest' => NULL,
                'madre_invest' => NULL,
                'profession_invest' => NULL,
                'prenom_conjoint' => NULL,
                'nom_conjoint' => NULL,
                'nom_jeunefille_conjoint' => NULL,
                'birth_conjoint' => NULL,
                'cni' => NULL,
                'justificatif_adress' => NULL,
                'kbis' => NULL,
                'avis_impot' => NULL,
                'rib' => NULL,
                'check_resa' => NULL,
                'check_frais' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_cle_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
            3 => 
            array (
                'id' => 4,
                'name' => 'MONEL',
                'registered_key' => 'Corinne',
                'address_1' => '104 AVENUE DE BOURBON',
                'address_2' => 'VILLA 18 RESIDENCE NAUTICLUB',
                'postal_code' => 97434,
                'city' => 'SAINTE GILLES LES BAINS',
                'started_at' => NULL,
                'cgp_id' => NULL,
                'created_at' => '2018-09-26 10:17:54',
                'updated_at' => '2018-09-26 10:17:54',
                'type_entities_id' => 4,
                'nature_entities_id' => 1,
                'registration_entities_id' => NULL,
                'capital' => '1',
                'registration_city' => 'SAINTE GILLES LES BAINS',
                'cgp_attached' => NULL,
                'contact_attached' => NULL,
                'civilite' => NULL,
                'prenom_invest' => NULL,
                'name_invest' => NULL,
                'birth_date' => NULL,
                'birth_location' => NULL,
                'birth_cp' => NULL,
                'name_jeunefille_invest' => NULL,
                'email_invest' => NULL,
                'country_invest' => NULL,
                'fixe_invest' => NULL,
                'gsm_invest' => NULL,
                'fax_invest' => NULL,
                'regime_mat_invest' => NULL,
                'father_invest' => NULL,
                'madre_invest' => NULL,
                'profession_invest' => NULL,
                'prenom_conjoint' => NULL,
                'nom_conjoint' => NULL,
                'nom_jeunefille_conjoint' => NULL,
                'birth_conjoint' => NULL,
                'cni' => NULL,
                'justificatif_adress' => NULL,
                'kbis' => NULL,
                'avis_impot' => NULL,
                'rib' => NULL,
                'check_resa' => NULL,
                'check_frais' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_cle_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
            4 => 
            array (
                'id' => 5,
                'name' => NULL,
                'registered_key' => NULL,
                'address_1' => 'investor',
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => NULL,
                'started_at' => NULL,
                'cgp_id' => NULL,
                'created_at' => '2018-10-06 22:12:45',
                'updated_at' => '2018-10-06 22:12:45',
                'type_entities_id' => 4,
                'nature_entities_id' => 2,
                'registration_entities_id' => NULL,
                'capital' => NULL,
                'registration_city' => NULL,
                'cgp_attached' => NULL,
                'contact_attached' => NULL,
                'civilite' => NULL,
                'prenom_invest' => NULL,
                'name_invest' => NULL,
                'birth_date' => NULL,
                'birth_location' => NULL,
                'birth_cp' => NULL,
                'name_jeunefille_invest' => NULL,
                'email_invest' => NULL,
                'country_invest' => NULL,
                'fixe_invest' => NULL,
                'gsm_invest' => NULL,
                'fax_invest' => NULL,
                'regime_mat_invest' => NULL,
                'father_invest' => NULL,
                'madre_invest' => NULL,
                'profession_invest' => NULL,
                'prenom_conjoint' => NULL,
                'nom_conjoint' => NULL,
                'nom_jeunefille_conjoint' => NULL,
                'birth_conjoint' => NULL,
                'cni' => NULL,
                'justificatif_adress' => NULL,
                'kbis' => NULL,
                'avis_impot' => NULL,
                'rib' => NULL,
                'check_resa' => NULL,
                'check_frais' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_cle_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
            5 => 
            array (
                'id' => 6,
                'name' => NULL,
                'registered_key' => NULL,
                'address_1' => 'investor',
                'address_2' => NULL,
                'postal_code' => NULL,
                'city' => NULL,
                'started_at' => NULL,
                'cgp_id' => NULL,
                'created_at' => '2018-10-06 22:12:56',
                'updated_at' => '2018-10-06 22:12:56',
                'type_entities_id' => 4,
                'nature_entities_id' => 1,
                'registration_entities_id' => NULL,
                'capital' => NULL,
                'registration_city' => NULL,
                'cgp_attached' => NULL,
                'contact_attached' => NULL,
                'civilite' => NULL,
                'prenom_invest' => NULL,
                'name_invest' => NULL,
                'birth_date' => NULL,
                'birth_location' => NULL,
                'birth_cp' => NULL,
                'name_jeunefille_invest' => NULL,
                'email_invest' => NULL,
                'country_invest' => NULL,
                'fixe_invest' => NULL,
                'gsm_invest' => NULL,
                'fax_invest' => NULL,
                'regime_mat_invest' => NULL,
                'father_invest' => NULL,
                'madre_invest' => NULL,
                'profession_invest' => NULL,
                'prenom_conjoint' => NULL,
                'nom_conjoint' => NULL,
                'nom_jeunefille_conjoint' => NULL,
                'birth_conjoint' => NULL,
                'cni' => NULL,
                'justificatif_adress' => NULL,
                'kbis' => NULL,
                'avis_impot' => NULL,
                'rib' => NULL,
                'check_resa' => NULL,
                'check_frais' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_compte' => NULL,
                'bank_cle_rib' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
            ),
        ));
        
        
    }
}