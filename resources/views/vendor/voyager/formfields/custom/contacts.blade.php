@if(str_is("select_multiple", $row->type))
	@include('voyager::formfields.select_multiple')
@else
	@include('voyager::formfields.select_dropdown')
@endif

<button type="button" class="btn btn-default btn-block add"> Ajouter un {{$row->display_name}} </button>

@section('footer')
	@include('voyager::partials.custom.modals.contact.add')
@stop

@section('javascript')
  @include('voyager::partials.custom.modals.contact.add-script')
@stop
{{-- @dd($row, $options, $dataType, $dataTypeContent) --}}
