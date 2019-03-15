<?php

namespace App\Actions;

use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
use TCG\Voyager\Actions\AbstractAction;
use TCG\Voyager\Models\DataType;

class YousignAction extends AbstractAction
{

    protected $title;
    protected $yousignProcedure;
    protected $yousignProcedureStatus;

    public function getTitle()
    {
        if(!$this->getYousignValidation()){
            return $this->title = "Yousign: Procédure impossible, <br/> Les champs Email et Téléphone Mobile <br/> de tous les contacts sont obligatoires";
        }

        $status = $this->getYousignProcedureStatus();

//        return ($status ? __("yousign.procedure.statut.{$status}") : ($this->title ?: __("yousign.procedure.statut.default")));
        return "testing";
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

        $status = $this->getYousignProcedureStatus();

        dd($status);

        if(!$status || !in_array($status, ["active","refused", "finished" ]) || $this->getYousignValidation()){
            return route('admin.'.$this->dataType->slug.'.yousign', ["reservation" => $this->data]);
        }

        return "#";
    }

    public function getAttributes()
    {
        $attributes = [
            'class' => 'btn ',
        ];

        if(!$this->getYousignValidation()){
            $attributes["class"] .= "btn-danger";
            return $attributes;
        }

        $status = $this->getYousignProcedureStatus();

        if($status == "active"){
            $attributes["class"] .= "btn-info disabled";
            $attributes["disabled"] = "disabled";
        }
        elseif($status == "finished"){
            $attributes["class"] .= "btn-success";
        }

        elseif(in_array($status, ["refused", "expired"]) ){
            $attributes["class"] .= "btn-danger";
        }else{
            $attributes["class"] .= "btn-primary";
        }

      return $attributes;
    }

    private function getYousignValidation(){

        $investor = \App\Investor::find($this->data->getOriginal('investors_id'));
        $cgp = \App\CGP::find($this->data->getOriginal('cgps_id'));

        if(!$investor || !$cgp->contact_id){
            return false;
        }

        $validator  = Validator::make(
            $investor->toArray(),
            DataType::where('name', 'investors')->first()
                ->rows()->whereIn('field', ['gsm_invest', 'email_invest', 'mail_conjoint', 'gsm_conjoint'])
                ->pluck('details', 'field')->transform(function($item, $key){
                    if (is_object($item) && isset($item->validation) && !is_null($item->validation)){

                        $rules = explode("|", $item->validation->rule);

                        foreach ($rules as $key => $rule){
                            if (Str::startsWith($rule, "unique")){
                                Arr::forget($rules, $key);
                            }
                        }

                        return implode("|", $rules);

                    }
                    return  'nullable' ;
                })->toArray()
        );

        if($validator->fails()){
            return false;
        }


        $validator  = Validator::make(
            \App\Contact::find($cgp->contact_id)->toArray(),
            DataType::where('name', 'contacts')->first()
                ->rows()->whereIn('field', ['gsm', 'email'])
                ->pluck('details', 'field')->transform(function($item, $key){
                    if (is_object($item) && isset($item->validation) && !is_null($item->validation)){

                        $rules = explode("|", $item->validation->rule);

                        foreach ($rules as $key => $rule){
                            if (Str::startsWith($rule, "unique")){
                                Arr::forget($rules, $key);
                            }
                        }

                        return implode("|", $rules);

                    }
                    return  'nullable' ;
                })->toArray()
        );

        if($validator->fails()){
            return false;
        }

        return true;

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