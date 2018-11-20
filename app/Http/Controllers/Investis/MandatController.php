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

    protected $validations = [
      "montant_ttc" => [
        "montant_ht" => "required",
      ],
    ];

    protected $calculationsServices = [
      "tva_npr" => \App\Services\Mandat\TVANPR::class,
      "tax_base" => \App\Services\Mandat\TaxBase::class,
      "ri_amount" => \App\Services\Mandat\RIAmount::class,
      "ht_amount" => \App\Services\Mandat\HTAmount::class,
      "ttc_amount" => \App\Services\Mandat\TTCAmount::class,
      "loan_amount" => \App\Services\Mandat\LoanAmount::class,
    ];

    protected $calculationsQueues = [
      "tax_base" => [
        "tva_npr",
      ],
      "ri_amount" => [
        "tax_base",
        "tva_npr",
      ],
      "ttc_amount" => [
        "ht_amount",
      ],
      "loan_amount" => [
        "ht_amount",
        "ttc_amount"
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
