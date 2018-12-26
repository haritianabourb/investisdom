<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class RIAmount tax reduction amount
 *
 * calculation:
 * tax_free_amount * percent(tax_reduction_rate)
 *
 * @package App\Services\Mandat
 */
class RIAmount extends AbstractField
{

    protected $name = "montant_reduction_impot";

    protected $validations = [
        "ri_amount_type_id" => "required",
    ];

    /**
     * @return float|int|mixed the taxe reduction amount
     */
    public function process()
    {
        return $this->parameters->get('base_defiscalisable') * ($this->parameters->get('ri_amount_type_id') / 100);
    }

}
