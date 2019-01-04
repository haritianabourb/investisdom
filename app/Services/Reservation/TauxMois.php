<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\TauxCGP;
use App\Services\AbstractField;

class TauxMois extends AbstractField
{
    protected $name = "taux_mois";

    const TAUX_CONFORT = 0.216;
    const TAUX_SERENITE = 0.276;

    public function process()
    {
        // TODO: Implement process() method.
//        return $this->parameters->get('identifiant') ?: '';

        $mandat_mois = $this->parameters->get('reservation_start')->month;
        $mandat_mois = "mois_$mandat_mois";


        $tauxCGP = TauxCGP::ofYear($this->parameters->get('reservation_start')->year)
            ->where('cgps_id', $this->parameters->get('cgps_id'))
            ->where('type_contrat_id', $this->parameters->get('type_contrat_id'))
            ->first();

        return $tauxCGP? $tauxCGP->$mandat_mois/100 : 0.216;
    }


}