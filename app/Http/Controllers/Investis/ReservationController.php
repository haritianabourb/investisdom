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
//        $this->authorize('browse', $reservation);
//        $pdf = PDF::loadView('pdf.reservation.convention', $data);
//        return $pdf->download('Contrat_de_partenariat_'.$reservation->name.'.pdf');
    }

    public function generatePDFRecherche(Request $request, Reservation $reservation){
        $this->authorize('browse', $reservation);
        dd($reservation);
        $pdf = PDF::loadView('pdf.reservations.reservation', compact($reservation));
        return $pdf->download('Demande_de_Reservation'.$reservation->identifiant.'_'.date('m-d-Y').'.pdf');
    }

}
