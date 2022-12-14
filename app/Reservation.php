<?php

namespace App;

use App\Scopes\SelfScope;
use Illuminate\Database\Eloquent\Model;
use Voyager;


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
    return $this->investor();
//    return $this->belongsTo(Investor::class, 'investors_id', 'id');
  }

  public function cgpsId(){
    return $this->belongsTo(CGP::class, 'cgps_id', 'id');
  }

  public function generatePdf(){
      $this->fireModelEvent('beforeGeneratePdf');

      $this->fireModelEvent('afterGeneratePdf');
  }

  public function investor(){
      return $this->belongsTo(Investor::class, 'investors_id', 'id');
  }

    public function getIdentifiantBrowseAttribute(){
        $dataType = Voyager::model('DataType')->where('model_name', '=', get_class($this))->first();
        return view('voyager::reservations.partials.identifiant-browse', ["reservation" => $this, 'dataType' => $dataType])->render();
    }

    public function getInvestorsIdBrowseAttribute(){
        return '<a href="'.route('voyager.investors.show', ["id" => $this->investorsId]).'" target="_blank">'.$this->investorsId()->first()->full_name.'</a>';
    }

    public function getInvestorsIdReadAttribute(){
        return '<a href="'.route('voyager.investors.show', ["id" => $this->investorsId]).'" target="_blank">'.$this->investorsId()->first()->full_name.'</a>';
    }

    public function getCgpsIdBrowseAttribute(){
        return $this->cgpsId()->first()->name;
    }

    public function getCgpsIdReadAttribute(){
        return $this->cgpsId()->first()->name;
    }

    public function getUserIdBrowseAttribute(){
        return $this->getContact();
    }

    public function getUserIdReadAttribute(){
        return $this->getContact('full_name_func_civ');
    }

    private function getContact($item = 'full_name_civ'){
        if($contact = Contact::ofUser(User::find($this->user_id))->first()){
            return $contact->$item;
        }

        return User::find($this->user_id)->name;
    }

    public function scopeOfYear($query)
    {

        $from = date(date("Y")."-01-01");
        $to = date(date("Y")."-12-31");

        return $query->whereBetween('mandat_reserved_at', [$from, $to]);

    }

}
