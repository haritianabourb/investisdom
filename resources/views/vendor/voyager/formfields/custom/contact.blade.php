@include('voyager::formfields.select_dropdown')

<button type="button" class="btn btn-default btn-block add"> Ajouter un contact </button>

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
											<!-- Adding / Editing -->
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">
												<label for="name">Nom*</label>
												<input required class="form-control" name="fistname" placeholder="Nom" value="" type="text">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

													<label for="name">Prénom*</label>
													<input required class="form-control" name="lastname" placeholder="Prénom" value="" type="text">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

													<label for="address_1">Adresse*</label>
													<input required class="form-control" name="address_1" placeholder="Adresse" value="" type="text">
											</div>	
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

													<label for="postal_code">Code Postal*</label>
													<input required class="form-control" name="postal_code" placeholder="Code Postal" value="" type="number" pattern="\d*">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

													<label for="city">Ville*</label>
													<input required class="form-control" name="city" placeholder="Ville" value="" type="text">
											</div>																																	
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">

												<label for="name">Né(e) le</label>
												<input class="form-control datepicker" name="born_on" value="" type="datetime">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">
												<label for="name">Lieu de Naissance</label>
												<input class="form-control" name="born_in" placeholder="Lieu de Naissance" value="" type="text">
											</div>
											<!-- GET THE DISPLAY OPTIONS -->
											<div class="form-group  col-md-12">
												<label for="name">CP Naissance</label>
												<input class="form-control" name="born_in_postal" placeholder="CP Naissance" value="" type="text">
											</div>

											<input type="submit" style="display:none;">
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
			// $('#add_form').action = '{{ route('voyager.contacts.create') }}';
			$('#add_form')[0].reset();
            $('#add_contact_modal').modal('show');
		});
		
		$('#add_form').submit(function(e) {
			e.preventDefault();
			var formdata = $(this).serializeArray();
			var data = {};
			$(formdata).each(function(index, obj){
				data[obj.name] = obj.value;
			});
			console.log(data);
			
			$.ajax({
				type: "POST",
				url: "/admin/contacts",
				data: data,
				success: function (response) {
					console.log(response);
					$('[name=contact_id] optgroup[label=Relationship]')
						.append($("<option></option>")
						.attr("value",response.data.id)
						.text(response.data.fistname)
						.prop('selected', true) );

					$('[name=contact_id]').select2("destroy");
					$('[name=contact_id]').select2();
					$('#add_contact_modal').modal('hide');
				},

				error: function() {
					alert("Une erreur est survenue. Veuillez vérifier vos données et réessayer.");
				}
				
				});
		});

				$(document).on('click', '.add-confirm', function(e){
					// console.log($('#add_form'));
					// $('#add_contact_modal').modal('hide');
					if (!$('#add_form')[0].checkValidity()) {
							console.log("FORM HAS NOT BEEN VALIDATED");
							$('#add_form').find(':submit').click();
					}	
					
					else {
						$('#add_form').find(':submit').click();
					}

				});
    </script>
@stop
{{-- @dd($row, $options, $dataType, $dataTypeContent) --}}
