<?php

use Illuminate\Database\Seeder;

class DevInvestisIntermediariesTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('intermediaries')->delete();
        
        \DB::table('intermediaries')->insert(array (
            0 => 
            array (
                'id' => 1,
                'name' => 'FIDUCIA CONSULTING',
                'registered_key' => '112223333',
                'address_1' => '50 ROUTE NATIONALE 5',
                'address_2' => NULL,
                'postal_code' => 9745,
                'city' => 'SAINT LOUIS',
                'started_at' => '2018-08-27 14:04:00',
                'created_at' => '2018-09-26 10:04:50',
                'updated_at' => '2018-09-26 10:04:50',
                'capital' => '1000',
                'registration_city' => 'SAINT LOUIS',
                'forme_juridique' => '9077A',
                'contact_id' => 1,
                'type_immat' => NULL,
                'activity' => NULL,
                'date_creation' => NULL,
                'date_contrat' => NULL,
                'duree_contrat' => NULL,
                'tacite_reconduction' => NULL,
                'habilitation_mandat' => NULL,
                'remuneration' => NULL,
                'habilitation_dossier' => NULL,
                'taux_comm' => NULL,
                'mandat_sign' => NULL,
                'kbis' => NULL,
                'cni' => NULL,
                'rib' => NULL,
                'bank_name' => NULL,
                'bank_agency' => NULL,
                'bank_iban' => NULL,
                'bank_bic' => NULL,
                'bank_account' => NULL,
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_rib' => NULL,
            ),
            1 => 
            array (
                'id' => 2,
                'name' => 'JJGYYUFTYFTT',
                'registered_key' => 'GSGDTDD',
                'address_1' => 'VILLA 18 NAUTICLUB',
                'address_2' => NULL,
                'postal_code' => 97434,
                'city' => 'SAINT GILLES LES BAINS',
                'started_at' => '2018-10-02 06:44:00',
                'created_at' => '2018-10-17 02:47:29',
                'updated_at' => '2018-10-17 02:49:27',
                'capital' => 'FDFHK',
                'registration_city' => 'HVVJHVJHVJH',
                'forme_juridique' => 'EI',
                'contact_id' => 4,
                'type_immat' => 'CMA',
                'activity' => 'TP',
                'date_creation' => NULL,
                'date_contrat' => NULL,
                'duree_contrat' => NULL,
                'tacite_reconduction' => '1',
                'habilitation_mandat' => '1',
                'remuneration' => 'Variable',
                'habilitation_dossier' => '0',
                'taux_comm' => '01',
                'mandat_sign' => NULL,
                'kbis' => '[{"download_link":"intermediaries\\/October2018\\/BMdken5IEBTlXZzhBFll.pdf","original_name":"Plaquette Investis 2018 .pdf"}]',
                'cni' => '[{"download_link":"intermediaries\\/October2018\\/veuCo4tSTO4aY6kxjMwm.pdf","original_name":"2069-rci-sd_2055.pdf"}]',
                'rib' => NULL,
                'bank_name' => 'DGHGHGCHH',
                'bank_agency' => 'DHGDGD',
                'bank_iban' => 'DDDDG???DDGFD',
                'bank_bic' => 'FGHGFFJHF',
                'bank_account' => 'DGDHGFHF.HF.JHF',
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_rib' => NULL,
            ),
            2 => 
            array (
                'id' => 3,
                'name' => 'FINANCIERE OCEAN INDIEN',
                'registered_key' => '123123123',
                'address_1' => 'VILLA 18 RESIDENCE NAUTICLUB',
                'address_2' => NULL,
                'postal_code' => 97434,
                'city' => 'SAINTE GILLES LES BAINS',
                'started_at' => '2018-10-18 07:31:00',
                'created_at' => '2018-10-18 03:36:20',
                'updated_at' => '2018-10-18 03:36:20',
                'capital' => '10000',
                'registration_city' => 'SAINT DENIS',
                'forme_juridique' => 'SARL',
                'contact_id' => 1,
                'type_immat' => 'RCS',
                'activity' => 'Autre',
                'date_creation' => '2018-08-17',
                'date_contrat' => '2018-10-16',
                'duree_contrat' => '12',
                'tacite_reconduction' => '1',
                'habilitation_mandat' => '1',
                'remuneration' => 'Variable',
                'habilitation_dossier' => '0',
                'taux_comm' => '01',
                'mandat_sign' => '[{"download_link":"intermediaries\\/October2018\\/BelbZ4XvTED4SVGNmKvl.pdf","original_name":"181001 Simul PAUSE FUSO.pdf"}]',
            'kbis' => '[{"download_link":"intermediaries\\/October2018\\/0bJCUKJuctehDrBA8R1I.pdf","original_name":"badge_participant (1).pdf"}]',
                'cni' => '[{"download_link":"intermediaries\\/October2018\\/fBPF5ffCnw16HkYaCxAS.pdf","original_name":"181010 Simul ARTS REMORQUE FMA.pdf"}]',
                'rib' => '[{"download_link":"intermediaries\\/October2018\\/EYODgexcL6JJgrIjB3lN.pdf","original_name":"BEI-BFC.pdf"}]',
                'bank_name' => 'AG LE PORT BFCORERX',
                'bank_agency' => 'LE PORT',
                'bank_iban' => 'FR6525316356',
                'bank_bic' => 'FERSSXX',
                'bank_account' => '136316346113634',
                'bank_code' => NULL,
                'bank_guichet' => NULL,
                'bank_rib' => NULL,
            ),
        ));
        
        
    }
}