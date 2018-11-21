<?php

namespace App\Http\Controllers\Investis;

use Validator;
use \App\Mandat;
use \App\Services\Calculate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MandatController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    protected $calculationsServices = [
      "term_years" => \App\Services\Mandat\Term_Years::class,
      "period" => \App\Services\Mandat\Period::class,
      "taux_pret" => \App\Services\Mandat\TauxPret::class,
      "tva_npr" => \App\Services\Mandat\TVANPR::class,
      "tax_base" => \App\Services\Mandat\TaxBase::class,
      "ri_amount" => \App\Services\Mandat\RIAmount::class,
      "ht_amount" => \App\Services\Mandat\HTAmount::class,
      "ttc_amount" => \App\Services\Mandat\TTCAmount::class,
      "loan_amount" => \App\Services\Mandat\LoanAmount::class,
      "term_pay" => \App\Services\Mandat\TermPay::class,
      "term_pay_ttc" => \App\Services\Mandat\TermPayTTC::class,
      "interest" => \App\Services\Mandat\Interest::class,
    ];

    protected $calculationsQueues = [
      "period" => [
        "term_years",
      ],
      "tax_base" => [
        "tva_npr",
      ],
      "ri_amount" => [
        "tva_npr",
        "tax_base",
      ],
      "ttc_amount" => [
        "ht_amount",
      ],
      "loan_amount" => [
        "ht_amount",
        "ttc_amount"
      ],
      "term_pay" => [
        "taux_pret",
        "ht_amount",
        "ttc_amount",
        "loan_amount",
      ],
      "term_pay_ttc" => [
        "taux_pret",
        "ht_amount",
        "ttc_amount",
        "loan_amount",
        "term_pay"
      ],
      "interest" => [
        "taux_pret",
        "ht_amount",
        "ttc_amount",
        "loan_amount",
        "term_pay"
      ]
    ];

    public function calculate(Request $request, $field=null){

      $mandat = $request->all();
      $calculation = new Calculate();

      // XXX Instanciation
      if(is_null($field)){
        return response()
          ->json([
            'error' => "missing field calculation",
          ]);
      }

      if(!array_has($this->calculationsServices, $field)){
        return response()
          ->json([
            'error' => "{$field} is not a calculate field"
          ]);
      }

      // XXX Pre-proccessing
      if(array_has($this->calculationsQueues, $field)){
        foreach ($this->calculationsQueues[$field] as $field_queue) {
          $calculation->addField(new $this->calculationsServices[$field_queue]($mandat));
        }
      }

      $calculation->addField(new $this->calculationsServices[$field]($mandat));
      $return = $calculation->processCalculation();

      return response()
        ->json([
          'field' => $field,
          'parameter' => request()->all(),
          'results' => collect($return->all()),
        ]);
    }

}
