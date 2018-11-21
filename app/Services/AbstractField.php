<?php

namespace App\Services;

use Validator;

abstract class AbstractField implements FieldContract{

	protected $name;
	protected $validations = [];

	public function __construct($parameters = null){
		$this->parameters = collect([]);
		$this->addParameters($parameters);
		if(is_null($this->name())) throw new \Error("This Class doesn't have a valid name");
	}

	public function name(){
		return $this->name;
	}

	public function validate(){
		// XXX Validation
		$this->validator = Validator::make($this->parameters->toArray(), $this->validations??[]);
		return !$this->validator->fails();
	}

	public function errors(){
		return $this->validator->errors();
	}

	public function addParameters($parameters){
		if(is_array($parameters)){
			collect($parameters)->each(function($item, $key){
				$this->parameters->put($key, $item);
			});
		}
	}

	public function validationsFields(){
		return array_keys($this->validations)?? false;
	}



}
