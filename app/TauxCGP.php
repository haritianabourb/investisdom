<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class TauxCGP extends Model
{
  protected $table="taux_cgp";

  public function cgpsId(){

    return $this->belongTo(CGP::class);
  }

}
