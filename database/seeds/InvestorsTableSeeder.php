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
                'id' => 7,
                'name' => NULL,
                'registered_key' => NULL,
                'address_1' => '33, rue de l\'investissement',
                'address_2' => 'Appt 5, Cité des arts',
                'postal_code' => 97400,
                'city' => 'Saint-Denis',
                'started_at' => NULL,
                'cgp_id' => NULL,
                'created_at' => '2019-01-13 19:13:41',
                'updated_at' => '2019-01-14 00:30:05',
                'type_entities_id' => 4,
                'nature_entities_id' => 1,
                'registration_entities_id' => NULL,
                'capital' => NULL,
                'registration_city' => NULL,
                'cgp_attached' => '5',
                'contact_attached' => NULL,
                'civilite' => 'monsieur',
                'prenom_invest' => 'Isseur',
                'name_invest' => 'INVEST',
                'birth_date' => '1984-02-01 23:10:00',
                'birth_location' => '97400',
                'birth_cp' => 'Saint Clotilde',
                'name_jeunefille_invest' => NULL,
                'email_invest' => 'invest.isseur@mail.com',
                'country_invest' => 'France',
                'fixe_invest' => '0262323135',
                'gsm_invest' => '0692010203',
                'fax_invest' => '0262323135',
                'regime_mat_invest' => '01',
                'father_invest' => 'INVEST Thor',
                'madre_invest' => 'HAL Capi',
                'profession_invest' => 'Chirurgien-dentiste',
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
                'bank_name' => 'Credit Asylum',
                'bank_agency' => 'Saint Denis',
                'bank_code' => '2154',
                'bank_guichet' => '1234',
                'bank_compte' => '5452',
                'bank_cle_rib' => '123',
                'bank_iban' => '1523654125986485Y456256',
                'bank_bic' => 'PSSTFR12125',
            ),
        ));
        
        
    }
}