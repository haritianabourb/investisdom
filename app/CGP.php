<?php

namespace App;

use App\Traits\CGPContacts;
use Chelout\RelationshipEvents\Concerns\HasBelongsToManyEvents;
use Chelout\RelationshipEvents\Traits\HasRelationshipObservables;

class CGP extends Entity
{
    use CGPContacts,HasBelongsToManyEvents, HasRelationshipObservables;

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

    public function scopeOfContact($query, Contact $contact, $main = false){
        $query->where('contact_id', $contact->id)->when(!$main, function($query) use ($contact) {
            $query->orWhereHas('contacts', function ($query) use ($contact){
               $query->where('id', $contact->id);
            });
        });
    }



}
