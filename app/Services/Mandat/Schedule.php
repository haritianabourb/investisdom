<?php

namespace App\Services\Mandat;

use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;

	/**
	 * Class Schedule, loan amount planning schedule
	 *
	 * make it with the loan amount field paremeters
	 *
	 * return an array of field:
	 *	- 'payment' 	: payment at the period,
	 *	- 'interet' 	: interest of the loan payment,
	 *	- 'principal' : the real payment of the loan, equal to payment minus interest,
	 *	- 'balance' 	: rest of payment a this period,
	 *
	 * @package App\Services\Mandat
	 */
	class Schedule extends AbstractField
	{

		protected $name = "schedule";

		protected $validations = [
			"apport_locataire" => "nullable",
			"duree_pret" => "nullable",
			"taux_pret" => "nullable",
			"complement_financement" => "nullable",
		];

		/**
		 * @return array|mixed return the schedule of a period
		 */
		public function process(){

			$this->initSchedule();

			$schedule = array();

			//TODO Important!!! add the starting date for the period, in order to have a better payment
			array_push($schedule, array (
				'payment' 	=> (float)$this->parameters->get('apport_locataire'),
				'interet' 	=> 0,
				'principal' => 0,
				'balance' 	=> 0,
			));

			for($this->period = 1; $this->period <= $this->nbr_period; $this->period++){
				array_push($schedule, $this->calculate());
			}

			return $schedule;

		}

		/**
		 * init schedule variables
		 */
		private function initSchedule(){
			$this->terms = 12;
			$this->term_years = $this->parameters->get('duree_pret')/$this->terms;
			$this->nbr_period = $this->terms * $this->term_years;
			$this->taux_pret = $this->parameters->get('taux_pret');
			$this->montant_compl_fin = $this->parameters->get('montant_compl_fin');
			$this->echeance_loyer = $this->parameters->get('echeance_loyer');

		}

		/**
		 * @return array the loan payment summary at a period
		 */
		private function calculate()
		{

			if($this->parameters->get('complement_financement') == Funding::BANK){

				$interet = abs(Finance::ipmt($this->taux_pret, $this->period, $this->nbr_period,$this->montant_compl_fin, 0, false));
				$this->principal = abs(Finance::ppmt($this->taux_pret, $this->period, $this->nbr_period,$this->montant_compl_fin, 0, false));
				$this->balance = round(($this->balance ?? $this->montant_compl_fin) - $this->principal, 2);

			}

			if($this->parameters->get('complement_financement') == Funding::CASH){

				$interet = 0;
				$this->principal = round($this->echeance_loyer, 2);
				$this->balance = round($this->montant_compl_fin - ($this->period * $this->echeance_loyer), 2);

			}

			return array (
				'payment' 	=> $this->echeance_loyer,
				'interet' 	=> $interet,
				'principal' => $this->principal,
				'balance' 	=> $this->balance,
				);
		}

	}

	?>
