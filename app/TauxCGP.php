<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class TauxCGP extends Model
{
  protected $table="taux_cgp";

  public function cgpsId(){

    return $this->belongsTo(CGP::class);
  }

  public function typeContratId(){
    return $this->belongsTo(TypeContrat::class);
  }

  /**
     * Set the user's first name.
     *
     * @param  string  $value
     * @return void
     */
    public function setYearAttribute($value)
    {
        // dd($value, (new Carbon(date($value)))->year);
        $this->attributes['year'] = (new Carbon(date($value)))->year;
    }

    /**
     * Scope a query to only include users of a given type.
     *
     * @param \Illuminate\Database\Eloquent\Builder $query
     * @param mixed $type
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeOfYear($query, $year)
    {
        return $query->where('year', $year);
    }

}
