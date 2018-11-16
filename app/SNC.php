<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class SNC extends Entity
{
    protected $table = 'sncs';

    protected $fillable = [
      "name",
      "type_entities_id"
    ];

    const IN_STOCK = "IN_STOCK";
    const ACTIVE = "ACTIVE";
    const MARKETING_OFF = "MARKETING_OFF";
    const MARKETING_ON = "MARKETING_ON";
    const CLOSE = "CLOSE";

    public function gerantId(){
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }


    public function associeFirst(){
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

    public function associeSecond(){
        return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }


}
