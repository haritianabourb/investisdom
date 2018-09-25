<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Entity extends Model
{

  public function natureEntitiesId(){
    return $this->belongsTo(NatureEntity::class, 'nature_entities_id', 'id');
  }

  public function typeEntitiesId(){
    return $this->belongsTo(TypeEntity::class, 'type_entities_id', 'id');
  }

  public function registrationEntitiesId(){
    return $this->belongsTo(RegistrationEntity::class, 'registration_entities_id', 'id');
  }

  public function contactId(){
    return $this->belongsTo(Contact::class, 'contact_id', 'id');
  }

  //////////////////////////////////////////

  public function scopeSocieties($query){
    return $query;
  }
  public function scopeIndividual($query){
    return $query;
  }

}
