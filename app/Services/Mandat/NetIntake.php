<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class NetIntake, represent the net intake
 *
 * calculation:
 * net_intake = snc_amount - total_tax_amount
 *
 * @package App\Services\Mandat
 */
class NetIntake extends AbstractField
{

    protected $name = "apport_net";
    protected $validations = [
        "apport_snc",
    ];

    public function process()
    {
        return $this->parameters->get('apport_snc') - $this->parameters->get('montant_total_tva');
    }

}

