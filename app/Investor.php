<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Investor extends Entity
{
    protected $table = 'investors';

     public function cgpAttached(){
       return $this->hasOne(CGP::class, 'id', 'cgp_attached');
     }

    public function contactAttached(){
      return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

}
