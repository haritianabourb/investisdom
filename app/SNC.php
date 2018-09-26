<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SNC extends Entity
{
    protected $table = 'sncs';
    //
    // public static function boot(){
    //   parent::boot();
    //
    //   static::addGlobalScope(function($query){
    //
    //     $typeEntity = TypeEntity::where('name', 'SNC')->firstOrFail();
    //     $query->where('type_entities_id', $typeEntity->id);
    //
    //   });
    // }

}
