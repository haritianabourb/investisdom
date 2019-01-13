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

class P18PDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['N_DOSSIER']='1711003';
        $data['LOCATAIRE_RAISON_SOCIALE']='K@R NORD';
        $data['TYPE_RECURRENT']='✓';
        $data['TYPE_PONCTUEL']='';
        $data['ADRESSE']='ADRESSE';
        $data['CP']='97490';
        $data['VILLE']='VILLE';
        $data['DATE_DE_CONTRAT']='SOME DATE';
        $data['SNC']='SNC';
        $data['MATERIEL']='MATERIEL';
        $data['RSCRM_LONG']='RSCRM_LONG';
        $data['SIREN']='SIREN';
        $data['RESTE_A_FINANCER']=' 57 460,65';
        $data['TVA_TOTALE_LOYERS']='TVA TOTALE LOYERS';
        $data['FRAIS_DIMMAT']='25';
        $data['CUMUL_FRAIS_TTC_HORS_PUB']='0.00';









        //return view('pdf.p_18_mandat_plvt_ok.p_18_mandat_plvt_ok', $data);
        $pdf = PDF::loadView('pdf.p_18_mandat_plvt_ok.p_18_mandat_plvt_ok',
            $data);

        return $pdf->download('p_18.pdf');

    }

}
