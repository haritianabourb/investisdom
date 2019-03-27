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

class PGPDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['N_DOSSIER'] = '1812012';
        $data['LOCATAIRE'] = 'SOME LOCATION';
        $data['ADRESSE'] = 'SOME ADDRESS';
        $data['CP'] = 'CP';
        $data['VILLE'] = 'SAINT PAUL';
        $data['TEL'] = 'TELEPHONE NUMBER';
        $data['GSM'] = 'MOBILE PHONE NUMBER';
        $data['FAX'] = 'WhatDoesTheFaxSay';
        $data['MAIL'] = 'HEY@DUDE.COM';
        $data['Commercial'] = 'CM';
        $data['FOURNISSEUR'] = 'Some field too';
        $data['MATERIEL'] = 'long text here';
        $data['MONTANT_HT'] = 'Real money';
        $data['MONTANT_TTC'] = 'Some bucks too';
        $data['FINANCEMENT'] = 'SOFIDIER';

        $data['ASSUREUR'] = 'Trusted person';
        $data['ASSUREUR_TEL'] = 'This persons phone';
        $data['DOCUMENTS'] = 'List of documents';

        $data['SNC'] = 'MARVEL';

        //return view('pdf.00_PG.00_PG', $data);
        $pdf = PDF::loadView('pdf.00_PG.00_PG', $data);

        return $pdf->download('PG.pdf');

    }

}
