<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use \App\CGP;
use PDF;
use Voyager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ELCLPDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['N_DOSSIER'] = '1812012';
        $data['SNC'] = 'MARVEL';
        $data['SIREN_SNC'] = 'SIREN SNC';
        $data['LOCATAIRE_RAISON_SOCIALE'] = '$LOCATAIRE_RAISON_SOCIALE';
        $data['ADRESSE'] = '$$ADRESSE';
        $data['CP'] = '$CP';
        $data['VILLE'] = '$VILLE';
        $data['RSCRM_LONG'] = 'RSCRM';
        $data['RSC_VILLE'] = '$RSC_VILLE';
        $data['SIREN'] = 'SIREN';
        $data['CIVILITE'] = 'CIVILITE';
        $data['NOM'] = 'NOM';
        $data['PRENOM'] = 'PRENOM';
        $data['TITRE'] = 'TITRE';
        $data['MONTANT_TTC'] = 'MONTANT_TTC';
        $data['MATERIAL'] = '$MATERIAL';
        $data['TAUX_RI'] = 'TAUX RI';
        $data['MATERIEL_PERCENTAGE']='44.12';
        $data['LOCATAIRE_PERCENTAGE']='$LOCATAIRE_PERCENTAGE';
        $data['APPORT_SNC']='$APPORT_SNC';
        $data['DUREE'] = 'DUREE';
        $data['ANNEE_INVEST'] = 'ANNEE_INVEST';
        $data['APPORT_LOCATAIRE'] = '5000';
        $data['ECHEANCE_LOYER_HT'] = '490';
        $data['LOYER_TTC'] = '551.5';
        $data['DATE_DE_CONTRAT'] = 'DATE';
        $data['TVA_TOTALE_LOYERS'] = '2499';
        $data['FORME_JURIDIQUE'] = '$FORME_JURIDIQUE';



        return view('pdf.02_el_cl.02_el_cl', $data);
        $pdf = PDF::loadView('pdf.02_el_cl.02_el_cl', $data);

        return $pdf->download('el_cl.pdf');

    }

}
