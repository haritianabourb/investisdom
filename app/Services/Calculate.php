<?php

namespace App\Services;

use Illuminate\Support\Collection;

class Calculate
{
    private $collection;
    private $return;

    private $lastResult;

    public function __construct()
    {
        //TODO make unique to operate
        $this->collection = collect([]);
        $this->return = collect([]);

    }

    /**
     * @return int fields in calculation
     */
    public function countFields() : int
    {
        return $this->collection->count();
    }

    /**
     * if have fields or not, I know it's some repetitive, but they talk to me about precise documentation
     * @return bool if have fields or not
     */
    public function haveFields() : bool
    {
        return $this->collection->isNotEmpty();
    }

    public function addField(FieldContract $field)
    {
        // TODO add calculation queues to calculate
        $this->collection->put($field->name(), $field);
    }

    public function removeField(FieldContract $field)
    {
        // TODO add calculation queues to calculate
        $this->collection->pull($field->name());
    }

    /**
     * Here we go
     * @return \Illuminate\Support\Collection
     * @throws \Exception the json translated errors
     */
    public function processCalculation() : Collection
    {
        $this->collection->each(function ($item, $key) {
            if (!is_null($this->lastResult)) {
                // Add Last Calculate Field In Next Calculations
                $item->addParameters($this->lastResult);
            }

            // If Validate, Calculate or send Errors
            $result = $item->validate() ? $item->process() : $item->errors();
            if (!$item->validate()) {
                throw new \Exception(json_encode([$item->name() => $item->errors()]));
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
