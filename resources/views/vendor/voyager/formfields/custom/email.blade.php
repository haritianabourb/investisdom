@if(isset($view) && ($view == 'browse' || $view == 'read'))
    @php
        $field = (isset($data)) ? $data : $dataTypeContent;
    @endphp
    <a href="mailto:{{ $field->{$row->field} }}">{{ $field->{$row->field} }}</a>
@else
    <input @if($row->required == 1) required @endif type="email" class="form-control" name="{{ $row->field }}"
           placeholder="{{ isset($options->placeholder)? old($row->field, $options->placeholder): $row->display_name }}"
           {!! isBreadSlugAutoGenerator($options) !!}
           value="@if(isset($dataTypeContent->{$row->field})){{ old($row->field, $dataTypeContent->{$row->field}) }}@elseif(isset($options->default)){{ old($row->field, $options->default) }}@else{{ old($row->field) }}@endif">
@endif