<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class VPM extends AbstractField
	{

		protected $name = "vpm";

		public function process(){
			// INVESTISSEMENT DE DEPART
			// Montant de l'emprunt
			$emprunt = $this->parameters->get('montant_compl_fin');
			$taux_pret = $this->parameters->get('taux_pret');
			$mensualite = $this->parameters->get('duree_pret');

			// dd($emprunt, $taux_pret, $mensualite);
			// $deno = (1-pow((1+$taux_pret),-$mensualite))/$taux_pret;
			$tauxAct = pow(1 + $taux_pret, -$mensualite);

			if((1 - $tauxAct) == 0){
				return 0;
			}

			$vpm = ( ($emprunt + $emprunt * $tauxAct) * $taux_pret / (1 - $tauxAct) ) / (1 + $taux_pret);
			return -$vpm;

		  // return $emprunt/$deno;
		}

		function CalculVPM($mensualite, $pourcent_annuel, $prix) {
			$t_mensuel=($pourcent_annuel/12)/100;
			$R=(1-pow((1+$t_mensuel),-$mensualite))/$t_mensuel;
			$VPM=(($prix)/$R);
			return $VPM;
		}
		function Calcul2VPM($mensualite2, $pourcent_annuel2, $prix2) {
			$tmensuel2=$prix2*(($pourcent_annuel2/12)/100)/(1-pow((1+$pourcent_annuel2/12),-($mensualite2)));
		}

		public function ha(){

			$mensualite=48; //exemple
			$pourcent_annuel=5.45;//exemple
			$prix=93600;//exemple
			$mensualite2=48;//exemple
			$pourcent_annuel2=5.45;//exemple
			$prix2=93600;//exemple

			$cout_mensuel=sprintf ("%.2f",CalculVPM($mensualite,$pourcent_annuel,$prix));
			
		}

	}

	?>
