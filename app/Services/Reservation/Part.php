<?php


namespace App\Services\Reservation;


use App\Services\AbstractField;

class Part extends AbstractField
{

    protected $name = "part";

    /**
     * @return mixed field calculation processor
     */
    public function process()
    {
        // TODO: Implement process() method.

        $mtn_reduction = $this->parameters->get('montant_reduction');

        $part = ceil($mtn_reduction / 100.0);
        return $part;
    }
}
