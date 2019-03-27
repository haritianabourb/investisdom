<?php

namespace App\Http\Controllers\Investis;

use Validator;
use \App\Mandat;
// use \App\Services\Calculate;
use \App\Http\Traits\HasFieldsToCalculate;
use Illuminate\Http\Request;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class MandatController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests, HasFieldsToCalculate;

    protected $calculate_name = "mandat";

    public function calculate(Request $request, Mandat $mandat, $field=null){

      $mandat = $request->all();
      $calculation = $this->calculateField($mandat, $field);
      $return = $calculation;

      return response()
        ->json([
          'field' => $field,
          'parameter' => request()->all(),
          'results' => collect($return->all()),
        ]);
    }

}
