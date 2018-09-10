<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Intermediary extends Entity
{
    protected $table = 'entities';

    public static function boot(){
      parent::boot();

      static::addGlobalScope(function($query){

        $typeEntity = TypeEntity::where('name', 'Apporteur Affaire')->firstOrFail();
        $query->where('type_entities_id', $typeEntity->id);

      });
    }

}
