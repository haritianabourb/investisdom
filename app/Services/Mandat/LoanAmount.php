<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class LoanAmount, hte loan amount calculation, show the amount of the rest to be financed
 *
 * calculation:
 *
 * iAMount = ht_amount + tax_free_charge + non_tax_free_charge + vehicle_matriculation_charge + investment_fee
 * aAmount = snc_amount + leaseholder_amount + subvention_amount
 *
 * loan_amount = iAmount - aAmount;
 *
 * @package App\Services\Mandat
 */
class LoanAmount extends AbstractField
{

    protected $name = "montant_compl_fin";
    protected $validations = [
        "montant_ht" => "required",
        "fraix_defiscalisable" => "nullable",
        "fraix_non_defiscalisable" => "nullable",
        "carte_grise" => "nullable",
        "apport_snc" => "nullable",
        "apport_locataire" => "nullable",
        "montant_subvention" => "nullable",
        "tva_investissement" => "nullable",
    ];

    /**
     * @return mixed the loan amount
     */
    public function process()
    {
        return $this->iAmount() - $this->aAmount();
    }

    /**
     * @return mixed all of the cost of the loan
     */
    private function iAmount()
    {
        return $this->parameters->get('montant_ht')
            + $this->parameters->get('fraix_defiscalisable')
            + $this->parameters->get('fraix_non_defiscalisable')
            + $this->parameters->get('carte_grise')
            + $this->parameters->get('tva_investissement');
    }

    /**
     * @return mixed all of contribution amount
     */
    private function aAmount()
    {

        return $this->parameters->get("apport_snc")
            + $this->parameters->get('apport_locataire')
            + $this->parameters->get("montant_subvention");
    }

}
