<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Society extends Entity
{
    protected $table = 'entities';

    public static function boot(){
      parent::boot();

      static::addGlobalScope(function($query){
        $query->where('nature_entities_id', 2);
      });
    }

  //////////////////////////////////////////

  // public function scopeInvestisDOM($query){
  //   return $query;
  // }
  //
  // public function scopeLocataire($query){
  //   return $query;
  // }
  //
  // public function scopeFournisseur($query){
  //   return $query;
  // }
  //
  // public function scopeInvestisseur($query){
  //   return $query;
  // }
  //
  // public function scopeApporteurAffaire($query){
  //   return $query;
  // }
  //
  // public function scopeBanque($query){
  //   return $query;
  // }
  //
  // public function scopeCGP($query){
  //   return $query;
  // }
  //
  // public function scopeSNC($query){
  //   return $query;
  // }

}
