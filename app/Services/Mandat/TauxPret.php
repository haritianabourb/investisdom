<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class TauxPret, represent a monthly loan rate,
 *
 * ex: if the tax rate is 12%, the monthly rate is 1%
 *
 * calculation:
 *
 * percent(loan_rate) / yearly_month_number*
 *
 * *yearly_month_number = 12
 *
 * @package App\Services\Mandat
 */
class TauxPret extends AbstractField
{

    protected $name = "taux_pret";
    protected $validations = [
        "tx_pret" => "required"
    ];

    /**
     * @return float|int|mixed the monthly tax rate
     */
    public function process()
    {
        // FIXME URGENTLY!!! rename this f***ing "tx_pret" variable name, it's a mess!!!
        return ($this->parameters->get('tx_pret') / 100.0) / 12;
    }

}
