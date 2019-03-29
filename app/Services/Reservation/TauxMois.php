<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 04/01/19
 * Time: 10:48
 */

namespace App\Services\Reservation;

use App\Contact;
use App\CGP;
use App\TauxCGP;
use App\TypeContrat;
use App\Services\AbstractField;
use Illuminate\Support\Facades\Auth;

class TauxMois extends AbstractField
{
    protected $name = "taux_mois";

    const TAUX_CONFORT = 0.216;
    const TAUX_SERENITE = 0.276;

    public function process()
    {

        $mandat_mois = $this->parameters->get('reservation_start')->format('n');
        $mandat_mois = "mois_$mandat_mois";


        $cgp_id = null;

        //TODO enter this as new calculation fields: CGP's ID;
        if(Auth::user()->hasRole(["cgps", "cgp"])){
            $contact = Contact::ofUser(Auth::user())->first();
            $cgp = CGP::ofContact($contact)->first();

            $cgp_id = $cgp->id;
        }else{
            $cgp_id = $this->parameters->get('cgps_id');
        }

        $tauxCGP = TauxCGP::ofYear($this->parameters->get('reservation_start')->year)
            ->where('cgps_id', $cgp_id)
            ->where('type_contrat_id', $this->parameters->get('type_contrats_id'))
            ->first();

        // FIXME the contract_type must be have a code section or an Id or a rate maybe
        $contract_type = TypeContrat::find($this->parameters->get('type_contrat_id'));

        if($tauxCGP){
            return $tauxCGP->$mandat_mois/100;
        }

        return 0;

    }


}