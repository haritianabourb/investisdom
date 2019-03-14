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

@if(\Auth::user()->hasRole(["admin", "investis", "investisdom"]))
        @php
                $relationshipClass = App\Contact::class;
                $relationshipDataType = app('voyager')->model('DataType')->where('model_name', '=', $relationshipClass)->first();
                $relationshipDataTypeRows = $relationshipDataType->addRows->filter(function($item, $key){
                  $details = $item->details;
                  return isset($details->modal) && $details->modal;
                });
                // TODO make this configurable in option later with an id in a display modal BREAD configuration.
                $modal_id = "{$relationshipDataType->name}_edit_add_".random_int(100000, 999999);
                //$options = $dataType->details;
                $options->relationship = $options;
        @endphp
        <button type="button" id="modal_{{$modal_id}}" class="btn btn-default btn-block"> Ajouter un {{$row->display_name}} </button>


        @push('footer')
                @include('voyager::partials.custom.modal')
        @endpush

        @push('javascript')
                @include('voyager::partials.custom.modal-script')
        @endpush
@endif