@php
    $string_values = implode(", ", $selected_values);
    if(strlen($string_values) > 25){ $string_values = substr($string_values, 0, 25) . '...'; }
@endphp
@if(empty($selected_values))
    <p>No results</p>
@else
    <p>{{ $string_values }}</p>
@endif