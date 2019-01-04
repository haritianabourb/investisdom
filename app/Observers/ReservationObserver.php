<?php

namespace App\Observers;

use App\Reservation;
use App\TauxCGP;
use Carbon\Carbon;
use \App\Http\Traits\HasFieldsToCalculate;

use DB;
use Schema;

class ReservationObserver
{
    use HasFieldsToCalculate;

    protected $calculate_name = "reservation";


    /**
     * Handle the contract "creating" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
      public function creating(Reservation $reservation)
    {
        $reservation->identifiant = "ATTEMPTID";
    }

    /**
     * Handle the contract "created" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
      public function created(Reservation $reservation)
    {
        // dd($reservation);
        $date = (new Carbon($reservation->created_at))->format("Ymd");
        $identifiant =
          substr(preg_replace('/\s/', '', $reservation->investorsId->name), 0, 3)
          .substr(preg_replace('/\s/', '', $reservation->cgpsId->name), -3)
          ."-".$date
          ."/".$reservation->id;

        // XXX little hack to not thrown the saving event for calculations
        DB::table($reservation->getTable())->where('id', $reservation->id)->update(['identifiant' => $identifiant]);

    }

    /**
     * Handle the contract "saving" event.
     *
     * @param  \App\Reservation  $reservation
     * @return void
     */
    public function saving(Reservation $reservation)
    {

        $request = request()->all();

        $results = $this->calculateField($request, 'all');

        $columns = Schema::getColumnListing($reservation->getTable());

        $results->each(function ($item, $key) use ($reservation, $columns){
            if(in_array($key, $columns)){
                $reservation->$key = $item;
            }
        });

//        $this->calculate($reservation);
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

}
