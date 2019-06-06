<?php

namespace App\Widgets;

use Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Reservation;

class LastReservationDimmer extends BaseDimmer
{

//    public $reloadTimeout = 5;

    /**
     * The configuration array.
     *
     * @var array
     */
    protected $config = [];

    /**
     * Treat this method as a controller action.
     * Return view() or other content to display.
     */
    public function run()
    {


        $lasts = collect(Reservation::ofYear()->get())->sortByDesc('mandat_reserved_at')->values()->take(10);


      if($lasts){
        $text = "<ul class='text-left text-info'>";
          foreach ($lasts as $last){
                $text.= "<li><a href='".route('voyager.reservations.show', $last)."' class='text-info'><strong>{$last->identifiant} : ".($last->investorsId()->find($last->investors_id) ? $last->investorsId()->find($last->investors_id)->name: '')." - ".number_format($last->taux_rentabilite*100, 2, '.', " ")."%</strong></a></li>";
          }
        $text .= "</ul>";
      }

      return view('voyager::dimmer', array_merge($this->config, [
          'icon'   => 'voyager-receipt',
          'title'  => "Dernieres Réservations de ".date("Y"),
          'text'   => $text ?? "Aucune réservation pour le moment.",
          'button' => [
            'text' => "Voir mes Réservations",
            'link' => route('voyager.reservations.index'),
          ],
          'image' => voyager_asset('images/widget-backgrounds/03.jpg'),
      ]));

    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
         return Reservation::count() && Auth::user()->can('browse', app(Reservation::class));
    }

}
