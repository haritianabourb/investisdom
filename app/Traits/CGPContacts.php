<?php

namespace App\Traits;

use App\Contact;
use App\Observers\CGPObserver;
use Chelout\RelationshipEvents\Concerns\HasBelongsToManyEvents;
use Chelout\RelationshipEvents\Traits\HasRelationshipObservables;

trait CGPContacts {


    /**
     * Return default CGP Contact.
     */
    public function contact()
    {
        return $this->belongsTo(Contact::class);
    }

    /**
     * Return alternative CGP Contacts.
     */
    public function contacts()
    {
        return $this->belongsToMany(Contact::class, 'cgp_contacts');
    }

    /**
     * Return all CGP contacts, merging the default and alternative contacts.
     */
    public function contacts_all()
    {
        $this->loadContactRelations();

        return collect([$this->contact])->merge($this->contacts);
    }

    /**
     * Check if CGP has a contact(s) associated.
     *
     * @param string|array $name The contact(s) to check.
     *
     * @return bool
     */
    public function hasContact($name)
    {
        $contacts = $this->contacts_all->pluck('name')->toArray();

        foreach ((is_array($name) ? $name : [$name]) as $contact) {
            if (in_array($contact, $contacts)) {
                return true;
            }
        }

        return false;
    }

    private function loadContactRelations()
    {
        if (!$this->relationLoaded('contact')) {
            $this->load('contact');
        }

        if (!$this->relationLoaded('contacts')) {
            $this->load('contacts');
        }
    }

}