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

class DaBanqPDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['FORME_JURIDIQUE']='SARL';
        $data['LOCATAIRE_RAISON_SOCIALE']='LOCATAIRE_RAISON_SOCIALE';
        $data['MATERIEL']='MATERIEL';
        $data['SNC']='SNC';
        $data['FINANCEMENT']='FINANCEMENT';





        //return view('pdf.23_da_banq.23_da_banq', $data);
        $pdf = PDF::loadView('pdf.23_da_banq.23_da_banq',
            $data);

        return $pdf->download('23_da_banq.pdf');

    }

}
