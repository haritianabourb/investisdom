<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{
  const RESERVATION = 'RESERVATION';
  const MANDAT = 'MANDAT';
  const CONTRAT = 'CONTRAT';

  // TEMP DATA FOR SIMULATION

  const TVA85 = 8.5/100;
  const TVANPR4412 = 44.12/100;

  /**
   * The event map for the model.
   *
   * @var array
   */

  public function typeContratsId(){
    return $this->belongsTo(TypeContrat::class, 'type_contrats_id', 'id');
  }

  public function investorsId(){
    return $this->belongsTo(Investor::class, 'investors_id', 'id');
  }

  public function cgpsId(){
    // return $this->belongsTo(CGP::class);
    return $this->belongsTo(CGP::class, 'cgps_id', 'id');
  }

  // public function cgp(){
  //   return $this->belongsTo(CGP::class, 'cgps_id', 'id');
  // }

}