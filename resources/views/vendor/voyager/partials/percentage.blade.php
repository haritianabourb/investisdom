@php
  $field_name=$row->field;
  $percentage_value=floatval($dataTypeContent[$field_name])*100;
@endphp

{{number_format($percentage_value, 2, ",", " ")}} %