<?php

namespace App\Http\Controllers\Investis;

use App\Contact;
use App\Events\User\CGPUserCreated;
use App\User;
use Illuminate\Http\Request;
use \App\CGP;
use PDF;
use Illuminate\Foundation\Bus\DispatchesJobs;;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CGPController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generatePDF(Request $request, CGP $cgp){
        $this->authorize('browse', $cgp);

        $data['nom'] = $cgp->name;
        $data['adresse'] = $cgp->address_1." ".($cgp->address_2?:"");
        $data['cgpville'] = $cgp->city;
        $data['cgpcp'] = $cgp->postal_code;

      $data['forme_juridique'] = $cgp->juridical_registration;
//      $data['immatriculation'] = $cgp->registrationEntitiesId->description;
      $data['immatriculation'] = $cgp->type_registration;
      $data['nom_representant'] = $cgp->contactId->firstname;
      $data['prenom'] = $cgp->contactId->lastname;

        $data['dateconvention'] = date ("d-m-Y");
        $data['fonction'] = $cgp->contact_status;
        $data['civilite'] = "M.";
        $data['siret'] = $cgp->registered_key;
        $data['capital'] = $cgp->capital;
        $data['lieu_immatriculation'] = $cgp->registration_city;
        $data['madate'] = date ("d-m-Y");
        $data['annee']=date("Y", strtotime(date ("d-m-Y")));

        $pdf = PDF::loadView('pdf.cgps.convention', $data);

        return $pdf->download('Contrat_de_partenariat_'.$cgp->name.'.pdf');
    }

}
