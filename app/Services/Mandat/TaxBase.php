<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

/**
 * Class TaxBase, represent tax free amount, in order to calculate the tax reduction
 *
 * calculation:
 *
 * iAMount = ht_amount + tax_free_charge
 * aAmount = npr_vat + subvention_amount + replacement_amount*
 *
 * loan_amount = iAmount - aAmount;
 *
 * *replacement_amount : it's add to the calculation only if the replacement of the material is a normal process
 *
 * @package App\Services\Mandat
 */
class TaxBase extends AbstractField
{

    protected $name = "base_defiscalisable";
    protected $validations = [
        "montant_ht" => "required",
        "fraix_defiscalisable" => "nullable",
        "montant_subvention" => "nullable",
        "deduction_base" => "nullable",
        "is_remplacement" => "nullable",
        "renouvellement" => "required_if:is_remplacement,true|nullable",
        "montant_remplacement" => "nullable"
    ];

    /**
     * @return float|mixed return the tax free amount
     */
    public function process()
    {

//			$isReplacement = $this->parameters->get('is_remplacement') === "true" ? true : false;
//
//			return (
//					$this->parameters->get('montant_ht')
//				+ $this->parameters->get('fraix_defiscalisable')
//			) - (
//					$this->parameters->get('tva_npr')
//				 + $this->parameters->get('montant_subvention')
//				+ floatval($isReplacement && ($this->parameters->get('renouvellement') == 1) ? $this->parameters->get('montant_remplacement') : 0)
//			);

        return $this->iAmount() - $this->aAmount();

    }

    /**
     * @return mixed the amount fields necessary for the calculation
     */
    private function iAmount()
    {
        return $this->parameters->get('montant_ht')
            + $this->parameters->get('fraix_defiscalisable');
    }

    /**
     * @return float the out of tax exemption values
     */
    private function aAmount()
    {
        $isReplacement = $this->parameters->get('is_remplacement') === "true" ? true : false;

        return $this->parameters->get('tva_npr')
            + $this->parameters->get('montant_subvention')
            + floatval($isReplacement && ($this->parameters->get('renouvellement') == 1) ? $this->parameters->get('montant_remplacement') : 0);
    }
}

