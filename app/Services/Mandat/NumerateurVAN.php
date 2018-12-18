<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class NumerateurVAN, show the NPV amount numerator
 *
 * calculation:
 * npv_numerator = ri_amount - vpm
 *
 * @package App\Services\Mandat
 */
class NumerateurVAN extends AbstractField
{

    protected $name = "numerateur_van";

    /**
     * @return mixed the vpm numerator
     */
    public function process()
    {

        // FIXME show of this if it has a problem, why numerator when vpm are calculate from another external package ???
        // I think this can be removed, show the MathPHP::financial package
        return $this->parameters->get('base_defiscalisable') - $this->parameters->get('van_paiement');
    }

}

