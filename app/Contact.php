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
      // FIXME please please please, extract this!!!
      // TODO Make it as default on the bread/db field!
      return $this->function ?? "aucun poste definie";
  }
}
