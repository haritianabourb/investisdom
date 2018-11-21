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
					$item->addParameters($this->lastResult);
				}

				$result = $item->validate()? $item->process() : $item->errors();

				$this->return->put($key, $result);
				$this->lastResult = [$key => $item->validate() ? $result : null];

			});

			return $this->return;
		}


	}

	?>
