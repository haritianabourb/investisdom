<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Reservation;

class ContractAction extends AbstractAction
{

    protected $title;

    public function getTitle()
    {
        return $this->title ?? "Generer le Contrat";
    }

    public function getPolicy()
    {
        //TODO Change policy when it come
        //TODO check with yousign the pdf status
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
        return route('admin.'.$this->dataType->slug.'.generate-recherche', ['reservation' => $this->data]);
    }

    public function getAttributes()
    {
      return [
            'class' => 'btn btn-default generate-pdf-convention',
        ];
    }
}