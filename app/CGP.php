<?php

namespace App;

use App\Traits\CGPContacts;

class CGP extends Entity
{
    use CGPContacts;

    protected $table = 'cgps';

    public function tauxCGP(){
      return $this->hasMany(TauxCGP::class, 'cgps_id', 'id');
    }

    public function contactId()
    {
        // TODO: make this method as deprecated,
        // TODO: also make the trait more convenient for all model
        return $this->contact();
    }

}
