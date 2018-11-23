<?php

use Illuminate\Database\Seeder;

class bcktestintMandatTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        

        \DB::table('mandat')->delete();
        
        \DB::table('mandat')->insert(array (
            0 => 
            array (
                'id' => 14,
                'identifiant' => 'KARION-20181113/14',
                'leaseholder_id' => 1,
                'nature_mandat' => 'SIMPLIFIE',
                'duree_mandat' => '60',
                'type_defiscalisation' => 'UNDECIES',
                'ri_amount_type_id' => '44',
                'renouvellement' => '0',
                'complement_financement' => 'LOAN',
                'agrement' => false,
                'referencement_valid' => false,
                'supplier_id' => 1,
                'segment_materiel' => 1,
                'emission_co2_materiel' => false,
                'divers_materiel' => NULL,
                'immatriculation_materiel' => 'Non',
                'description_materiel' => NULL,
                'materiel_valid' => false,
                'montant_ht' => '100000',
                'carte_grise' => '0',
                'fraix_defiscalisable' => '0',
                'fraix_non_defiscalisable' => '0',
                'tva_npr' => '8500',
                'tva_investissement' => '0',
                'is_remplacement' => false,
                'montant_remplacement' => NULL,
                'is_assurance' => false,
                'is_reprise_fournisseur' => false,
                'montant_reprise_fournisseur' => NULL,
                'prevision_livraison' => '2018-11-21',
                'apport_locataire' => '10000',
                'apport_snc' => '33000',
                'is_subvention' => false,
                'type_subvention' => '',
                'montant_frais_tenue_compte' => '0',
                'nombre_periode' => 1,
                'periodicite' => 'MENSUELLE',
                'duree_pret' => 60,
                'taux_pret' => '8',
                'duree_pret_periode' => 60,
                'is_assurance_invalidite' => false,
                'resultats' => '{"annexe_fee":400,"apport_bd":0.2677595628415301,"apport_investissement":0.33,"apport_net":24500,"base_defiscalisable":91500,"ht_amount":100000,"interest":4560,"juridical_fee":149,"loan_amount":57000,"numerateur_van":24119.97729647797,"period":60,"retrocession":0.597475768928208,"retrocession_net":24119.977296477966,"ri_amount":40369.799999999996,"ri_amount_percent":91500,"taux_pret":0.006666666666666667,"taux_retrocession":0.6068893083443565,"term_pay":1155.7544744395893,"term_pay_ttc":1253.9936047669544,"term_years":5,"total_interest":12345.26846637536,"total_pay":69345.26846637536,"total_vat":8500,"ttc_amount":100000,"tva_npr":8500,"van_paiement":67380.02270352203,"vpm":-1918.717498886602}',
                'van_paiement' => '[{"payment":1155.7544744395893,"interest":380,"principal":775.75,"balance":56224.25},{"payment":1155.7545664168767,"interest":374.83,"principal":780.92,"balance":55443.33},{"payment":1155.7546963498291,"interest":369.62,"principal":786.13,"balance":54657.2},{"payment":1155.7547491364362,"interest":364.38,"principal":791.37,"balance":53865.83},{"payment":1155.7548224265147,"interest":359.11,"principal":796.64,"balance":53069.19},{"payment":1155.7550247268725,"interest":353.79,"principal":801.97,"balance":52267.22},{"payment":1155.7548129943943,"interest":348.45,"principal":807.3,"balance":51459.92},{"payment":1155.7549630150593,"interest":343.07,"principal":812.68,"balance":50647.24},{"payment":1155.7551645058068,"interest":337.65,"principal":818.11,"balance":49829.13},{"payment":1155.7550925531511,"interest":332.19,"principal":823.57,"balance":49005.56},{"payment":1155.7548777616844,"interest":326.7,"principal":829.05,"balance":48176.51},{"payment":1155.7549052165305,"interest":321.18,"principal":834.57,"balance":47341.94},{"payment":1155.7551047160803,"interest":315.61,"principal":840.15,"balance":46501.79},{"payment":1155.754910143724,"interest":310.01,"principal":845.74,"balance":45656.05},{"payment":1155.7549854998583,"interest":304.37,"principal":851.38,"balance":44804.67},{"payment":1155.7550195197066,"interest":298.7,"principal":857.06,"balance":43947.61},{"payment":1155.754946397326,"interest":292.98,"principal":862.77,"balance":43084.84},{"payment":1155.754969996185,"interest":287.23,"principal":868.52,"balance":42216.32},{"payment":1155.7550440051634,"interest":281.44,"principal":874.32,"balance":41342},{"payment":1155.7548458162664,"interest":275.61,"principal":880.14,"balance":40461.86},{"payment":1155.7548890189153,"interest":269.75,"principal":886,"balance":39575.86},{"payment":1155.7551563973323,"interest":263.84,"principal":891.92,"balance":38683.94},{"payment":1155.755039570724,"interest":257.89,"principal":897.87,"balance":37786.07},{"payment":1155.7547981258208,"interest":251.91,"principal":903.84,"balance":36882.23},{"payment":1155.7550383125592,"interest":245.88,"principal":909.88,"balance":35972.35},{"payment":1155.754829634181,"interest":239.82,"principal":915.93,"balance":35056.42},{"payment":1155.755131722835,"interest":233.71,"principal":922.05,"balance":34134.37},{"payment":1155.7549849460536,"interest":227.56,"principal":928.19,"balance":33206.18},{"payment":1155.7550725958272,"interest":221.37,"principal":934.39,"balance":32271.79},{"payment":1155.7547337769347,"interest":215.15,"principal":940.6,"balance":31331.19},{"payment":1155.7550830027635,"interest":208.87,"principal":946.89,"balance":30384.3},{"payment":1155.754720996251,"interest":202.56,"principal":953.19,"balance":29431.11},{"payment":1155.7548278493234,"interest":196.21,"principal":959.54,"balance":28471.57},{"payment":1155.7551293702772,"interest":189.81,"principal":965.95,"balance":27505.62},{"payment":1155.7549051031451,"interest":183.37,"principal":972.38,"balance":26533.24},{"payment":1155.7550839163553,"interest":176.89,"principal":978.87,"balance":25554.37},{"payment":1155.7549399691802,"interest":170.36,"principal":985.39,"balance":24568.98},{"payment":1155.7550563163738,"interest":163.79,"principal":991.97,"balance":23577.01},{"payment":1155.7546571096764,"interest":157.18,"principal":998.57,"balance":22578.44},{"payment":1155.7548920872457,"interest":150.52,"principal":1005.23,"balance":21573.21},{"payment":1155.7549970247865,"interest":143.82,"principal":1011.93,"balance":20561.28},{"payment":1155.755199214538,"interest":137.08,"principal":1018.68,"balance":19542.6},{"payment":1155.7551991680853,"interest":130.28,"principal":1025.48,"balance":18517.12},{"payment":1155.7546498600705,"interest":123.45,"principal":1032.3,"balance":17484.82},{"payment":1155.755124672654,"interest":116.57,"principal":1039.19,"balance":16445.63},{"payment":1155.755100638226,"interest":109.64,"principal":1046.12,"balance":15399.51},{"payment":1155.7549180610308,"interest":102.66,"principal":1053.09,"balance":14346.42},{"payment":1155.7550403568132,"interest":95.64,"principal":1060.12,"balance":13286.3},{"payment":1155.754365357642,"interest":88.58,"principal":1067.17,"balance":12219.13},{"payment":1155.7552196581714,"interest":81.46,"principal":1074.3,"balance":11144.83},{"payment":1155.7546340452695,"interest":74.3,"principal":1081.45,"balance":10063.38},{"payment":1155.7552964150022,"interest":67.09,"principal":1088.67,"balance":8974.71},{"payment":1155.754793714965,"interest":59.83,"principal":1095.92,"balance":7878.79},{"payment":1155.755291545723,"interest":52.53,"principal":1103.23,"balance":6775.56},{"payment":1155.7552957895198,"interest":45.17,"principal":1110.59,"balance":5664.97},{"payment":1155.7542544401351,"interest":37.77,"principal":1117.98,"balance":4546.99},{"payment":1155.7562339403614,"interest":30.31,"principal":1125.45,"balance":3421.54},{"payment":1155.7538583724634,"interest":22.81,"principal":1132.94,"balance":2288.6},{"payment":1155.755672203772,"interest":15.26,"principal":1140.5,"balance":1148.1},{"payment":1155.7540000000135,"interest":7.65,"principal":1148.1,"balance":0}]',
                'created_at' => '2018-11-13 07:48:00',
                'updated_at' => '2018-11-22 16:31:45',
                'genre_vehicle' => NULL,
                'marque_vehicle' => NULL,
                'type_vehicle' => NULL,
                'montant_subvention' => NULL,
                'other_subvention' => NULL,
                'motivation' => NULL,
                'autre_duree_mandat' => NULL,
                'ape_locataire' => 'Non',
                'marque_divers' => NULL,
                'type_divers' => NULL,
                'bank' => NULL,
                'montant_compl_fin' => '57000',
                'taux_retro' => NULL,
                'montant_echeance' => NULL,
                'ouverture_compte_bank' => '0',
                'tva_loyer' => '1',
                'fact_loyer' => '1',
                'frais_enreg' => NULL,
                'methode_payment' => '1',
                'hono_jur' => '100',
                'remise_jur' => '0',
                'cfe_tax' => '100',
                'cfe_remise' => '0',
                'base_defiscalisable' => '91500',
            ),
        ));
        
        
    }
}