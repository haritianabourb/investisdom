<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	/**
	 * Class All
	 * Serve all calculation process for mandat
	 * @package App\Services\Mandat
	 */
	class All extends AbstractField
	{

		protected $name = "all";

		/**
		 * serve only to return id, it's here in order to have all field processing before it
		 * @return mixed|string
		 */
		public function process(){
			return $this->parameters->get('identifiant') ?: '';

		}


	}

	?>
