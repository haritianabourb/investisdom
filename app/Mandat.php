<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mandat extends Model
{
  const MANDAT_SIMPLIFIE = "SIMPLIFIE";
  const MANDAT_STANDARD = "STANDARD";

  const TYPE_DEFISCALISATION_CREDIT_IMPOT = "CREDIT_IMPOT";
  const TYPE_DEFISCALISATION_UNDECIES = "UNDECIES";


  function leaseholderId(){
    return $this->belongsTo(Leaseholder::class);
  }

  function supplierId(){
    return $this->belongsTo(Supplier::class);
  }
}
