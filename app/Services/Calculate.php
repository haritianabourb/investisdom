<?php

namespace App\Services;

use App\Services\FieldContract;

	class Calculate
	{
		private $collection;
		private $return;

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
				// dd($this->collection, $this->collection->last(), $item === $this->collection->last());
				//XXX show last
				$this->return->put($key, $item->validate()? $item->process() : $item->errors());
				if($item !== $this->collection->last() && $item->validate()){
					$this->collection->last()->addParameters([$key => $item->process()]);
				}

			});

			return $this->return;
		}


	}

	?>
