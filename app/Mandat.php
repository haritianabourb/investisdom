<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Mandat extends Model
{
  protected $table="mandat";

  const MANDAT_SIMPLIFIE = "SIMPLIFIE";
  const MANDAT_STANDARD = "STANDARD";

  const TYPE_DEFISCALISATION_CREDIT_IMPOT = "CREDIT_IMPOT";
  const TYPE_DEFISCALISATION_UNDECIES = "UNDECIES";


  function leaseholderId(){
    return $this->belongsTo(Leaseholder::class, "leaseholder_id", "id");
  }

  function supplierId(){
    return $this->belongsTo(Supplier::class, "supplier_id", "id");
  }

  function bank(){
    return $this->belongsTo(Bank::class);
  }
}
