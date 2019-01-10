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

class P14MiPDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['SNC']='SNC';
        $data['ADRESSE']='52, route de Savanna - Islarun Centre dAffaires';
        $data['CP']='CP';
        $data['VILLE']='VILLE';
        $data['DATE_DE_CONTRAT']='DATE_DE_CONTRAT';
        $data['LOCATAIRE_RAISON_SOCIALE']='LOCATAIRE';






        //return view('pdf.p_14_mi.p_14_mi', $data);
        $pdf = PDF::loadView('pdf.p_14_mi.p_14_mi',
            $data);

        return $pdf->download('p_14_mi.pdf');

    }

}
