<?php

namespace App\Services;

use Illuminate\Support\Collection;
use Validator;

/**
 * Class AbstractField abstract field to follow calculation process, represent the field to calculate
 * @package App\Services
 */
abstract class AbstractField implements FieldContract{

    /**
     * @var string name : calulation name, serve the calculate configuration
     */
	protected $name;

    /**
     * @var array validations : validations rule in order to process the calculation
     */
	protected $validations = [];

    /**
     * @var  Collection parameters : Parameters of the calculation's process
     */
	protected $parameters;

    /**
     * AbstractField constructor.
     * @param array|\Traversable $parameters calculation variables
     */
	public function __construct(iterable $parameters = []){
		$this->parameters = Collection::make($parameters);
	}

    /**
     * @return string name
     */
	public function name(){
        if(is_null($this->name)) throw new \Error("This Class doesn't have a valid name");
		return $this->name;
	}

	/**
     * @return string name
     */
	public function parameters(){
		return $this->parameters;
	}

    /**
     * @return mixed field calculation processor
     */
	public abstract function process();

    /**
     * @return bool the calculation fields are validate or not
     */
	public function validate(){
		$this->validator = Validator::make($this->parameters->toArray(), $this->validations??[]);
		return !$this->validator->fails();
	}

    /**
     * @return mixed list errors of the validation
     */
	public function errors(){
		return $this->validator->errors();
	}


    /**
     * @param array|Traversable $parameters add parameters to the calculation
     */
	public function addParameters(iterable $parameters){
        collect($parameters)->each(function($item, $key){
            $this->parameters->put($key, $item);
        });
	}

    /**
     * @return array|bool return all validation field
     */
	public function validationsFields(){
		return array_keys($this->validations)?? false;
	}



}
