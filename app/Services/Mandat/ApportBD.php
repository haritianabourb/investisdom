<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;

	/**
	 * Class ApportBD, report the Tax Exemption Base
	 *
	 * calculation:
	 * tax_exemption_base = net_amount / tax_exemption
	 *
	 * @package App\Services\Mandat
	 */
	class ApportBD extends AbstractField
	{

		protected $name = "apport_bd";

		/**
		 * @return float|int|mixed the Tax Exemption Base
		 */
		public function process(){
			return $this->parameters->get('apport_net')/$this->parameters->get('base_defiscalisable');
		}

	}

	?>
