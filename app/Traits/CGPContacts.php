<?php

namespace App\Traits;

use App\Contact;

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
        return $this->belongsToMany(Contact::class, 'cgp_contacts', "c_g_p_id", "contact_id");
    }

    /**
     * Return all User contacts, merging the default and alternative contacts.
     */
    public function contacts_all()
    {
        $this->loadcontactsRelations();

        return collect([$this->contact])->merge($this->contacts);
    }

    /**
     * Check if User has a contact(s) associated.
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

    /**
     * Set default User contact.
     *
     * @param string $name The contact name to associate.
     */
    public function setcontact($name)
    {
        $contact= Contact::where('name', '=', $name)->first();

        if ($contact) {
            $this->contact()->associate($contact);
            $this->save();
        }

        return $this;
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