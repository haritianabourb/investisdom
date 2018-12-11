@include('voyager::formfields.select_dropdown')

<button type="button" class="btn btn-default btn-block add"> Ajouter un {{$row->display_name}} </button>

@section('footer')
	@include('voyager::partials.custom.modal')
@stop

@section('javascript')
	@include('voyager::partials.custom.modal-script')
@stop
