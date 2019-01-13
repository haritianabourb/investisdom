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

class BanqFactFraisPDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['N_DOSSIER'] = '1812012';
        $data['DATE_DE_CONTRAT'] = 'DATE';
        $data['LOCATAIRE_RAISON_SOCIALE'] = '$LOCATAIRE_RAISON_SOCIALE';
        $data['ADRESSE'] = '$$ADRESSE';
        $data['CP'] = '$CP';
        $data['VILLE'] = '$VILLE';
        $data['CHRONO_FACT_FRAIS_INVESTIS_DOM'] = '54';
        $data['MATERIEL']='Un tracteur routier neuf de marque RENAULT de type C460 T4X2 E6 et une semi-benne aluminium neuve de marque KRAKKER de type FMA bachée';
        $data['HONORAIRES_HT'] = '123';
        $data['FRAIS_DIMMAT_HT'] = '456';
        $data['CFE'] = '100';
        $data['CUMUL_HONORAIRES_ET_FRAIS_DIMMAT'] = '206';
        $data['CUMUL_TVA_HONORAIRES_ET_FRAIS_DIMMAT'] = '100';
        $data['CUMUL_FRAIS_HT']='650';
        $data['CUMUL_FRAIS_TTC']='240';
        $data['FINANCEMENT']='SOFIDER';
        $data['CUMUL_LOYERS_HT']=



        //return view('pdf.04_banq_fact_frais.04_banq_fact_frais', $data);
        $pdf = PDF::loadView('pdf.04_banq_fact_frais.04_banq_fact_frais', $data);

        return $pdf->download('04_banq_fact_frais.pdf');

    }

}
