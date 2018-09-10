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

  public function registrationEntitiesId(){
    return $this->belongsTo(RegistrationEntity::class);
  }

  public function contactId(){
    return $this->belongsTo(Contact::class);
  }

  //////////////////////////////////////////

  public function scopeSocieties($query){
    return $query;
  }
  public function scopeIndividual($query){
    return $query;
  }

}
