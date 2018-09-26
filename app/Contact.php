<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Contact extends Model
{

  public $additional_attributes = ['full_name'];

  public function getFullNameAttribute()
  {
      return "{$this->fistname} ".strtoupper($this->lastname);
  }
}
