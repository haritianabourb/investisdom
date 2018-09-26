@include('voyager::formfields.select_dropdown')

<button type="button" class="btn btn-default add col-md-2"> Ajouter un contact </button>

@section('footer')
	<div class="modal modal-success fade" tabindex="-1" id="add_contact_modal" role="dialog">
			<div class="modal-dialog">
					<div class="modal-content">
							<div class="modal-header">
									<button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}">
											<span aria-hidden="true">&times;</span>
									</button>
									<h4 class="modal-title">
											<i class="voyager-add"></i> Ajouter un nouveau contact
											{{-- <i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ $dataType->display_name_singular }}? --}}
									</h4>
							</div>
							<form action="#" id="add_form" method="POST">
								<div class="modal-body">
										{{ method_field("POST") }}
										<h5>here some contact field</h5>
											<!-- Adding / Editing -->
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">
												<label for="name">Fistname</label>
												<input required="" class="form-control" name="fistname" placeholder="Fistname" value="" type="text">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

													<label for="name">Lastname</label>
													<input required="" class="form-control" name="lastname" placeholder="Lastname" value="" type="text">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

												<label for="name">Born On</label>
												<input required="" class="form-control datepicker" name="born_on" value="" type="datetime">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">
												<label for="name">Born In</label>
												<input required="" class="form-control" name="born_in" placeholder="Born In" value="" type="text">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">
												<label for="name">CP Naissance</label>
												<input required="" class="form-control" name="born_in_postal" placeholder="CP Naissance" value="" type="text">
											</div>
										{{ csrf_field() }}

								</div>
								<div class="modal-footer">
										<input type="button" class="btn btn-primary pull-right add-confirm" value="Ajouter un contact">
										<button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
								</div>
						</form>
					</div>
			</div>
	</div>
@stop

@section('javascript')
    <!-- DataTables -->
    <script>
        $(document).on('click', '.add', function (e) {
            $('#add_form').action = '{{ route('voyager.contacts.create') }}';
            $('#add_contact_modal').modal('show');
        });

				$(document).on('click', '.add-confirm', function(e){
					console.log($('#add_form'));
					$('#add_contact_modal').modal('hide');
				});
    </script>
@stop
{{-- @dd($row, $options, $dataType, $dataTypeContent) --}}
