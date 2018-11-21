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
				for($this->period = 0; $this->period <= $this->nbr_period; $this->period++){
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
			// TODO deport this to parameters
			// get term periode in years
			$this->term_years = $this->parameters->get('duree_pret')/12;
			// $this->term_years = $parameters->nombre_periode/12;
			$this->terms = 12;
			// TODO show interest?
			if($this->parameters->get('complement_financement') == Funding::CASH){
				$this->period = $this->nbr_period =$this->parameters->get('nbr_period');
			}else{
				$this->period = $this->nbr_period = $this->terms * $this->term_years;
			}
			$this->taux_pret = ($this->parameters->get('tx_pret')/100.0) / $this->terms;
			$this->loan_amount = $this->parameters->get('loan_amount');

		}

		private function calculate()
		{

			if($this->parameters->get('complement_financement') == Funding::BANK){
				// dd($this->taux_pret, $this->period);
				$deno = 1.0 - 1.0 / pow((1+ $this->taux_pret),$this->period);
				$this->term_pay = ($this->loan_amount * $this->taux_pret) / $deno;


				$interest = round($this->loan_amount * $this->taux_pret, 2);

				$this->principal = round($this->term_pay - $interest, 2);

				$this->balance = round($this->loan_amount - $this->principal, 2);
				// dd($deno, $this->term_pay, $interest, $this->principal, $this->balance);
			}

			if($this->parameters->get('complement_financement') == Funding::CASH){

				$this->term_pay = $this->loan_amount/$this->period;

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
