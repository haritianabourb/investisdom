<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Reservation;

class MandatAction extends AbstractAction
{

    protected $title;

    public function getTitle()
    {
        return $this->title ?? "Generer le Mandat de Recherche";
    }

    public function getPolicy()
    {
        //TODO Change policy when it come
        //TODO check with yousign the pdf status
        if($this->data->yousign_procedure_id == "archive") {
            return false;
        }
        return 'browse';
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
        return route('admin.'.$this->dataType->slug.'.generate-mandat', ['reservation' => $this->data]);
    }

    public function getAttributes()
    {
      return [
            'class' => 'btn btn-default generate-pdf-convention',
        ];
    }
}