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

  //////////////////////////////////////////

  public function scopeInvestisDOM($query){
    return $query;
  }

  public function scopeLocataire($query){
    return $query;
  }

  public function scopeFournisseur($query){
    return $query;
  }

  public function scopeInvestisseur($query){
    return $query;
  }

  public function scopeApporteurAffaire($query){
    return $query;
  }

  public function scopeBanque($query){
    return $query;
  }

  public function scopeCGP($query){
    return $query;
  }

  public function scopeSNC($query){
    return $query;
  }

}
