<?php

namespace App\Services\Mandat;

use App\Services\VAT;
use App\Services\Funding;
use App\Services\AbstractField;


	class Schedule extends AbstractField
	{

		protected $name = "schedule";

		public function process(){

			$this->initSchedule();
			$this->calculate();

			$schedule = array();
			if($this->parameters->get('complement_financement') == Funding::CASH){
				for($this->period = 1; $this->period <= $this->nbr_period; $this->period++){
					array_push($schedule, $this->calculate());

				}
			}
			else{
				while($this->balance > 0){
					array_push($schedule, $this->calculate());
					$this->loan_amount = $this->balance;
					$this->period--;
				}
			}

			return $schedule;

		}

		private function initSchedule(){
			$this->term_years = $this->parameters->get('duree_pret')/12;
			$this->terms = 12;

			if($this->parameters->get('complement_financement') == Funding::CASH){

				$this->period = 0;
				$this->nbr_period = $this->terms * $this->term_years;

			}else{

				$this->period = $this->nbr_period = $this->terms * $this->term_years;

			}

			$this->taux_pret = ($this->parameters->get('tx_pret')/100.0) / $this->terms;
			$this->loan_amount = $this->parameters->get('loan_amount');
			$this->term_pay = $this->parameters->get('term_pay');
		}

		private function calculate()
		{

			if($this->parameters->get('complement_financement') == Funding::BANK){

				$interest = round($this->loan_amount * $this->taux_pret, 3, PHP_ROUND_HALF_ODD);
				$this->principal = round($this->term_pay - $interest, 3, PHP_ROUND_HALF_ODD);
				$this->balance = round($this->loan_amount - $this->principal, 3, PHP_ROUND_HALF_ODD);

			}

			if($this->parameters->get('complement_financement') == Funding::CASH){

				$interest = 0;
				$this->principal = round($this->term_pay, 2);
				$this->balance = round($this->loan_amount - ($this->period * $this->principal), 2);

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
