@php $relationshipField = $row->field; @endphp

@if(isset($view) && ($view == 'browse' || $view == 'read'))

    @php
        $relationshipData = (isset($data)) ? $data : $dataTypeContent;
        $selected_values = isset($relationshipData) ? $relationshipData->belongsToMany($options->model, $options->pivot_table)->pluck($options->label)->all() : array();
    @endphp

    @if($view == 'browse')
        @php
            $string_values = implode(", ", $selected_values);
            if(strlen($string_values) > 25){ $string_values = substr($string_values, 0, 25) . '...'; }
        @endphp
        @if(empty($selected_values))
            <p>No results</p>
        @else
            <p>{{ $string_values }}</p>
        @endif
    @else
        @if(empty($selected_values))
            <p>No results</p>
        @else
            <ul>
                @foreach($selected_values as $selected_value)
                    <li>{{ $selected_value }}</li>
                @endforeach
            </ul>
        @endif
    @endif

@else
            {{--{{dd($dataType)}}--}}
    <select
            class="form-control @if(isset($options->taggable) && $options->taggable == 'on') select2-taggable @else select2 @endif"
            name="{{ $relationshipField }}[]" multiple
            @if(isset($options->taggable) && $options->taggable == 'on')
            data-route="{{ route('voyager.'.str_slug($options->table).'.store') }}"
            data-label="{{$options->label}}"
            data-error-message="{{__('voyager::bread.error_tagging')}}"
            @endif
    >

        @php
            $selected_values = isset($dataTypeContent) ? $dataTypeContent->belongsToMany($options->model, $options->pivot_table)->pluck($options->table.'.'.$options->key)->all() : array();

            // XXX here the magic comes, VERY UGLY, come from relationship template
            $relationshipOptions = app($options->model)
                ->where('id', '!=', isset($dataTypeContent) ? $dataTypeContent->contact_id : '')
                ->whereNotIn('id', $dataType->all()->only('contact_id'))
                ->whereNotIn('id', $dataTypeContent->all('contact_id')->pluck('contact_id')->toArray())
                ->get();
        @endphp

        @if($row->required === 0)
            <option value="">{{__('voyager::generic.none')}}</option>
        @endif

        @foreach($relationshipOptions as $relationshipOption)
            <option value="{{ $relationshipOption->{$options->key} }}" @if(in_array($relationshipOption->{$options->key}, $selected_values)){{ 'selected="selected"' }}@endif>{{ $relationshipOption->{$options->label} }}</option>
        @endforeach

    </select>

@endif