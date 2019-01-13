<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use \App\Reservation;
use PDF;
use Voyager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReservationController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generatePDFMandat(Request $request, Reservation $reservation){
        $this->authorize('browse', $reservation);
        $investor = \App\Investor::find($reservation->investors_id);
        $formulae = \App\TypeContrat::find($reservation->type_contrats_id);
        $pdf = PDF::loadView('pdf.reservations.mandat_recherche', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);
        return $pdf->download('Mandat_de_Recherche'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf');
    }

    public function generatePDFRecherche(Request $request, Reservation $reservation){
        $this->authorize('browse', $reservation);
        $investor = \App\Investor::find($reservation->investors_id);
        $formulae = \App\TypeContrat::find($reservation->type_contrats_id);
        $pdf = PDF::loadView('pdf.reservations.reservation', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);
        return $pdf->download('Demande_de_Reservation'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf');
    }

}
