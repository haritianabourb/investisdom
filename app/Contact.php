<?php

namespace App;

use Cviebrock\EloquentSluggable\Sluggable;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use TCG\Voyager\Models\DataType;
use DB;


class Contact extends Model
{
    use Sluggable, SluggableScopeHelpers;

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'full_name'
            ]
        ];
    }

    public $additional_attributes = [
      'full_name',
      'full_name_civ',
      'full_name_func',
      'full_name_func_civ',
      'data_type_related',
      'entity_related',
  ];
  protected $appends = [
      'full_name',
      'full_name_civ',
      'full_name_func',
      'full_name_func_civ',
//      'data_type_related',
//      'entity_related',
  ];

  public function user(){
    return $this->belongsTo(User::class, 'user_id');
  }

  public function getDataTypeRelatedAttribute(){
      $dtc = DB::table('datatype_contacts')->where([
          'contact_id' => $this->id,
      ])->first();

      if($dtc){
        return DataType::find($dtc->datatype_id);
      }

      return null;

  }

  public function getEntityRelatedAttribute(){
      if($this->data_type_related){

          $dtc = DB::table('datatype_contacts')->where([
              'contact_id' => $this->id,
              'datatype_id' => $this->data_type_related->id,
          ])->first();

          if($dtc){
            return app($this->data_type_related->model_name)->where("id", $dtc->data_id)->first();
          }

      }
      return null;
  }

  public function scopeOfUser($query, User $user)
  {
      $query->whereHas("user", function($query) use ($user){
          $query->where('id', $user->id);
      });
  }

  public function scopeOfDataType($query, DataType $dataType){
      $query->whereHas("data_type", function($query) use ($dataType){
          $query->where('id', $dataType->id);
      });
  }

  public function getFullNameAttribute()
  {
      return "{$this->fistname} ".strtoupper($this->lastname);
  }

  public function getFullNameCivAttribute()
  {
      return ucfirst($this->getCivilite())." {$this->full_name}";
  }

  public function getFullNameFuncAttribute()
  {
      return "{$this->full_name} : ".ucfirst($this->getFunction());
  }

  public function getFullNameFuncCivAttribute()
  {
      return "{$this->full_name_civ} : ".ucfirst($this->getFunction());
  }

  private function getCivilite(){
      // FIXME export this, and Make the gender great again
      switch ($this->civilite){
          case 1:
              return "mr";
              break;
          case 2:
              return "mme";
              break;
          default:
              return "";
      }
  }

  private function getFunction(){
      // FIXME Now, this is required, so it can be deprecated
      return $this->function ?? __("profile.contact.no_function");
  }

    public function getFistnameBrowseAttribute()
    {
        return $this->full_name_civ;
    }

    public function getAddress1BrowseAttribute()
    {
        return $this->address_1." ". $this->address_2?:"".", ".$this->postal_code." ".$this->city;
    }

    public function getDataTypeRelatedBrowseAttribute(){
      return $this->data_type_related ? $this->data_type_related->display_name_singular : __('generic.none');
    }

    public function getEntityRelatedBrowseAttribute(){
      return $this->entity_related ? $this->entity_related->name : __('generic.none');
    }

}
