<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Entity extends Model
{
  public function natureEntitiesId(){
    return $this->belongsTo(NatureEntity::class);
  }

  public function typeEntitiesId(){
    return $this->belongsTo(TypeEntity::class);
  }

}
