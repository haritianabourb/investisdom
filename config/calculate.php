<?php
return [

    // "calculate" => [
      "mandat" => [
        'services' => [
          "term_years" => \App\Services\Mandat\Term_Years::class,
          "period" => \App\Services\Mandat\Period::class,
          "taux_pret" => \App\Services\Mandat\TauxPret::class,
          "tva_npr" => \App\Services\Mandat\TVANPR::class,
          "tva_loyer" => \App\Services\Mandat\TVALoyer::class,
          "montant_total_tva" => \App\Services\Mandat\TotalVAT::class,
          "base_defiscalisable" => \App\Services\Mandat\TaxBase::class,
          "apport_bd" => \App\Services\Mandat\ApportBD::class,
          "apport_investissement" => \App\Services\Mandat\ApportInvestissement::class,
          "montant_reduction_impot" => \App\Services\Mandat\RIAmount::class,
          "montant_reduction_impot_percent" => \App\Services\Mandat\RIAmountPercent::class,
          "montant_ht_mandat" => \App\Services\Mandat\HTAmount::class,
          "montant_ttc_mandat" => \App\Services\Mandat\TTCAmount::class,
          "montant_compl_fin" => \App\Services\Mandat\LoanAmount::class,
          "echeance_loyer" => \App\Services\Mandat\TermPay::class,
          "echeance_loyer_ttc" => \App\Services\Mandat\TermPayTTC::class,
          "interet" => \App\Services\Mandat\Interest::class,
          "montant_total_loyer" => \App\Services\Mandat\TotalPay::class,
          "total_interet" => \App\Services\Mandat\TotalInterest::class,
          "cfe_tax" => \App\Services\Mandat\AnnexeFee::class,
          "hono_jur" => \App\Services\Mandat\JuridicalFee::class,
          "schedule" => \App\Services\Mandat\Schedule::class,
          "van_paiement" => \App\Services\Mandat\VANPaiement::class,
          "numerateur_van" => \App\Services\Mandat\NumerateurVAN::class,
          "vpm" => \App\Services\Mandat\VPM::class,
          "retrocession" => \App\Services\Mandat\Retrocession::class,
          "apport_net" => \App\Services\Mandat\NetIntake::class,
          "taux_retro" => \App\Services\Mandat\TauxRetrocession::class,
          "taux_base_eligible" => \App\Services\Mandat\TauxBaseEligible::class,
          "retrocession_net" => \App\Services\Mandat\RetrocessionNet::class,
          "all" => \App\Services\Mandat\All::class,
        ],

        "queues" => [
          "period" => [
            "term_years",
          ],
          "base_defiscalisable" => [
            "tva_npr",
          ],
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
          "montant_total_loyer" => [
            "term_years",
            "echeance_loyer",
          ],
          "tva_loyer" => [
            "echeance_loyer"
          ],
          "total_interet" => [
            "montant_total_loyer",
          ],
          "schedule" => [
            "montant_compl_fin"
          ],
          "van_paiement" => [
            "schedule",
          ],
          "numerateur_van" => [
            "van_paiement",
          ],
          "retrocession" => [
            "montant_reduction_impot",
            "van_paiement",
          ],
          "apport_net" => [
            "montant_total_tva"
          ],
          "retrocession_net" => [
            "retrocession"
          ],
          "apport_bd" => [
            "montant_reduction_impot",
            "base_defiscalisable",
          ],
          "apport_investissement" => [
            "montant_ht_mandat",
          ],
          "taux_retro" => [
            "apport_bd",
          ],
          'taux_base_eligible' => [
            'base_defiscalisable'
          ],
          "all" => [
            "tva_npr",
            "echeance_loyer_ttc",
            "hono_jur",
            "cfe_tax",
            "montant_reduction_impot_percent",
            "interet",
            "total_interet",
            "apport_net",
            "van_paiement",
            "numerateur_van",
            "vpm",
            "tva_loyer",
            "apport_bd",
            "apport_investissement",
            "taux_retro",
            "taux_base_eligible",
            "retrocession",
            "retrocession_net",
          ],
        ],
      ],
];