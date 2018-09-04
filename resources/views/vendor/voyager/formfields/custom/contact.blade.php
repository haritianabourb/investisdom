@if(isset($options->relationship))
		<div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
	    {{-- If this is a relationship and the method does not exist, show a warning message --}}
	    @if( !method_exists( $dataType->model_name, camel_case($row->field) ) )
	        <p class="label label-warning"><i class="voyager-warning"></i> {{ __('voyager::form.field_select_dd_relationship', ['method' => camel_case($row->field).'()', 'class' => $dataType->model_name]) }}</p>
	    @endif


        @if(isset($dataTypeContent->{$row->field}) && !is_null(old($row->field, $dataTypeContent->{$row->field})))
            <?php $selected_value = old($row->field, $dataTypeContent->{$row->field}); ?>
        @else
            <?php $selected_value = old($row->field); ?>
        @endif

        <select class="form-control select2 col-md-10" name="{{ $row->field }}">
            <?php $default = (isset($options->default) && !isset($dataTypeContent->{$row->field})) ? $options->default : null; ?>

            @if(isset($options->options))
                <optgroup label="{{ __('voyager::generic.custom') }}">
                @foreach($options->options as $key => $option)
                    <option value="{{ ($key == '_empty_' ? '' : $key) }}" @if($default == $key && $selected_value === NULL){{ 'selected="selected"' }}@endif @if((string)$selected_value == (string)$key){{ 'selected="selected"' }}@endif>{{ $option }}</option>
                @endforeach
                </optgroup>
            @endif
            {{-- Populate all options from relationship --}}
            <?php
            $relationshipListMethod = camel_case($row->field) . 'List';
            if (method_exists($dataTypeContent, $relationshipListMethod)) {
                $relationshipOptions = $dataTypeContent->$relationshipListMethod();
            } else {
                $relationshipClass = $dataTypeContent->{camel_case($row->field)}()->getRelated();
                if (isset($options->relationship->where)) {
                    $relationshipOptions = $relationshipClass::where(
                        $options->relationship->where[0],
                        $options->relationship->where[1]
                    )->get();
                } else {
                    $relationshipOptions = $relationshipClass::all();
                }
            }

            // Try to get default value for the relationship
            // when default is a callable function (ClassName@methodName)
            if ($default != null) {
                $comps = explode('@', $default);
                if (count($comps) == 2 && method_exists($comps[0], $comps[1])) {
                    $default = call_user_func([$comps[0], $comps[1]]);
                }
            }
            ?>

            <optgroup label="{{ __('voyager::database.relationship.relationship') }}">
            @foreach($relationshipOptions as $relationshipOption)
                <option value="{{ $relationshipOption->{$options->relationship->key} }}" @if($default == $relationshipOption->{$options->relationship->key} && $selected_value === NULL){{ 'selected="selected"' }}@endif @if($selected_value == $relationshipOption->{$options->relationship->key}){{ 'selected="selected"' }}@endif>{{ $relationshipOption->{$options->relationship->label} }}</option>
            @endforeach
            </optgroup>
        </select>
				<button type="button" class="btn btn-success add col-md-2"> Add a customer </button>
		</div>
		<div class="modal modal-success fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}">
                        <span aria-hidden="true">&times;</span>
                    </button>
                    <h4 class="modal-title">
                        <i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ $dataType->display_name_singular }}?
                    </h4>
                </div>
								<form action="#" id="add_form" method="POST">
                <div class="modal-body">
										{{ method_field("POST") }}
										<h5>here some contact field</h5>
										{{ csrf_field() }}

								</div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-success pull-right add-confirm" value="{{ __('voyager::generic.delete_this_confirm') }} {{ $dataType->display_name_singular }}">
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
							</form>
            </div>
        </div>
    </div>

@endif

@section('javascript')
    <!-- DataTables -->
    <script>
        $(document).on('click', '.add', function (e) {
            $('#add_form').action = '#';
            $('#delete_modal').modal('show');
        });
    </script>
@stop
{{-- @dd($row, $options, $dataType, $dataTypeContent) --}}
