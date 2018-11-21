<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class NetIntake extends AbstractField
	{

		protected $name = "net_intake";
		// protected $validations = [
		// 	"complement_financement" => "required",
		// 	"taux_pret" => "required",
		// 	"period" => "required"
		// ];

		public function process(){
			return $this->parameters->get('apport_snc') - $this->parameters->get('total_vat');
		}

	}

	?>
