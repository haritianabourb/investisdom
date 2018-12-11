<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class NetIntake extends AbstractField
	{

		protected $name = "apport_net";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('apport_snc') - $this->parameters->get('montant_total_tva');
		}

	}

	?>
