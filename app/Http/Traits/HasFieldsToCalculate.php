<?php

namespace App\Http\Traits;

use \App\Services\CalculateBuilder;

trait HasFieldsToCalculate {

  protected $calculation;

  public function calculation(){
    return $this->calculation = $this->calculation ?? new CalculateBuilder($this->calculate_name);
  }

 public function calculateField($parameters = null, $field) {
   if(!is_null($parameters))
        $this->calculation()->setParameters($parameters);
     try{
         $this->validateField($field);
        return $this->calculation()->processCalculation($field);
     }catch(\Exception $e){
         return collect(json_decode($e->getMessage()) ?? $e->getMessage());
     }
 }

 protected function validateField($field){
        if(!$this->calculation->validateField($field)) throw new \Exception("error on field $field");
 }
}
