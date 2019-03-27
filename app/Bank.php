<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Bank extends Entity
{
     protected $table = 'banks';

    // public static function boot(){
    //   parent::boot();
    //
    //   static::addGlobalScope(function($query){
    //
    //     $typeEntity = TypeEntity::where('name', 'Banque')->firstOrFail();
    //     $query->where('type_entities_id', $typeEntity->id);
    //
    //   });
    // }

}
