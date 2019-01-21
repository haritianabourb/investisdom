<?php

use Illuminate\Database\Seeder;

class MandatTableSeeder extends Seeder
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
                'id' => 20,
                'identifiant' => 'KARION-20181231/20',
                'leaseholder_id' => 1,
                'nature_mandat' => 'STANDARD',
                'duree_mandat' => 60,
                'type_defiscalisation' => '01',
                'ri_amount_type_id' => '44.12',
                'renouvellement' => '0',
                'complement_financement' => 'LOAN',
                'agrement' => false,
                'supplier_id' => 1,
                'segment_materiel' => 1,
                'emission_co2_materiel' => false,
                'divers_materiel' => NULL,
                'immatriculation_materiel' => '0',
                'description_materiel' => NULL,
                'montant_ht' => '100000',
                'carte_grise' => '0',
                'fraix_defiscalisable' => '10000',
                'fraix_non_defiscalisable' => '0',
                'tva_npr' => '8500',
                'tva_investissement' => '0',
                'is_remplacement' => false,
                'montant_remplacement' => NULL,
                'is_assurance' => false,
                'is_reprise_fournisseur' => false,
                'montant_reprise_fournisseur' => NULL,
                'prevision_livraison' => '2019-01-04',
                'apport_locataire' => '10000',
                'apport_snc' => '33000',
                'apport_bd' => '0.24137931034483',
                'apport_investissement' => '0.3',
                'is_subvention' => false,
                'type_subvention' => '',
                'montant_frais_tenue_compte' => '0',
                'nombre_periode' => 1,
                'periodicite' => 'MENSUELLE',
                'duree_pret' => 60,
                'taux_pret' => '0.03',
                'duree_pret_periode' => 1,
                'is_assurance_invalidite' => false,
                'resultats' => '{"all":"","apport_bd":0.2413793103448276,"apport_investissement":0.3,"apport_net":24500,"base_defiscalisable":101500,"cfe_tax":400,"echeance_loyer":1117.5183343168644,"echeance_loyer_ttc":1212.5073927337978,"hono_jur":149,"interet":20.1,"montant_compl_fin":67000,"montant_ht_mandat":110000,"montant_reduction_impot":44781.799999999996,"montant_reduction_impot_percent":101500,"montant_total_loyer":67051.10005901186,"montant_total_tva":8500,"montant_ttc_mandat":110000,"numerateur_van":24499.826412584414,"period":"60","retrocession":0.5470933819673264,"retrocession_net":24499.826412584414,"schedule":[{"period":"01\\/04\\/2019","payment":10000,"interet":0,"capital":0,"balance":67000},{"period":"02\\/01\\/2019","payment":1117.5183343168644,"interet":1.675,"capital":1115.8433343168645,"balance":65884.16},{"period":"03\\/01\\/2019","payment":1117.5183343168644,"interet":1.6471039166421437,"capital":1115.8712304002222,"balance":64768.29},{"period":"04\\/01\\/2019","payment":1117.5183343168644,"interet":1.619207135882145,"capital":1115.8991271809823,"balance":63652.39},{"period":"05\\/01\\/2019","payment":1117.5183343168644,"interet":1.5913096577026618,"capital":1115.9270246591618,"balance":62536.46},{"period":"06\\/01\\/2019","payment":1117.5183343168644,"interet":1.563411482086349,"capital":1115.954922834778,"balance":61420.51},{"period":"07\\/01\\/2019","payment":1117.5183343168644,"interet":1.5355126090156161,"capital":1115.9828217078489,"balance":60304.53},{"period":"08\\/01\\/2019","payment":1117.5183343168644,"interet":1.5076130384728708,"capital":1116.0107212783914,"balance":59188.52},{"period":"09\\/01\\/2019","payment":1117.5183343168644,"interet":1.4797127704410178,"capital":1116.0386215464234,"balance":58072.48},{"period":"10\\/01\\/2019","payment":1117.5183343168644,"interet":1.4518118049024655,"capital":1116.066522511962,"balance":56956.41},{"period":"11\\/01\\/2019","payment":1117.5183343168644,"interet":1.4239101418396225,"capital":1116.0944241750249,"balance":55840.32},{"period":"12\\/01\\/2019","payment":1117.5183343168644,"interet":1.3960077812353928,"capital":1116.122326535629,"balance":54724.2},{"period":"01\\/01\\/2020","payment":1117.5183343168644,"interet":1.3681047230719374,"capital":1116.1502295937926,"balance":53608.05},{"period":"02\\/01\\/2020","payment":1117.5183343168644,"interet":1.3402009673321598,"capital":1116.1781333495323,"balance":52491.87},{"period":"03\\/01\\/2020","payment":1117.5183343168644,"interet":1.3122965139984692,"capital":1116.206037802866,"balance":51375.66},{"period":"04\\/01\\/2020","payment":1117.5183343168644,"interet":1.2843913630535213,"capital":1116.2339429538108,"balance":50259.43},{"period":"05\\/01\\/2020","payment":1117.5183343168644,"interet":1.2564855144797251,"capital":1116.2618488023847,"balance":49143.17},{"period":"06\\/01\\/2020","payment":1117.5183343168644,"interet":1.2285789682597366,"capital":1116.2897553486048,"balance":48026.88},{"period":"07\\/01\\/2020","payment":1117.5183343168644,"interet":1.2006717243762126,"capital":1116.3176625924882,"balance":46910.56},{"period":"08\\/01\\/2020","payment":1117.5183343168644,"interet":1.1727637828113133,"capital":1116.3455705340532,"balance":45794.21},{"period":"09\\/01\\/2020","payment":1117.5183343168644,"interet":1.1448551435481906,"capital":1116.3734791733161,"balance":44677.84},{"period":"10\\/01\\/2020","payment":1117.5183343168644,"interet":1.116945806568758,"capital":1116.4013885102956,"balance":43561.44},{"period":"11\\/01\\/2020","payment":1117.5183343168644,"interet":1.0890357718561672,"capital":1116.4292985450084,"balance":42445.01},{"period":"12\\/01\\/2020","payment":1117.5183343168644,"interet":1.0611250393925784,"capital":1116.4572092774717,"balance":41328.55},{"period":"01\\/01\\/2021","payment":1117.5183343168644,"interet":1.0332136091606487,"capital":1116.4851207077038,"balance":40212.06},{"period":"02\\/01\\/2021","payment":1117.5183343168644,"interet":1.0053014811430339,"capital":1116.5130328357213,"balance":39095.55},{"period":"03\\/01\\/2021","payment":1117.5183343168644,"interet":0.9773886553223906,"capital":1116.540945661542,"balance":37979.01},{"period":"04\\/01\\/2021","payment":1117.5183343168644,"interet":0.949475131680879,"capital":1116.5688591851836,"balance":36862.44},{"period":"05\\/01\\/2021","payment":1117.5183343168644,"interet":0.9215609102011564,"capital":1116.5967734066633,"balance":35745.84},{"period":"06\\/01\\/2021","payment":1117.5183343168644,"interet":0.8936459908661258,"capital":1116.6246883259982,"balance":34629.22},{"period":"07\\/01\\/2021","payment":1117.5183343168644,"interet":0.8657303736579488,"capital":1116.6526039432065,"balance":33512.57},{"period":"08\\/01\\/2021","payment":1117.5183343168644,"interet":0.8378140585595291,"capital":1116.6805202583048,"balance":32395.89},{"period":"09\\/01\\/2021","payment":1117.5183343168644,"interet":0.8098970455530277,"capital":1116.7084372713114,"balance":31279.18},{"period":"10\\/01\\/2021","payment":1117.5183343168644,"interet":0.7819793346213485,"capital":1116.736354982243,"balance":30162.44},{"period":"11\\/01\\/2021","payment":1117.5183343168644,"interet":0.7540609257468996,"capital":1116.7642733911175,"balance":29045.68},{"period":"12\\/01\\/2021","payment":1117.5183343168644,"interet":0.7261418189120906,"capital":1116.7921924979523,"balance":27928.89},{"period":"01\\/01\\/2022","payment":1117.5183343168644,"interet":0.6982220140998244,"capital":1116.8201123027645,"balance":26812.07},{"period":"02\\/01\\/2022","payment":1117.5183343168644,"interet":0.6703015112922631,"capital":1116.848032805572,"balance":25695.22},{"period":"03\\/01\\/2022","payment":1117.5183343168644,"interet":0.6423803104723095,"capital":1116.875954006392,"balance":24578.34},{"period":"04\\/01\\/2022","payment":1117.5183343168644,"interet":0.6144584116221251,"capital":1116.9038759052423,"balance":23461.44},{"period":"05\\/01\\/2022","payment":1117.5183343168644,"interet":0.5865358147246138,"capital":1116.9317985021398,"balance":22344.51},{"period":"06\\/01\\/2022","payment":1117.5183343168644,"interet":0.5586125197621841,"capital":1116.9597217971022,"balance":21227.55},{"period":"07\\/01\\/2022","payment":1117.5183343168644,"interet":0.5306885267172448,"capital":1116.987645790147,"balance":20110.56},{"period":"08\\/01\\/2022","payment":1117.5183343168644,"interet":0.5027638355724515,"capital":1117.015570481292,"balance":18993.54},{"period":"09\\/01\\/2022","payment":1117.5183343168644,"interet":0.4748384463104616,"capital":1117.043495870554,"balance":17876.5},{"period":"10\\/01\\/2022","payment":1117.5183343168644,"interet":0.44691235891393083,"capital":1117.0714219579504,"balance":16759.43},{"period":"11\\/01\\/2022","payment":1117.5183343168644,"interet":0.4189855733650196,"capital":1117.0993487434994,"balance":15642.33},{"period":"12\\/01\\/2022","payment":1117.5183343168644,"interet":0.3910580896463847,"capital":1117.127276227218,"balance":14525.2},{"period":"01\\/01\\/2023","payment":1117.5183343168644,"interet":0.3631299077409302,"capital":1117.1552044091234,"balance":13408.04},{"period":"02\\/01\\/2023","payment":1117.5183343168644,"interet":0.33520102763081616,"capital":1117.1831332892336,"balance":12290.86},{"period":"03\\/01\\/2023","payment":1117.5183343168644,"interet":0.30727144929845235,"capital":1117.211062867566,"balance":11173.65},{"period":"04\\/01\\/2023","payment":1117.5183343168644,"interet":0.2793411727269897,"capital":1117.2389931441373,"balance":10056.41},{"period":"05\\/01\\/2023","payment":1117.5183343168644,"interet":0.2514101978983419,"capital":1117.266924118966,"balance":8939.14},{"period":"06\\/01\\/2023","payment":1117.5183343168644,"interet":0.223478524795412,"capital":1117.294855792069,"balance":7821.85},{"period":"07\\/01\\/2023","payment":1117.5183343168644,"interet":0.19554615340060974,"capital":1117.3227881634639,"balance":6704.53},{"period":"08\\/01\\/2023","payment":1117.5183343168644,"interet":0.16761308369659073,"capital":1117.3507212331679,"balance":5587.18},{"period":"09\\/01\\/2023","payment":1117.5183343168644,"interet":0.1396793156660113,"capital":1117.3786550011985,"balance":4469.8},{"period":"10\\/01\\/2023","payment":1117.5183343168644,"interet":0.11174484929103255,"capital":1117.4065894675734,"balance":3352.39},{"period":"11\\/01\\/2023","payment":1117.5183343168644,"interet":0.0838096845543103,"capital":1117.43452463231,"balance":2234.96},{"period":"12\\/01\\/2023","payment":1117.5183343168644,"interet":0.055873821438501184,"capital":1117.4624604954258,"balance":1117.5},{"period":"01\\/01\\/2024","payment":1117.5183343168644,"interet":0.027937259926261688,"capital":1117.490397056938,"balance":0.01}],"taux_base_eligible":0.3251231527093596,"taux_retro":0.5470972582611686,"term_years":5,"total_interet":51.10005901186378,"tva_loyer":5699.343505016009,"tva_npr":8500,"van_paiement":77000.17358741559,"vpm":2350.3963450960587}',
                'van_paiement' => '77000.173587416',
                'created_at' => '2018-12-31 06:36:04',
                'updated_at' => '2019-01-04 12:47:59',
                'genre_vehicle' => NULL,
                'marque_vehicle' => NULL,
                'type_vehicle' => NULL,
                'montant_subvention' => NULL,
                'other_subvention' => NULL,
                'motivation' => '01',
                'autre_duree_mandat' => NULL,
                'plafonnement_vp' => '0',
                'marque_divers' => NULL,
                'type_divers' => NULL,
                'bank' => '5',
                'montant_compl_fin' => '67000',
                'taux_retro' => '0.54709725826117',
                'montant_echeance' => NULL,
                'ouverture_compte_bank' => NULL,
                'tva_loyer' => '5699.343505016',
                'fact_loyer' => '1',
                'frais_enreg' => NULL,
                'methode_payment' => '1',
                'hono_jur' => '149',
                'remise_jur' => NULL,
                'cfe_tax' => '400',
                'cfe_remise' => NULL,
                'montant_ht_mandat' => '110000',
                'montant_ttc_mandat' => '110000',
                'apport_net' => '24500',
                'numerateur_van' => '24499.826412584',
                'retrocession' => '0.54709338196733',
                'retrocession_net' => '24499.826412584',
                'montant_reduction_impot' => '44781.8',
                'montant_reduction_impot_percent' => '101500',
                'taux_base_eligible' => '0.32512315270936',
                'base_defiscalisable' => '101500',
                'echeance_loyer' => '1117.5183343169',
                'echeance_loyer_ttc' => '1212.5073927338',
                'montant_total_loyer' => '67051.100059012',
                'montant_total_tva' => '8500',
                'total_interet' => '51.100059011864',
                'schedule' => '[{"period":"01\\/04\\/2019","payment":10000,"interet":0,"capital":0,"balance":67000},{"period":"02\\/01\\/2019","payment":1117.5183343168644,"interet":1.675,"capital":1115.8433343168645,"balance":65884.16},{"period":"03\\/01\\/2019","payment":1117.5183343168644,"interet":1.6471039166421437,"capital":1115.8712304002222,"balance":64768.29},{"period":"04\\/01\\/2019","payment":1117.5183343168644,"interet":1.619207135882145,"capital":1115.8991271809823,"balance":63652.39},{"period":"05\\/01\\/2019","payment":1117.5183343168644,"interet":1.5913096577026618,"capital":1115.9270246591618,"balance":62536.46},{"period":"06\\/01\\/2019","payment":1117.5183343168644,"interet":1.563411482086349,"capital":1115.954922834778,"balance":61420.51},{"period":"07\\/01\\/2019","payment":1117.5183343168644,"interet":1.5355126090156161,"capital":1115.9828217078489,"balance":60304.53},{"period":"08\\/01\\/2019","payment":1117.5183343168644,"interet":1.5076130384728708,"capital":1116.0107212783914,"balance":59188.52},{"period":"09\\/01\\/2019","payment":1117.5183343168644,"interet":1.4797127704410178,"capital":1116.0386215464234,"balance":58072.48},{"period":"10\\/01\\/2019","payment":1117.5183343168644,"interet":1.4518118049024655,"capital":1116.066522511962,"balance":56956.41},{"period":"11\\/01\\/2019","payment":1117.5183343168644,"interet":1.4239101418396225,"capital":1116.0944241750249,"balance":55840.32},{"period":"12\\/01\\/2019","payment":1117.5183343168644,"interet":1.3960077812353928,"capital":1116.122326535629,"balance":54724.2},{"period":"01\\/01\\/2020","payment":1117.5183343168644,"interet":1.3681047230719374,"capital":1116.1502295937926,"balance":53608.05},{"period":"02\\/01\\/2020","payment":1117.5183343168644,"interet":1.3402009673321598,"capital":1116.1781333495323,"balance":52491.87},{"period":"03\\/01\\/2020","payment":1117.5183343168644,"interet":1.3122965139984692,"capital":1116.206037802866,"balance":51375.66},{"period":"04\\/01\\/2020","payment":1117.5183343168644,"interet":1.2843913630535213,"capital":1116.2339429538108,"balance":50259.43},{"period":"05\\/01\\/2020","payment":1117.5183343168644,"interet":1.2564855144797251,"capital":1116.2618488023847,"balance":49143.17},{"period":"06\\/01\\/2020","payment":1117.5183343168644,"interet":1.2285789682597366,"capital":1116.2897553486048,"balance":48026.88},{"period":"07\\/01\\/2020","payment":1117.5183343168644,"interet":1.2006717243762126,"capital":1116.3176625924882,"balance":46910.56},{"period":"08\\/01\\/2020","payment":1117.5183343168644,"interet":1.1727637828113133,"capital":1116.3455705340532,"balance":45794.21},{"period":"09\\/01\\/2020","payment":1117.5183343168644,"interet":1.1448551435481906,"capital":1116.3734791733161,"balance":44677.84},{"period":"10\\/01\\/2020","payment":1117.5183343168644,"interet":1.116945806568758,"capital":1116.4013885102956,"balance":43561.44},{"period":"11\\/01\\/2020","payment":1117.5183343168644,"interet":1.0890357718561672,"capital":1116.4292985450084,"balance":42445.01},{"period":"12\\/01\\/2020","payment":1117.5183343168644,"interet":1.0611250393925784,"capital":1116.4572092774717,"balance":41328.55},{"period":"01\\/01\\/2021","payment":1117.5183343168644,"interet":1.0332136091606487,"capital":1116.4851207077038,"balance":40212.06},{"period":"02\\/01\\/2021","payment":1117.5183343168644,"interet":1.0053014811430339,"capital":1116.5130328357213,"balance":39095.55},{"period":"03\\/01\\/2021","payment":1117.5183343168644,"interet":0.9773886553223906,"capital":1116.540945661542,"balance":37979.01},{"period":"04\\/01\\/2021","payment":1117.5183343168644,"interet":0.949475131680879,"capital":1116.5688591851836,"balance":36862.44},{"period":"05\\/01\\/2021","payment":1117.5183343168644,"interet":0.9215609102011564,"capital":1116.5967734066633,"balance":35745.84},{"period":"06\\/01\\/2021","payment":1117.5183343168644,"interet":0.8936459908661258,"capital":1116.6246883259982,"balance":34629.22},{"period":"07\\/01\\/2021","payment":1117.5183343168644,"interet":0.8657303736579488,"capital":1116.6526039432065,"balance":33512.57},{"period":"08\\/01\\/2021","payment":1117.5183343168644,"interet":0.8378140585595291,"capital":1116.6805202583048,"balance":32395.89},{"period":"09\\/01\\/2021","payment":1117.5183343168644,"interet":0.8098970455530277,"capital":1116.7084372713114,"balance":31279.18},{"period":"10\\/01\\/2021","payment":1117.5183343168644,"interet":0.7819793346213485,"capital":1116.736354982243,"balance":30162.44},{"period":"11\\/01\\/2021","payment":1117.5183343168644,"interet":0.7540609257468996,"capital":1116.7642733911175,"balance":29045.68},{"period":"12\\/01\\/2021","payment":1117.5183343168644,"interet":0.7261418189120906,"capital":1116.7921924979523,"balance":27928.89},{"period":"01\\/01\\/2022","payment":1117.5183343168644,"interet":0.6982220140998244,"capital":1116.8201123027645,"balance":26812.07},{"period":"02\\/01\\/2022","payment":1117.5183343168644,"interet":0.6703015112922631,"capital":1116.848032805572,"balance":25695.22},{"period":"03\\/01\\/2022","payment":1117.5183343168644,"interet":0.6423803104723095,"capital":1116.875954006392,"balance":24578.34},{"period":"04\\/01\\/2022","payment":1117.5183343168644,"interet":0.6144584116221251,"capital":1116.9038759052423,"balance":23461.44},{"period":"05\\/01\\/2022","payment":1117.5183343168644,"interet":0.5865358147246138,"capital":1116.9317985021398,"balance":22344.51},{"period":"06\\/01\\/2022","payment":1117.5183343168644,"interet":0.5586125197621841,"capital":1116.9597217971022,"balance":21227.55},{"period":"07\\/01\\/2022","payment":1117.5183343168644,"interet":0.5306885267172448,"capital":1116.987645790147,"balance":20110.56},{"period":"08\\/01\\/2022","payment":1117.5183343168644,"interet":0.5027638355724515,"capital":1117.015570481292,"balance":18993.54},{"period":"09\\/01\\/2022","payment":1117.5183343168644,"interet":0.4748384463104616,"capital":1117.043495870554,"balance":17876.5},{"period":"10\\/01\\/2022","payment":1117.5183343168644,"interet":0.44691235891393083,"capital":1117.0714219579504,"balance":16759.43},{"period":"11\\/01\\/2022","payment":1117.5183343168644,"interet":0.4189855733650196,"capital":1117.0993487434994,"balance":15642.33},{"period":"12\\/01\\/2022","payment":1117.5183343168644,"interet":0.3910580896463847,"capital":1117.127276227218,"balance":14525.2},{"period":"01\\/01\\/2023","payment":1117.5183343168644,"interet":0.3631299077409302,"capital":1117.1552044091234,"balance":13408.04},{"period":"02\\/01\\/2023","payment":1117.5183343168644,"interet":0.33520102763081616,"capital":1117.1831332892336,"balance":12290.86},{"period":"03\\/01\\/2023","payment":1117.5183343168644,"interet":0.30727144929845235,"capital":1117.211062867566,"balance":11173.65},{"period":"04\\/01\\/2023","payment":1117.5183343168644,"interet":0.2793411727269897,"capital":1117.2389931441373,"balance":10056.41},{"period":"05\\/01\\/2023","payment":1117.5183343168644,"interet":0.2514101978983419,"capital":1117.266924118966,"balance":8939.14},{"period":"06\\/01\\/2023","payment":1117.5183343168644,"interet":0.223478524795412,"capital":1117.294855792069,"balance":7821.85},{"period":"07\\/01\\/2023","payment":1117.5183343168644,"interet":0.19554615340060974,"capital":1117.3227881634639,"balance":6704.53},{"period":"08\\/01\\/2023","payment":1117.5183343168644,"interet":0.16761308369659073,"capital":1117.3507212331679,"balance":5587.18},{"period":"09\\/01\\/2023","payment":1117.5183343168644,"interet":0.1396793156660113,"capital":1117.3786550011985,"balance":4469.8},{"period":"10\\/01\\/2023","payment":1117.5183343168644,"interet":0.11174484929103255,"capital":1117.4065894675734,"balance":3352.39},{"period":"11\\/01\\/2023","payment":1117.5183343168644,"interet":0.0838096845543103,"capital":1117.43452463231,"balance":2234.96},{"period":"12\\/01\\/2023","payment":1117.5183343168644,"interet":0.055873821438501184,"capital":1117.4624604954258,"balance":1117.5},{"period":"01\\/01\\/2024","payment":1117.5183343168644,"interet":0.027937259926261688,"capital":1117.490397056938,"balance":0.01}]',
                'vpm' => '2350.3963450961',
            ),
        ));
        
        
    }
}