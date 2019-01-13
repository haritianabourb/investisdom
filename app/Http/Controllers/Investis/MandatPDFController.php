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

class MandatPDFController extends VoyagerBaseController
{

    public function generatePDF(Request $request){

        $data['locataire_raison_sociale'] = 'locataire here';
        $data['RCSRM'] = 'RCS';
        $data['RCS_VILLE'] = 'TellMeWhereULive';
        $data['SIREN'] = 'SIREN CHARMS (NUMBER)';
        $data['adresse'] = 'ADDRESSE';
        $data['civil'] = 'representative name';
        $data['CP'] = 'CP';
        $data['VILLE'] = 'VILLE';
        $data['TITRE'] = 'TITRE';
        $data['MATERIEL'] = 'MATERIEL';
        $data['FOURNISSEUR'] = 'FOURNISSEUR';
        $data['MONTANT_HT'] = '123123';
        $data['APPORT_LOCATAIRE'] = '123LOCATAIRE';
        $data['TVA_NPR'] = '34354';
        $data['APPORT_SNC'] = '$APPORT_SNC';
        $data['CG'] = 'CG';
        $data['TOTAL_FINANCER'] = 'TOTAL';
        $data['FRAIS_ELIGIBLES'] = '0.00';
        $data['Financement'] = 'SODIFIER';
        $data['FRAIS_NON_ELIGIBLES'] = '0.00';
        $data['LOYER_HT'] = 'LOYER_HT';
        $data['TVA_HT'] = 'TVA_HT';
        $data['LOYER_TTC'] = '$LOYER_TTC';
        $data['MONTANT_HT_AVEC_FRAIS'] = '123123123';
        $data['DUREE'] = '100';
        $data['DED_BASE'] = '0.00';
        $data['TVA_TOTALE_LOYERS'] = '08611';
        $data['BD'] = 'BD';
        $data['TAUX_DECQUISITION'] = '1';
        $data['MONTANT_TTC'] = '111111';
        $data['PLAN_DE_FI_TTC'] = '999999';
        $data['HONORARIES']='pay the price';
        $data['FRAIS_DIMMAT']='30';
        $data['DATE_DE_CONTRAT']='CONTRACT DATE';

        //return view('pdf.01_mandat.01_mandat', $data);
        $pdf = PDF::loadView('pdf.01_mandat.01_mandat', $data);

        return $pdf->download('Mandat.pdf');

    }

}
