<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class CGP extends Entity
{
    protected $table = 'cgps';

    public function tauxCGP(){
      return $this->hasMany(TauxCGP::class, 'cgps_id', 'id');
    }

}
