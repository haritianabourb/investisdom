<?php

namespace App\Observers;

use App\Reservation;
use App\TauxCGP;
use Carbon\Carbon;

class ReservationObserver
{
    /**
     * Handle the contract "creating" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function saving(Reservation $reservation)
    {
        $this->calculate($reservation);
    }

    /**
     * Handle the contract "updated" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function updated(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the contract "deleted" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function deleted(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the contract "restored" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function restored(Reservation $reservation)
    {
        //
    }

    /**
     * Handle the contract "force deleted" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function forceDeleted(Reservation $reservation)
    {
        //
    }

    protected function calculate(Reservation $reservation){
      $mandat_start = (new Carbon($reservation->mandat_start_at));
      $mandat_mois = "mois_$mandat_start->month";

      $tauxCGP = TauxCGP::ofYear($mandat_start->year)
        ->where('cgps_id', $reservation->cgpsId->id)
        ->where('type_contrat_id', $reservation->typeContratsId->id)
        ->first();

      $taux_mois = $tauxCGP? $tauxCGP->$mandat_mois/100 : 0.216;

      // TODO make renta correctly
      $commission_cgp = $reservation->commission_cgp/100;

      $reservation->identifiant = "Folder_Test".rand(1,999);
      // $taux_renta =  - $reservation->commision_cgp;
      //
      $taux_renta =  $taux_mois - $commission_cgp;
      $apport = $reservation->montant_reduction / (1+ $taux_renta);
      $montant_commission_cgp = $apport * $commission_cgp;
      $gain_brut = $reservation->montant_reduction - $apport;
      $taux_reservation = $apport / $reservation->montant_reduction;

      // dd($taux_renta, $taux_mois, $commission_cgp, $apport, $montant_commission_cgp, $gain_brut, $taux_reservation);
      $reservation->taux_rentabilite = $taux_renta*100;
      $reservation->apport = $apport;
      $reservation->montant_commission_cgp = $montant_commission_cgp;
      $reservation->gain_brut = $gain_brut;
      $reservation->taux_reservation = $taux_reservation;

    }

    // private function getInvestors(){
    //   $investor1 = json_decode(json_encode(
    //    array(
    //     'tax_reservation' => 12700,            // montant reduction
    //     'snc_reservation' => 1,                // nb_snc
    //     'aj_reservation' => 0,                 //
    //     'contract_reservation' => 'CONFORT',    // $this->typeReservationsId->name
    //     'taux_reservation_contrat' => 0.276,    // Taux report commission, XXX depant du mois et du contrat
    //     'taux_cgp' => 0.056,                    // TauxCGP::where('cgp_id', $this->cgpId->id)->andWhere('year', $this->mandat_start_at->year)->getcurrentTaux($mois);
    //     )
    //   ), FALSE);
    //
    //
    //   $taux_renta = $investor1->taux_reservation_contrat - $investor1->taux_cgp;                                   // taux rentabilité
    //   $apport = $investor1->tax_reservation / (1+ ($taux_renta)); // apport
    //   $comm_cgp = $apport * $investor1->taux_cgp;
    //   $gain_brut = $investor1->tax_reservation - $apport;
    //   $taux_reservation = $apport / $investor1->tax_reservation;
    //
    //   $investor1->dossier =
    //   array(
    //       'taux_rentabilite' => $taux_renta,
    //       'apport' => $apport,
    //       'commission_cgp' => $comm_cgp,
    //       'brut_invoice' => $gain_brut,
    //       'taux_reservation' => $taux_reservation,
    //     );
    //
    //   return array(
    //       $investor1,
    //     )
    //   ;
    // }
}
