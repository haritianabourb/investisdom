<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;
use App\Reservation;

class YousignAction extends AbstractAction
{

    protected $title;
    protected $yousignProcedureStatus;

    public function getTitle()
    {
        if($this->getYousignProcedureStatus() == "active"){
            $this->title = "Yousign : Procedure en cours";
        }
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

        if(!$this->getYousignProcedureStatus() || $this->getYousignProcedureStatus() != "active"){
            return route('admin.'.$this->dataType->slug.'.yousign', ["reservation" => $this->data]);
        }

        return "/#";
    }

    public function getAttributes()
    {
        $attributes = [
            'class' => 'btn ',
        ];

        if($this->getYousignProcedureStatus() == "active"){
            $attributes["class"] .= "btn-info disabled";
            $attributes["disabled"] = "disabled";
        }else{
            $attributes["class"] .= "btn-primary";
        }

      return $attributes;
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


            $yousignProcedure = $yousignClient->request('GET', $yousignUrl.$yousignProcedureId);

            $this->yousignProcedureStatus = (json_decode($yousignProcedure->getBody()->getContents()))->status;

        }

        return $this->yousignProcedureStatus;

    }
}