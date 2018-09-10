<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Leaseholder extends Entity
{
    protected $table = 'entities';

    public static function boot(){
      parent::boot();

      static::addGlobalScope(function($query){

        $typeEntity = TypeEntity::where('name', 'Locataire')->firstOrFail();
        $query->where('type_entities_id', $typeEntity->id);

      });
    }

}
