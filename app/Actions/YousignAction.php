<?php

namespace App\Actions;

use TCG\Voyager\Actions\AbstractAction;

class YousignAction extends AbstractAction
{

    protected $title;
    protected $yousignProcedure;
    protected $yousignProcedureStatus;

    public function getTitle()
    {
        if($this->getYousignProcedureStatus() == "active"){
            $this->title = "Yousign : Procédure en cours";
        }
        if($this->getYousignProcedureStatus() == "finished"){
            $this->title = "Yousign : Procédure Accepté";
        }
        if($this->getYousignProcedureStatus() == "expired"){
            $this->title = "Yousign : Procédure Expiré" ;
        }
        if($this->getYousignProcedureStatus() == "refused"){
            $this->title = "Yousign : Procédure Refusé" ;
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

        if(!$this->getYousignProcedureStatus() || !in_array($this->getYousignProcedureStatus(), ["active","refused", "finished" ])){
            return route('admin.'.$this->dataType->slug.'.yousign', ["reservation" => $this->data]);
        }

        return "#";
    }

    public function getAttributes()
    {
        $attributes = [
            'class' => 'btn ',
        ];

        if($this->getYousignProcedureStatus() == "active"){
            $attributes["class"] .= "btn-info disabled";
            $attributes["disabled"] = "disabled";
        }
        elseif($this->getYousignProcedureStatus() == "finished"){
            $attributes["class"] .= "btn-success";
        }

        elseif(in_array($this->getYousignProcedureStatus(), ["refused", "expired"]) ){
            $attributes["class"] .= "btn-danger";
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


            $this->yousignProcedure = $yousignClient->request('GET', $yousignUrl.$yousignProcedureId);
            $this->yousignProcedure = json_decode($this->yousignProcedure->getBody()->getContents());


            $this->yousignProcedureStatus = $this->yousignProcedure->status;

        }

        return $this->yousignProcedureStatus;

    }
}