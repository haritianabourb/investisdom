<?php

namespace App;

use App\Scopes\SelfScope;
use Illuminate\Database\Eloquent\Model;


class Reservation extends Model
{

    protected $observables= [
        'beforeGeneratePdf',
        'afterGeneratePdf',
    ];

    protected $casts = [
        "created_at" => "datetime:d/m/Y",
    ];

  const RESERVATION = 'RESERVATION';
  const MANDAT = 'MANDAT';
  const CONTRAT = 'CONTRAT';

  const UNIQUE = '01';
  const ECHELONNE = '02';

  // TEMP DATA FOR SIMULATION

  const TVA85 = 8.5/100;
  const TVANPR4412 = 44.12/100;

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

  public function typeContratsId(){
    return $this->belongsTo(TypeContrat::class, 'type_contrats_id', 'id');
  }

  public function investorsId(){
    return $this->belongsTo(Investor::class, 'investors_id', 'id');
  }

  public function cgpsId(){
    return $this->belongsTo(CGP::class, 'cgps_id', 'id');
  }

  public function generatePdf(){
      $this->fireModelEvent('beforeGeneratePdf');

      $this->fireModelEvent('afterGeneratePdf');
  }

}
