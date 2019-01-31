<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Reservation;

class YousignAction extends AbstractAction
{

    protected $title;

    public function getTitle()
    {
        return $this->title ?? "Envoyer à Yousign";
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
        return 'voyager-edit';
    }

    public function getDefaultRoute()
    {
        return "#";
    }

    public function getAttributes()
    {
      return [
            'class' => 'btn btn-sm btn-primary pull-right edit',
        ];
    }
}