<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Reservation;

class SepaAction extends AbstractAction
{

    protected $title;

    public function getTitle()
    {
        return $this->title ?? "Generer le Mandat SEPA";
    }

    public function getPolicy()
    {
        //TODO Change policy when it come
        //TODO check with yousign the pdf status
        if($this->data->paiement == "echelonne" || $this->data->mode_paiement == "prelevement"){
            return 'browse';
        }

        return null;
    }

    public function getDataType()
    {
       return  "reservations";
    }

    public function getIcon()
    {
        return 'voyager-documentation';
    }

    public function getDefaultRoute()
    {
        return route('admin.'.$this->dataType->slug.'.generate-sepa', ['reservation' => $this->data]);
    }

    public function getAttributes()
    {
      return [
            'class' => 'btn btn-default',
        ];
    }
}