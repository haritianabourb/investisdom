<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;
use MathPHP\Finance;

	class Schedule extends AbstractField
	{

		protected $name = "schedule";

		public function process(){

			$this->initSchedule();
			// $this->calculate();

			$schedule = array();

			//DG : Apport locataire
			array_push($schedule, array (
				'payment' 	=> (float)$this->parameters->get('apport_locataire'),
				'interest' 	=> 0,
				'principal' => 0,
				'balance' 	=> 0,
			));

			for($this->period = 1; $this->period <= $this->nbr_period; $this->period++){
				array_push($schedule, $this->calculate());
			}

			return $schedule;

		}

		private function initSchedule(){
			$this->terms = 12;
			$this->term_years = $this->parameters->get('duree_pret')/$this->terms;
			$this->nbr_period = $this->terms * $this->term_years;
			$this->taux_pret = $this->parameters->get('taux_pret');
			$this->loan_amount = $this->parameters->get('loan_amount');
			$this->term_pay = $this->parameters->get('term_pay');

		}

		private function calculate()
		{

			if($this->parameters->get('complement_financement') == Funding::BANK){

				$interest = abs(Finance::ipmt($this->taux_pret, $this->period, $this->nbr_period,$this->loan_amount, 0, false));
				$this->principal = abs(Finance::ppmt($this->taux_pret, $this->period, $this->nbr_period,$this->loan_amount, 0, false));
				$this->balance = round(($this->balance ?? $this->loan_amount) - $this->principal, 2);

			}

			if($this->parameters->get('complement_financement') == Funding::CASH){

				$interest = 0;
				$this->principal = round($this->term_pay, 2);
				$this->balance = round($this->loan_amount - ($this->period * $this->term_pay), 2);

			}

			return array (
				'payment' 	=> $this->term_pay,
				'interest' 	=> $interest,
				'principal' => $this->principal,
				'balance' 	=> $this->balance,
				);
		}

	}

	?>
