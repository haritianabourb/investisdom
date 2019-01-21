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
        // dd($reservation);;
        $date = (new Carbon($reservation->created_at))->format("Ymd");
        $identifiant =
          substr(preg_replace('/\s/', '', stripAccents($reservation->investorsId->name)), 0, 3)
          .substr(preg_replace('/\s/', '', stripAccents($reservation->cgpsId->name)), -3)
          ."-".$date
          ."/".$reservation->id;

        // XXX little hack to not thrown the saving event for calculations
        DB::table($reservation->getTable())->where('id', $reservation->id)->update(['identifiant' => $identifiant, "user_created_id" => \Auth::user()->id]);

        // TODO Pdf process
        $reservation->generatePdf();
        // TODO Id creation
        // TODO Mail processing

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

        $reservation->user_id = \Auth::user()->id;
        // TODO make this for better fill, maybe had a log too
        $reservation->user_updated_id = \Auth::user()->id;

//        $reservation->generatePdf();

    }

    public function beforeGeneratePdf(Reservation $reservation){
    }
    public function afterGeneratePdf(Reservation $reservation){
    }

}
