<?php

use Illuminate\Database\Seeder;

class TauxCgpTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('taux_cgp')->delete();
        
        \DB::table('taux_cgp')->insert(array (
            0 => 
            array (
                'id' => 1,
                'cgps_id' => 1,
                'type_contrat_id' => 1,
                'mois_1' => '21.7',
                'mois_2' => '21.7',
                'mois_3' => '19.5',
                'mois_4' => '19.5',
                'mois_5' => '18.7',
                'mois_6' => '18.7',
                'mois_7' => '13.2',
                'mois_8' => '13.2',
                'mois_9' => '13.2',
                'mois_10' => '13.2',
                'mois_11' => '13.2',
                'mois_12' => '13.2',
                'reduction_aj' => '0',
                'year' => 2018,
                'created_at' => '2018-09-20 06:16:15',
                'updated_at' => '2018-09-20 06:16:15',
            ),
            1 => 
            array (
                'id' => 2,
                'cgps_id' => 1,
                'type_contrat_id' => 2,
                'mois_1' => '33.33',
                'mois_2' => '33.33',
                'mois_3' => '33.33',
                'mois_4' => '33.33',
                'mois_5' => '25.2',
                'mois_6' => '25.2',
                'mois_7' => '25.2',
                'mois_8' => '25.2',
                'mois_9' => '19.2',
                'mois_10' => '19.2',
                'mois_11' => '19.2',
                'mois_12' => '19.2',
                'reduction_aj' => '100',
                'year' => 2018,
                'created_at' => '2018-09-20 06:17:05',
                'updated_at' => '2018-09-20 06:17:05',
            ),
            2 => 
            array (
                'id' => 3,
                'cgps_id' => 2,
                'type_contrat_id' => 1,
                'mois_1' => '33.33',
                'mois_2' => '33.33',
                'mois_3' => '33.33',
                'mois_4' => '33.33',
                'mois_5' => '25.2',
                'mois_6' => '25.2',
                'mois_7' => '25.2',
                'mois_8' => '25.2',
                'mois_9' => '19.2',
                'mois_10' => '19.2',
                'mois_11' => '19.2',
                'mois_12' => '19.2',
                'reduction_aj' => '0',
                'year' => 2019,
                'created_at' => '2018-09-21 04:31:38',
                'updated_at' => '2018-09-21 04:31:38',
            ),
            3 => 
            array (
                'id' => 4,
                'cgps_id' => 1,
                'type_contrat_id' => 1,
                'mois_1' => '25',
                'mois_2' => '25',
                'mois_3' => '24',
                'mois_4' => '23',
                'mois_5' => '22',
                'mois_6' => '22',
                'mois_7' => '21',
                'mois_8' => '21',
                'mois_9' => '21',
                'mois_10' => '21',
                'mois_11' => '20',
                'mois_12' => '20',
                'reduction_aj' => '0',
                'year' => 2018,
                'created_at' => '2018-09-24 09:20:41',
                'updated_at' => '2018-09-24 09:20:41',
            ),
            4 => 
            array (
                'id' => 5,
                'cgps_id' => 4,
                'type_contrat_id' => 2,
                'mois_1' => '21',
                'mois_2' => '21',
                'mois_3' => '21',
                'mois_4' => '19',
                'mois_5' => '19',
                'mois_6' => '19',
                'mois_7' => '17',
                'mois_8' => '17',
                'mois_9' => '17',
                'mois_10' => '15',
                'mois_11' => '15',
                'mois_12' => '15',
                'reduction_aj' => '0',
                'year' => 2018,
                'created_at' => '2018-10-24 11:40:00',
                'updated_at' => '2018-10-24 11:41:00',
            ),
            5 => 
            array (
                'id' => 6,
                'cgps_id' => 1,
                'type_contrat_id' => 2,
                'mois_1' => '25',
                'mois_2' => '25',
                'mois_3' => '25',
                'mois_4' => '25',
                'mois_5' => '25',
                'mois_6' => '25',
                'mois_7' => '25',
                'mois_8' => '30',
                'mois_9' => '30',
                'mois_10' => '30',
                'mois_11' => '30',
                'mois_12' => '30',
                'reduction_aj' => '5',
                'year' => 2018,
                'created_at' => '2018-10-24 13:13:55',
                'updated_at' => '2018-10-24 13:13:55',
            ),
            6 => 
            array (
                'id' => 8,
                'cgps_id' => 4,
                'type_contrat_id' => 1,
                'mois_1' => '11',
                'mois_2' => '11',
                'mois_3' => '12',
                'mois_4' => '12',
                'mois_5' => '12',
                'mois_6' => '11',
                'mois_7' => '11',
                'mois_8' => '12',
                'mois_9' => '12',
                'mois_10' => '11',
                'mois_11' => '11',
                'mois_12' => '12',
                'reduction_aj' => '0',
                'year' => 2018,
                'created_at' => '2018-10-24 13:39:25',
                'updated_at' => '2018-10-24 13:39:25',
            ),
        ));
        
        
    }
}