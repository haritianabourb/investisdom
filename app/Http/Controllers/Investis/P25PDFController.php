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

class P25PDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){
        $data['LOCATAIRE_RAISON_SOCIALE']='LOCATAIRE_RAISON_SOCIALE';
        $data['FORME_JURIDIQUE']='SARL';
        $data['CAPITAL']='1000';
        $data['ADRESSE']='ADRESSE';
        $data['CP']='97434';
        $data['VILLE']='VILLE';
        $data['RSCRM_LONG']='RSCRM_LONG';
        $data['RCS_VILLE']='RCS_VILLE';
        $data['SIREN']='512831918';
        $data['CIVILITE']='Monsieur';
        $data['NOM']='MILLET';
        $data['PRENOM']='PRENOM';
        $data['SNC']='MARVIC 128';
        $data['SIREN_SNC']='SIREN_SNC';
        $data['MATERIEL']='MATERIEL';
        $data['MONTANT_HT_HORS_FRAIS']='MONTANT_HT_HORS_FRAIS';
        $data['N_DOSSIER']='N_DOSSIER';
        $data['LOCATAIRE_SIGLE']='LOCATAIRE_SIGLE';
        $data['APPORT_SNC_NET_DE_TVA']='THE BIG NUMBER';
        $data['RESTE_A_FINANCER_NET']='RESTE_A_FINANCER_NET';
        $data['APPORT_LOCATAIRE']='APPORT_LOCATAIRE';
        $data['TVA_NPR']='TVA_NPR';
        $data['DATE_DE_CONTRAT']='DATE';





        //return view('pdf.p_25_cv.p_25_cv', $data);
        $pdf = PDF::loadView('pdf.p_25_cv.p_25_cv',
            $data);

        return $pdf->download('p_25_cv.pdf');

    }

}
