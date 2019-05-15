<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class EditAction extends AbstractAction
{

    protected $yousignProcedureStatus;

    public function getTitle()
    {
        return __('generic.edit');
    }

    public function getIcon()
    {
        return 'voyager-edit';
    }

    public function getPolicy()
    {

        if($this->dataType->slug == "reservations" ){
            if($this->data->yousign_procedure_id == "archive") {
                return false;
            }
            return $this->getYousignProcedureStatus();
        }
        return 'edit';
    }

    public function getAttributes()
    {
        return [
            'class' => 'btn btn-sm btn-primary pull-right edit',
        ];
    }

    public function getDefaultRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getKeyName()});
    }

    public function getContactsRoute()
    {
        return route('voyager.'.$this->dataType->slug.'.edit', $this->data->{$this->data->getRouteKeyName()});
    }

    private function getYousignProcedureStatus(){
        // TODO show if a procedure already exist
        if($this->data->yousign_procedure_id && $this->data->yousign_procedure_id != "null"){

            $api_key = env("YOUSIGN_APP_KEY", "");
            $yousignUrl = env("YOUSIGN_APP_HOST", "");
            $yousignClient = new \GuzzleHttp\Client(
                [
                    'headers' => [
                        'Authorization' => 'Bearer ' . $api_key
                    ]
                ]
            );

            $yousignProcedureId = (json_decode($this->data->yousign_procedure_id))->id;

            $this->yousignProcedure = $yousignClient->request('GET', $yousignUrl.$yousignProcedureId);
            $this->yousignProcedure = json_decode($this->yousignProcedure->getBody()->getContents());


            $this->yousignProcedureStatus = $this->yousignProcedure->status;

        }


        if(in_array($this->yousignProcedureStatus, ['active', 'finished', 'expired', 'refused', 'canceled'])){
            return false;
        }

        return 'edit';

    }

}
