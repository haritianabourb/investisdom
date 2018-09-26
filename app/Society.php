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

}
