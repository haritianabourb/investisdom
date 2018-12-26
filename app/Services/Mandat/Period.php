<?php

namespace App\Services\Mandat;

use App\Services\Funding;
use App\Services\AbstractField;

/**
 * Class Period set the stack of a period, calculate from term years when it's a loan
 *
 * not really a calculation
 *
 * @package App\Services\Mandat
 */
class Period extends AbstractField
{

    protected $name = "period";
    protected $validations = [
        "duree_pret" => "required"
    ];

    /**
     * @return float|int|mixed the perion
     */
    public function process()
    {
        return $this->parameters->get('duree_pret');

    }

}
