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
          "tax_base" => \App\Services\Mandat\TaxBase::class,
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
          "net_intake" => \App\Services\Mandat\NetIntake::class,
          "retrocession_net" => \App\Services\Mandat\RetrocessionNet::class,
          "all" => null
        ],

        "queues" => [
          "period" => [
            "term_years",
          ],
          "tax_base" => [
            "tva_npr",
          ],
          "total_vat" => [
            "tva_npr"
          ],
          "ri_amount" => [
            "tax_base",
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
          "net_intake" => [
            "total_vat"
          ],
          "retrocession_net" => [
            "retrocession"
          ],
          "all" => [
            "tva_npr",
            "interest",
            "total_interest",
            "net_intake",
            "retrocession",
            "retrocession_net",
          ],
        ],
      ],
];
