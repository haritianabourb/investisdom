<?php
return [

    // "calculate" => [
      "mandat" => [
        'services' => [
          "term_years" => \App\Services\Mandat\Term_Years::class,
          "period" => \App\Services\Mandat\Period::class,
          "taux_pret" => \App\Services\Mandat\TauxPret::class,
          "tva_npr" => \App\Services\Mandat\TVANPR::class,
          "total_vat" => \App\Services\Mandat\TotalVAT::class,
          "base_defiscalisable" => \App\Services\Mandat\TaxBase::class,
          "apport_bd" => \App\Services\Mandat\ApportBD::class,
          "apport_investissement" => \App\Services\Mandat\ApportInvestissement::class,
          "ri_amount" => \App\Services\Mandat\RIAmount::class,
          "ht_amount" => \App\Services\Mandat\HTAmount::class,
          "ttc_amount" => \App\Services\Mandat\TTCAmount::class,
          "loan_amount" => \App\Services\Mandat\LoanAmount::class,
          "term_pay" => \App\Services\Mandat\TermPay::class,
          "term_pay_ttc" => \App\Services\Mandat\TermPayTTC::class,
          "interest" => \App\Services\Mandat\Interest::class,
          "total_pay" => \App\Services\Mandat\TotalPay::class,
          "total_interest" => \App\Services\Mandat\TotalInterest::class,
          "annexe_fee" => \App\Services\Mandat\AnnexeFee::class,
          "juridical_fee" => \App\Services\Mandat\JuridicalFee::class,
          "schedule" => \App\Services\Mandat\Schedule::class,
          "van_paiement" => \App\Services\Mandat\VANPaiement::class,
          "retrocession" => \App\Services\Mandat\Retrocession::class,
          "apport_net" => \App\Services\Mandat\NetIntake::class,
          "taux_retrocession" => \App\Services\Mandat\TauxRetrocession::class,
          "retrocession_net" => \App\Services\Mandat\RetrocessionNet::class,
          "all" => null
        ],

        "queues" => [
          "period" => [
            "term_years",
          ],
          "base_defiscalisable" => [
            "tva_npr",
          ],
          "total_vat" => [
            "tva_npr"
          ],
          "ri_amount" => [
            "base_defiscalisable",
          ],
          "ttc_amount" => [
            "ht_amount",
          ],
          "loan_amount" => [
            "ttc_amount"
          ],
          "term_pay" => [
            "period",
            "taux_pret",
            "loan_amount",
          ],
          "term_pay_ttc" => [
            "term_pay"
          ],
          "interest" => [
            "term_pay"
          ],
          "total_pay" => [
            "term_years",
            "term_pay",
          ],
          "total_interest" => [
            "total_pay",
          ],
          "schedule" => [
            "loan_amount"
          ],
          "van_paiement" => [
            "schedule",
          ],
          "retrocession" => [
            "ri_amount",
            "van_paiement",
          ],
          "apport_net" => [
            "total_vat"
          ],
          "retrocession_net" => [
            "retrocession"
          ],
          "apport_bd" => [
            "ri_amount",
            "base_defiscalisable",
          ],
          "apport_investissement" => [
            "ht_amount",
          ],
          "taux_retrocession" => [
            "apport_bd",
          ],
          "all" => [
            "tva_npr",
            "term_pay_ttc",
            "juridical_fee",
            "annexe_fee",
            "interest",
            "total_interest",
            "apport_net",
            "van_paiement",
            "apport_bd",
            "apport_investissement",
            "taux_retrocession",
            "retrocession",
            "retrocession_net",
          ],
        ],
      ],
];
