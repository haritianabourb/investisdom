<?php

namespace App\Services;

use App\Services\FieldContract;

	class CalculateBuilder
	{

		protected $calculate;
		protected $name;
		protected $parameters;

		public function __construct($name = null, array $parameters = []){
			//TODO make unique to operate
			$this->name = $name;
			$this->parameters = collect($parameters);
		}

		public function name(){
			return $this->name;
		}

		public function calculate(){
			return $this->calculate = $this->calculate ?? new Calculate();
		}

		public function countFields(){
    	return $this->calculate()->countFields();
  	}

  	public function haveFields(){
    	return $this->calculate()->haveFields();
  	}

		public function addField($field, $withQueue = true){
			if($field = $this->validateField($field)){
				if($withQueue){
						$this->queueField($field);
				}
				// dd($field);
				// TODO add calculation queues to calculate
				$this->calculate()->addField($field);
				return true;
			}

			return false;
		}

		public function removeField($field, $withQueue){
			$this->calculate->removeField($field);
		}

		public function setParameters($parameters = []){
			$this->parameters = collect($parameters);
		}

		public function processCalculation($field){
			if($this->addField($field)){
				return $this->calculate()->processCalculation($field);
			}

			return null;
		}

		public function queueField($field) {
			$fields_queue = $this->preProcessing($field);


			foreach ($fields_queue as $field_queue) {
			  if(!is_null($field_queue))
				$this->addField($field_queue->name(), false);
			}

		}

		public function preProcessing($field, $fieldsToProcessing = []){
	    try {

		    if(array_has($pool = config("calculate.{$this->name()}.queues"), $field->name())){
					// dump($pool[$field->name()]);
		      foreach ($pool[$field->name()] as $field_queue) {
						$field_queue = $this->validateField($field_queue);
						if(!$this->parameters->has("manual_{$field_queue->name()}") || ($this->parameters->has("manual_{$field_queue->name()}") && ($this->parameters->get("manual_{$field_queue->name()}") === "false"))){
							$fieldsToProcessing = $this->preProcessing($field_queue, $fieldsToProcessing);
						}
		      }
		    }

			} catch (\Error $e) {
	    		dump(['error' => "an error occur on the calculation", "field" => $field->name(), $pool[$field->name()]]);
				return ['error' => "an error occur on the calculation", "field" => $field->name()];
			}
	    $fieldsToProcessing[] = $field;
	    return $fieldsToProcessing;
	  }

		public function validateField($field){
				if(is_null($field)){
					// TODO error bag
					return false;
				}
				if(!array_has($fieldService = config("calculate.{$this->name()}.services"), $field)){
					// TODO error bag
					return false;
				}

				// dd(new $fieldService[$field]($this->parameters->toArray()));
				// dd($fieldService, $field, $this->parameters, $fieldService[$field]);
				return $fieldService[$field] ? new $fieldService[$field]($this->parameters->toArray()): false;
		}

	}

	?>
