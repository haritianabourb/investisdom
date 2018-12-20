<?php
return [

    // "calculate" => [
    "mandat" => [
        'services' => [
            "all" => \App\Services\Mandat\All::class,
            "apport_bd" => \App\Services\Mandat\ApportBD::class,
            "apport_net" => \App\Services\Mandat\NetIntake::class,
            "apport_investissement" => \App\Services\Mandat\ApportInvestissement::class,
            "base_defiscalisable" => \App\Services\Mandat\TaxBase::class,
            "cfe_tax" => \App\Services\Mandat\AnnexeFee::class,
            "echeance_loyer" => \App\Services\Mandat\TermPay::class,
            "echeance_loyer_ttc" => \App\Services\Mandat\TermPayTTC::class,
            "hono_jur" => \App\Services\Mandat\JuridicalFee::class,
            "interet" => \App\Services\Mandat\Interest::class,
            "montant_ht_mandat" => \App\Services\Mandat\HTAmount::class,
            "montant_reduction_impot" => \App\Services\Mandat\RIAmount::class,
            "montant_reduction_impot_percent" => \App\Services\Mandat\RIAmountPercent::class,
            "montant_total_loyer" => \App\Services\Mandat\TotalPay::class,
            "montant_total_tva" => \App\Services\Mandat\TotalVAT::class,
            "montant_ttc_mandat" => \App\Services\Mandat\TTCAmount::class,
            "montant_compl_fin" => \App\Services\Mandat\LoanAmount::class,
            "montant_ttc" => \App\Services\Mandat\TTCAmount::class,
            "numerateur_van" => \App\Services\Mandat\NumerateurVAN::class,
            "period" => \App\Services\Mandat\Period::class,
            "retrocession" => \App\Services\Mandat\Retrocession::class,
            "retrocession_net" => \App\Services\Mandat\RetrocessionNet::class,
            "schedule" => \App\Services\Mandat\Schedule::class,
            "taux_base_eligible" => \App\Services\Mandat\TauxBaseEligible::class,
            "taux_pret" => \App\Services\Mandat\TauxPret::class,
            "taux_retro" => \App\Services\Mandat\TauxRetrocession::class,
            "term_years" => \App\Services\Mandat\Term_Years::class,
            "tva_npr" => \App\Services\Mandat\TVANPR::class,
            "tva_loyer" => \App\Services\Mandat\TVALoyer::class,
            "tva_investissement" => \App\Services\Mandat\TVAInvestissement::class,
            "total_interet" => \App\Services\Mandat\TotalInterest::class,
            "van_paiement" => \App\Services\Mandat\VANPaiement::class,
            "vpm" => \App\Services\Mandat\VPM::class,
        ],

        "queues" => [
            "all" => [
                "apport_investissement",
                "apport_bd",
                "apport_net",
                "cfe_tax",
                "echeance_loyer_ttc",
                "hono_jur",
                "interet",
                "montant_reduction_impot_percent",
                "montant_total_tva",
                "montant_ttc_mandat",
                "numerateur_van",
                "retrocession",
                "retrocession_net",
                "taux_base_eligible",
                "taux_retro",
                "total_interet",
                "tva_loyer",
                "tva_npr",
                "van_paiement",
                "vpm",
            ],
            "apport_net" => [
                "montant_total_tva"
            ],
            "apport_bd" => [
                "apport_net",
                "base_defiscalisable",
            ],
            "apport_investissement" => [
                "montant_ht_mandat",
            ],
            "base_defiscalisable" => [
                "tva_npr",
            ],
            "echeance_loyer" => [
                "period",
                "taux_pret",
                "montant_compl_fin",
            ],
            "echeance_loyer_ttc" => [
                "echeance_loyer"
            ],
            "interet" => [
                "echeance_loyer"
            ],
//          "montant_compl_fin" => [
//            "tva_investissement"
//          ],
            "montant_total_tva" => [
                "tva_npr"
            ],
            "montant_reduction_impot" => [
                "base_defiscalisable",
            ],
            "montant_reduction_impot_percent" => [
                "montant_reduction_impot",
            ],
            "montant_ttc_mandat" => [
                "montant_ht_mandat",
            ],
            "montant_total_loyer" => [
                "term_years",
                "echeance_loyer",
            ],
            "numerateur_van" => [
                "van_paiement",
            ],
            "period" => [
                "term_years",
            ],
            "retrocession" => [
                "montant_reduction_impot",
                "van_paiement",
            ],
            "retrocession_net" => [
                "retrocession"
            ],
            "schedule" => [
                "montant_compl_fin"
            ],
            "taux_retro" => [
                "apport_bd",
            ],
            'taux_base_eligible' => [
                'base_defiscalisable'
            ],
            "total_interet" => [
                "montant_total_loyer",
            ],
            "tva_loyer" => [
                "echeance_loyer"
            ],
            "van_paiement" => [
                "schedule",
            ],
        ],
    ],
];
