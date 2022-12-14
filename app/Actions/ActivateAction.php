<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class ActivateAction extends AbstractAction
{
    public function getTitle()
    {
        return __('generic.activate');
    }

    public function getIcon()
    {
        return 'voyager-person';
    }

    public function getDataType()
    {
        return 'users';
    }

    public function getPolicy()
    {
        return $this->data->activated_at ? false : 'edit';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-info pull-right activate',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'activate-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return 'javascript:;';
    }

}
