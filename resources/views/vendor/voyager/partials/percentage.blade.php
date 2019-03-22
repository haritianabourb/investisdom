@php
  $field_name=$row->field;
//  dd($field_name, $dataType, $dataTypeContent, $data->$field_name, \Illuminate\Support\Str::endsWith(\Request::route()->getName(), 'index'));

  if(\Illuminate\Support\Str::endsWith(\Request::route()->getName(), 'index')){
    $percentage_value=floatval($data->$field_name)*100;
  }else{
    $percentage_value=floatval($dataTypeContent[$field_name])*100;
  }

@endphp

{{number_format($percentage_value, 2, ",", " ")}} %