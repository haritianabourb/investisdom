<?php

namespace App\Http\Traits;

use \App\Services\Calculate;

trait HasFieldsToCalculate {

 public function calculateField($parameters, $field) {
   $calculation = new Calculate();

   $this->validateField($field);

   $fields_queue = $this->preProcessing($field);

   foreach ($fields_queue as $field_queue) {
     if(!is_null($service = config("calculate.{$this->calculate_name}.services.{$field_queue}")))
     // dd($services);
     // if(!is_null($this->calculationsServices[$field_queue]))
       $calculation->addField(new $service($parameters));
   }
   return $calculation->processCalculation();
 }

 private function preProcessing($field, $fieldsToProcessing = []){

   // dd(config("calculate.{$this->calculate_name}.queues"));

   if(array_has($pool = config("calculate.{$this->calculate_name}.queues"), $field)){
     // dd($queue[$field]);
     foreach ($pool[$field] as $field_queue) {
       $fieldsToProcessing = $this->preProcessing($field_queue, $fieldsToProcessing);
     }
   }
   $fieldsToProcessing[] = $field;
   return $fieldsToProcessing;
 }

 protected function validateField($field){
     if(is_null($field)){
       return response()
         ->json([
           'error' => "missing field calculation",
         ]);
     }

     if(!array_has(config("calculate.{$this->calculate_name}.services"), $field)){
       return response()
         ->json([
           'error' => "{$field} is not a calculate field"
         ]);
     }
 }
}
