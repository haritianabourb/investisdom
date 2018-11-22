<?php

namespace App\Services;

use App\Services\FieldContract;

	class Calculate
	{
		private $collection;
		private $return;

		private $lastResult;

		public function __construct(){
			$this->collection = collect([]);
			$this->return = collect([]);
		}

		public function countFields(){
    	return $this->collection->count();
  	}

  	public function haveFields(){
    	return $this->collection->isNotEmpty();
  	}

		public function addField(FieldContract $field){
			// TODO add calculation queues to calculate
			$this->collection->put($field->name(), $field);
		}

		public function removeField(FieldContract $field){
			// TODO add calculation queues to calculate
			$this->collection->pull($field->name());
		}

		public function processCalculation(){
    	$this->collection->each(function($item, $key){
				if(!is_null($this->lastResult)){
					// Add Last Calculate Field In Next Calculations
					$item->addParameters($this->lastResult);
				}

				// If Validate, Calculate or send Errors
				$result = $item->validate()? $item->process() : $item->errors();
				if(!$item->validate()){
					dd($item->name(), $item->errors());
				}
				// Add this to the return variable
				$this->return->put($key, $result);

				//Add the last calculation on the results queue
				$this->lastResult[$key] = $item->validate() ? $result : null;

			});

			return $this->return->sortKeys();
		}


	}

	?>
