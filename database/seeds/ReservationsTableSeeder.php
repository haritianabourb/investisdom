<?php

use Illuminate\Database\Seeder;

class ReservationsTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('reservations')->delete();
        
        \DB::table('reservations')->insert(array (
            0 => 
            array (
                'id' => 15,
                'identifiant' => 'Invst2-20190104/15',
                'montant_reduction' => '120000',
                'commission_cgp' => '5',
                'mandat_start_at' => '2019-01-11',
                'mandat_finnish_at' => '2019-06-11',
                'type_contrats_id' => 1,
                'cgps_id' => 2,
                'investors_id' => 1,
                'nbr_snc' => 1,
                'assistance_juridique' => 1,
                'secteurs_activite' => 'industrie',
                'taux_rentabilite' => '16.6',
                'apport' => '102915.95197256',
                'montant_commission_cgp' => '5145.7975986278',
                'gain_brut' => '17084.048027444',
                'taux_reservation' => '0.85763293310463',
                'created_at' => '2019-01-04 10:27:00',
                'updated_at' => '2019-01-10 04:22:45',
                'type_aj' => 'permanent',
                'taux_ponctuel' => NULL,
                'paiement' => '01',
                'user_id' => 1,
                'user_created_id' => NULL,
                'user_updated_id' => 1,
                'mode_paiement' => NULL,
            ),
            1 => 
            array (
                'id' => 17,
                'identifiant' => 'GFI-20190113/17',
                'montant_reduction' => '12000',
                'commission_cgp' => '0.05',
                'mandat_start_at' => '2019-01-15',
                'mandat_finnish_at' => '2019-05-22',
                'type_contrats_id' => 3,
                'cgps_id' => 5,
                'investors_id' => 7,
                'nbr_snc' => 2,
                'assistance_juridique' => 1,
                'secteurs_activite' => 'industrie',
                'taux_rentabilite' => '0.166',
                'apport' => '10291.595197256',
                'montant_commission_cgp' => '514.57975986278',
                'gain_brut' => '1708.4048027444',
                'taux_reservation' => '0.85763293310463',
                'created_at' => '2019-01-13 19:18:00',
                'updated_at' => '2019-01-14 01:15:41',
                'type_aj' => 'ponctuel',
                'taux_ponctuel' => NULL,
                'paiement' => 'echelonne',
                'user_id' => 1,
                'user_created_id' => 1,
                'user_updated_id' => 1,
                'mode_paiement' => NULL,
            ),
        ));
        
        
    }
}