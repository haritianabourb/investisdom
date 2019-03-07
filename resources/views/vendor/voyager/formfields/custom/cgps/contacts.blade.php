@php $relationshipField = $row->field; @endphp

@if(isset($view) && ($view == 'browse' || $view == 'read'))

    @php
        $relationshipData = (isset($data)) ? $data : $dataTypeContent;
        $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table)->pluck($options->label)->all() : array();
    @endphp

    @if($view == 'browse')
        @include("voyager::formfields.custom.cgps.contacts-browse")
    @else
        @include("voyager::formfields.custom.cgps.contacts-show")
    @endif

@else
        @include("voyager::formfields.custom.cgps.contacts-add-edit")
@endif