<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Investor extends Entity
{
    protected $table = 'investors';

    public $additional_attributes = ['full_name'];
    protected $appends = ['full_name'];

    public function getFullNameAttribute()
    {
        return "{$this->prenom_invest} ".strtoupper($this->name_invest);
    }
     public function cgpAttached(){
       return $this->hasOne(CGP::class, 'id', 'cgp_attached');
     }

    public function contactAttached(){
      return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

}
