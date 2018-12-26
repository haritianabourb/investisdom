<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class HTAmount, represent the total amount for a project
 *
 * calculation:
 * total_ht_amount = ht_amount + tax_free_charge + non_tax_free_charge + vehicle_matriculation_charge
 *
 * @package App\Services\Mandat
 */
class HTAmount extends AbstractField
{

    protected $name = "montant_ht_mandat";

    protected $validations = [
        "montant_ht" => "required",
        "fraix_defiscalisable" => "nullable",
        "fraix_non_defiscalisable" => "nullable",
        "carte_grise" => "nullable",
    ];

    /**
     * @return mixed the HT Amount
     */
    public function process()
    {
        return $this->parameters->get('montant_ht')
            + $this->parameters->get('fraix_defiscalisable')
            + $this->parameters->get('fraix_non_defiscalisable')
            + $this->parameters->get('carte_grise');
    }

}