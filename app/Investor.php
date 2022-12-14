<?php

namespace App;

use App\Scopes\SelfScope;


class Investor extends Entity
{
    protected $table = 'investors';

    public $additional_attributes = ['full_name', 'conjoint_full_name'];
    protected $appends = ['full_name', 'conjoint_full_name'];

    protected $casts = [
        'birth_date' => 'datetime:d/m/Y',
        'birth_conjoint' =>  'datetime:d/m/Y',
    ];

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new SelfScope());
    }

    public function getFullNameAttribute()
    {
        return strtoupper($this->name_invest)." {$this->prenom_invest}";
    }

    public function getConjointFullNameAttribute()
    {
        return strtoupper($this->nom_conjoint)." {$this->prenom_conjoint}";
    }

     public function cgpAttached(){
       return $this->hasOne(CGP::class, 'id', 'cgp_attached');
     }

    public function contactAttached(){
      return $this->belongsTo(Contact::class, 'contact_id', 'id');
    }

}
