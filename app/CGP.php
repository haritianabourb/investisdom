<?php

namespace App;

use App\Traits\CGPContacts;
use Chelout\RelationshipEvents\Concerns\HasBelongsToManyEvents;
use Chelout\RelationshipEvents\Traits\HasRelationshipObservables;

class CGP extends Entity
{
    use CGPContacts,HasBelongsToManyEvents, HasRelationshipObservables;

    protected $additional_attributes = [
        "all_contacts",
        "current_taux_cgp"
    ];

    protected $appends = [
        "all_contacts",
        "current_taux_cgp"
    ];

    protected $table = 'cgps';

    public function tauxCGP(){
      return $this->hasMany(TauxCGP::class, 'cgps_id', 'id');
    }

    function getCurrentTauxCGPAttribute(){
        return $this->tauxCGP()->where("year", date("Y"))->get();
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

    /**
     * Return all CGP contacts, merging the default and alternative contacts.
     */
    public function getAllContactsAttribute()
    {
        $this->loadContactRelations();

        return collect([$this->contact])->merge($this->contacts);
    }

    public function getAddress1ReadAttribute(){
        return $this->address_1." ". ($this->address_2?:"").", ".$this->postal_code." ".$this->city;
    }

}
