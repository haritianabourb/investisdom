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

class P24FactVentePDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['FORME_JURIDIQUE']='FORME_JURIDIQUE';
        $data['LOCATAIRE_RAISON_SOCIALE']='LOCATAIRE_RAISON_SOCIALE';
        $data['ADRESSE']='ADRESSE';
        $data['SIREN']='SIREN';
        $data['SNC']='SNC';
        $data['ANNEE_INVEST']='2018';
        $data['N_DOSSIER']='N_DOSSIER';
        $data['MATERIEL']='MATERIEL';
        $data['MONTANT_HT_HORS_FRAIS']='MONTANT_HT_HORS_FRAIS';
        $data['TVA']='0';
        $data['MONTANT_TTC']='43100,00';
        $data['DATE_DE_CONTRAT']='DATE';
        $data['CP']='CP';
        $data['VILLE']='VILLE';
        $data['TVA_NPR']='TVA_NPR';





        //return view('pdf.p_24_fact_vente.p_24_fact_vente', $data);
        $pdf = PDF::loadView('pdf.p_24_fact_vente.p_24_fact_vente',
            $data);

        return $pdf->download('p_24.pdf');

    }

}
