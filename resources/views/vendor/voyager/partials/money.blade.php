@php
    // TODO make it in partial and call it with @include('voyager::partials.money')
  $field_name=$row->field;

  if(\Illuminate\Support\Str::endsWith(\Request::route()->getName(), 'index')){
    $money_value=floatval($data->$field_name);
  }else{
    $money_value=floatval($dataTypeContent[$field_name]);
  }

@endphp

{{number_format($money_value, 2, ",", " ")}} €