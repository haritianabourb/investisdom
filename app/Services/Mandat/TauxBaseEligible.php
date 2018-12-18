<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;

	/**
	 * Class TauxBaseEligible tax reduction percent
	 *
	 * calculation:
	 * tax_reduction_percent = snc_amount / tax_free_base
	 *
	 * @package App\Services\Mandat
	 */
	class TauxBaseEligible extends AbstractField
	{

		protected $name = "taux_base_eligible";

		public function process(){
			// FIXME what the hell is that pokemon!!!!
			return $this->parameters->get('apport_snc')/$this->parameters->get('base_defiscalisable');
		}

	}

	?>
