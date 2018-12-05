<?php

namespace App\Http\Traits;

use \App\Services\CalculateBuilder;

trait HasFieldsToCalculate {

  protected $calculation;

  public function calculation(){
    return $this->calculation = $this->calculation ?? new CalculateBuilder($this->calculate_name);
  }

 public function calculateField($parameters = null, $field) {
   if(!is_null($parameters))$this->calculation()->setParameters($parameters);
   $this->validateField($field);
   // dd($this->calculation()->processCalculation($field));
   return $this->calculation()->processCalculation($field);
 }

 protected function validateField($field){
     if(!$this->calculation->validateField($field)){
       return response()
         ->json([
           'error' => "missing or incorect field calculation",
         ]);
     }
 }
}
