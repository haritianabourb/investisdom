<?php

namespace App\Services\Mandat;

use App\Services\AbstractField;
use MathPHP\Finance;
use Carbon\Carbon;

/**
 * Class VANPaiement, the NPV of the project, deffered the calculation to MathPHP\Finance package
 * @package App\Services\Mandat
 */
class VANPaiementDRFIP extends AbstractField
{

//    protected $name = "van_paiement_drfip";
    protected $name = "van_paiement";

    public function process()
    {

        $cashflows = $this->parameters->get('schedule');

        $npv = [];
        $dates = [];

         array_push($npv, $this->parameters->get('apport_locataire'));
         array_push($dates, $cashflows[0]['period']);
        foreach ($cashflows as $k => $cf) {
            if ($k == 0) continue;
            // CALCUL DU VAN POUR CHAQUE PERIODE
            array_push($npv, $cf['payment']);
            array_push($dates, $cf['period']);
        }

        return $this->xnpv($this->parameters->get('taux_pret')/100, $npv, $dates);

    }

    private function xnpv(float $rate, array $values, array $dates): float
    {
        $result = 0.0;

        $date0  = Carbon::createFromFormat("m/d/Y", $dates[0]);

        $dateDiff = [];

        for ($i = 0; $i < count($values); $i++) {
            $dateI  = Carbon::createFromFormat("m/d/Y", $dates[$i]);
            if($dateI->isLeapYear() && $dateI->month == 3){
                array_push($dateDiff, $dateI->diffInDays($date0)-1);
            }
            else{
                array_push($dateDiff, $dateI->diffInDays($date0));
            }

            $result += $values[$i] / pow(1 + $rate, ($dateDiff[$i]/365));
//            dump($result);
        }

        return $result;
    }




}
