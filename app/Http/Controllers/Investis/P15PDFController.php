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

class P15PDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['N_DOSSIER']='N_DOSSIER';
        $data['SNC'] = 'SNC';
        $data['CIVILITE'] = 'CIVILITE';
        $data['PRENOM'] = 'PRENOM';
        $data['TITRE'] = 'TITRE';
        $data['LOCATAIRE_RAISON_SOCIALE'] = '$LOCATAIRE_RAISON_SOCIALE';
        $data['FORME_JURIDIQUE'] = 'EL';
        $data['ADRESSE']='ADRESSE';
        $data['CP'] = '97430';
        $data['VILLE']='VILLE';
        $data['RSCRM_LONG'] = 'Répertoire des Métiers';
        $data['RSC_VILLE']='SAINT DENIS';
        $data['MATERIEL']='MATERIEL';
        $data['DATE_DE_CONTRAT']='DATE_DE_CONTRAT';
        $data['SIREN']='SIREN';








        //return view('pdf.p_15_att_propre_ass.p_15_att_propre_ass', $data);
        $pdf = PDF::loadView('pdf.p_15_att_propre_ass.p_15_att_propre_ass',
            $data);

        return $pdf->download('p_15.pdf');

    }

}
