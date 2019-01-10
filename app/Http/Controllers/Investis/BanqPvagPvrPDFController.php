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

class BanqPvagPvrPDFController extends VoyagerBaseController
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
        $data['SNC'] = 'SNC';
        $data['DUREE']='60';
        $data['ECHEANCE_LOYER_HT']='490';
        $data['TVA_TOTALE_LOYERS']='2499';
        $data['CUMUL_LOYERS_TTC']=' 31 899,00';
        $data['CUMUL_LOYERS_HT']=' 31 899,00';
        $data['SIREN_SNC']='SIREN SNC';
        $data['RESTE_A_FINANCER']='RESTE';
        $data['TAUX']='4';
        $data['MATERIEL']='MATERIEL';
        $data['APPORT_SNC']='APPORT_SNC';
        $data['APPORT_LOCATAIRE']='APPORT_LOCATAIRE';
        $data['FOURNISSEUR']='FOURNISSEUR';
        $data['MONTANT_TTC']='MONTANT_TTC';





        //return view('pdf.05_banq_pvag_pvr.05_banq_pvag_pvr', $data);
        $pdf = PDF::loadView('pdf.05_banq_pvag_pvr.05_banq_pvag_pvr',
            $data);

        return $pdf->download('05_banq_pvag_pvr.pdf');

    }

}
