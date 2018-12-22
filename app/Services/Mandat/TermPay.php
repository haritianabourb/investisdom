<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;
use MathPHP\Finance;

/**
 * Class TermPay the loan term calculation
 *
 * calculation is thrown to the MathPHP\Finance::pmt()
 * @package App\Services\Mandat
 */
class TermPay extends AbstractField
{

    protected $name = "echeance_loyer";
    protected $validations = [
        "duree_pret" => "required",
        "taux_pret" => "required"
    ];


    /**
     * @return float|int|mixed return the term pay value
     */
    public function process()
    {
//        dd();
        $rate = Finance::aer($this->parameters->get('taux_pret')/12/100, $this->parameters->get('duree_pret'));
        $echeance_loyer = Finance::pmt($this->parameters->get('taux_pret')/12/100, $this->parameters->get('duree_pret'), $this->parameters->get('montant_compl_fin'), 0, false);
        return abs($echeance_loyer);

    }

}
