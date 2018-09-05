<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Intermediary extends Entity
{
    protected $table = 'entities';

    public static function boot(){
      parent::boot();

      static::addGlobalScope(function($query){
        // TODO please let me know what's a snc :D :D
        $query->where('type_entities_id', 5);
        // return $query;
      });
    }

}
