<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Contrat extends Model
{

  public function typeContratsId(){
    return $this->belongsTo(TypeContrat::class);
  }
}
