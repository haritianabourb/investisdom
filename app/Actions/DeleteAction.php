<?php

namespace App\Actions;

use Illuminate\Support\Facades\Auth;
use TCG\Voyager\Actions\AbstractAction;

class DeleteAction extends AbstractAction
{

    protected $yousignProcedureStatus;

    public function getTitle()
    {
        return __('voyager::generic.delete');
    }

    public function getIcon()
    {
        return 'voyager-trash';
    }

    public function getPolicy()
    {

        if($this->dataType->slug == "reservations" ){
            if(!Auth::user()->hasRole(["admin", "administrator", "investis", "investisdom"]) && $this->data->yousign_procedure_id == "archive") {
                return false;
            }
            return $this->getYousignProcedureStatus();
        }

        return 'delete';
    }

    public function getAttributes()
    {
        return [
            'class'   => 'btn btn-sm btn-danger pull-right delete',
            'data-id' => $this->data->{$this->data->getKeyName()},
            'id'      => 'delete-'.$this->data->{$this->data->getKeyName()},
        ];
    }

    public function getDefaultRoute()
    {
        return 'javascript:;';
    }

    public function shouldActionDisplayOnDataType()
    {
        $model = $this->data->getModel();
        if ($model && in_array(\Illuminate\Database\Eloquent\SoftDeletes::class, class_uses($model)) && $this->data->deleted_at) {
            return false;
        }

        return parent::shouldActionDisplayOnDataType();
    }

    private function getYousignProcedureStatus(){
        if(Auth::user()->hasRole(["admin", "administrator", "investis", "investisdom"])) return "delete";
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

        return 'delete';

    }
}
