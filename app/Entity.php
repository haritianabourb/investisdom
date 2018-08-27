<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Entity extends Model
{
  public function typeEntitiesId(){
    return $this->belongsTo(TypeEntity::class);
  }

}
