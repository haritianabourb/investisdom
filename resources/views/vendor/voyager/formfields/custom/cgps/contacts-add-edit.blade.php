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
            ->whereNotIn('id',$dataTypeContent->get()->pluck('all_contacts')->flatten()->pluck('id')->diff($dataTypeContent->contacts->flatten()->pluck('id')->toArray())->toArray())
            ->get();
    @endphp

    @if($row->required === 0)
        <option value="">{{__('voyager::generic.none')}}</option>
    @endif

    @foreach($relationshipOptions as $relationshipOption)
        <option value="{{ $relationshipOption->{$options->key} }}" @if(in_array($relationshipOption->{$options->key}, $selected_values)){{ 'selected="selected"' }}@endif>{{ $relationshipOption->{$options->label} }}</option>
    @endforeach

</select>