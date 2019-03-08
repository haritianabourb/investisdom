<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{

  public $additional_attributes = [
      'full_name',
      'full_name_civ',
      'full_name_func',
      'full_name_func_civ',
  ];
  protected $appends = [
      'full_name',
      'full_name_civ',
      'full_name_func',
      'full_name_func_civ',
  ];

  public function user(){
    return $this->belongsTo(User::class, 'user_id');
  }

  public function scopeOfUser($query, User $user)
  {
      $query->whereHas("user", function($query) use ($user){
          $query->where('id', $user->id);
      });
  }

  public function getFullNameAttribute()
  {
      return "{$this->fistname} ".strtoupper($this->lastname);
  }

  public function getFullNameCivAttribute()
  {
      return ucfirst($this->getCivilite())." {$this->full_name}";
  }

  public function getFullNameFuncAttribute()
  {
      return "{$this->full_name} : ".ucfirst($this->getFunction());
  }

  public function getFullNameFuncCivAttribute()
  {
      return "{$this->full_name_civ} : ".ucfirst($this->getFunction());
  }

  private function getCivilite(){
      // FIXME export this, and Make the gender great again
      switch ($this->civilite){
          case 1:
              return "mr";
              break;
          case 2:
              return "mme";
              break;
          default:
              return "";
      }
  }

  private function getFunction(){
      // FIXME Now, this is required, so it can be deprecated
      return $this->function ?? __("profile.contact.no_function");
  }
}
