<?php

namespace App\Widgets;

use Auth;
use TCG\Voyager\Widgets\BaseDimmer;
use Illuminate\Support\Str;
use TCG\Voyager\Facades\Voyager;
use App\Reservation;

class ReservationDimmer extends BaseDimmer
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

      $count = Reservation::count();
      $string = ' Réservations';

      $montant_reductions  = 0;
      $taux_rentabilite = 0;
      $max_taux = ["taux" => 0];
      $min_taux = ["taux" => 100];

      // Sum, Min and Max
      Reservation::latest()->each(function ($item, $key) use (&$montant_reductions, &$taux_rentabilite, &$max_taux, &$min_taux) {
          $montant_reductions += $item->montant_reduction;
          $taux_rentabilite += $item->taux_rentabilite;

          if($item->taux_rentabilite > $max_taux ["taux"]){
              $max_taux["taux"] = $item->taux_rentabilite;
              $max_taux["name"] = $item->identifiant;
              $max_taux["url"] = route("voyager.reservations.show", $item);

          }

          if($item->taux_rentabilite < $min_taux ["taux"]){
              $min_taux["taux"] = $item->taux_rentabilite;
              $min_taux["name"] = $item->identifiant;
              $min_taux["url"] = route("voyager.reservations.show", $item);

          }
      });



          $last = Reservation::latest()->first();

      if($count){
          $taux_rentabilite = $taux_rentabilite / $count;

          $text = "<p>Montants Reductions total: <strong>{$montant_reductions} €</strong><br/>"
              . "Taux Rentabilité moyen: <strong>".number_format($taux_rentabilite*100, 2, '.', " ")."%</strong> </p>"
              . "<p><a href='".route('voyager.reservations.show', $last)."' class='text-info'><strong>Dernier dossier: {$last->identifiant} ".number_format($last->taux_rentabilite*100, 2, '.', " ")."%</strong></a></p>"
              . "<a href='{$max_taux["url"]}' class='badge badge-success'><span class='icon voyager-sort-asc'></span>{$max_taux["name"]} - ".number_format($max_taux["taux"]*100, 2,".", " ")."%</a> "
              . "<a href='{$min_taux["url"]}' class='badge badge-danger'><span class='icon voyager-sort-desc'></span>{$min_taux["name"]} - ".number_format($min_taux["taux"]*100, 2,".", " ")."%</a>"
          ;
      }

      return view('voyager::dimmer', array_merge($this->config, [
          'icon'   => 'voyager-receipt',
          'title'  => "{$count} {$string}",
          'text'   => $text?? "Aucune {$string} pour le moment.",
          'button' => [
            'text' => "Voir mes {$string}",
            'link' => route('voyager.reservations.index'),
          ],
          'image' => voyager_asset('images/widget-backgrounds/02.jpg'),
      ]));

    }

    /**
     * Determine if the widget should be displayed.
     *
     * @return bool
     */
    public function shouldBeDisplayed()
    {
         return Auth::user()->can('browse', app(Reservation::class));
    }

}
