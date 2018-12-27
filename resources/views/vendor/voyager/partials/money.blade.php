@php
    // TODO make it in partial and call it with @include('voyager::partials.money')
  $field_name=$row->field;
  $money_value=floatval($dataTypeContent[$field_name]);
@endphp

{{number_format($money_value, 2, ",", " ")}} €