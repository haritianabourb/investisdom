<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Investor extends Entity
{
    protected $table = 'entities';

    public static function boot(){
      parent::boot();

      static::addGlobalScope(function($query){

        $typeEntity = TypeEntity::where('name', 'Investisseur')->firstOrFail();
        $query->where('type_entities_id', $typeEntity->id);

      });
    }

}
