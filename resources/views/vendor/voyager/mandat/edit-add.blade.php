@extends('voyager::master')

@section('css')
    <meta name="csrf-token" content="{{ csrf_token() }}">
@stop

@section('page_title', __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>
        {{ __('voyager::generic.'.(!is_null($dataTypeContent->getKey()) ? 'edit' : 'add')).' '.$dataType->display_name_singular }}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content edit-add container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            id="{{$dataType->name}}_edit_add"
                            class="form-edit-add"
                            action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(!is_null($dataTypeContent->getKey()))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">

                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif

                            <!-- Adding / Editing -->
                            @php
                                $dataTypeRows = $dataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
                            @endphp
                            @foreach($dataTypeRows as $row)
                                <!-- GET THE DISPLAY OPTIONS -->
                                @php
                                    $options = $row->details;
                                    $display_options = isset($options->display) ? $options->display : NULL;
                                @endphp
                                @if ($options && isset($options->legend) && isset($options->legend->text))
                                  @if(!$loop->first)
                                    </div>
                                  @endif
                                    <div class="row">
                                      <div class="col-md-12">
                                        <legend class="text-{{$options->legend->align ?? 'center'}}" style="color: {{$options->legend->color ?? '#333'}};background-color: {{$options->legend->bgcolor ?? '#f0f0f0'}};padding: 5px; padding-left: 15px; display:inline-block">{{$options->legend->text}}</legend>
                                      </div>
                                @endif
                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width ?? 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                @if ($options && isset($options->formfields_custom))
                                    {{ $row->slugify }}
                                    <label for="name">{{ $row->display_name }}</label>
                                    @include('voyager::formfields.custom.' . $options->formfields_custom)
                                @else
                                    {{ $row->slugify }}
                                    <label for="name">{{ $row->display_name }}</label>
                                    @include('voyager::multilingual.input-hidden-bread-edit-add')
                                    @if($row->type == 'relationship')
                                        @include('voyager::formfields.relationship')
                                    @elseif (isset($options->calculate) && $options->calculate && isset($options->manual) && $options->manual)
                                      @include('voyager::formfields.custom.calculate_manual')
                                    @elseif (isset($options->calculate) && $options->calculate)
                                      @include('voyager::formfields.custom.calculate')
                                    @else
                                        {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                    @endif
                                    @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                        {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                    @endforeach
                                @endif
                              </div>
                            @endforeach
                          {{-- </div> --}}
                          <hr/>
                          {{-- @endforeach --}}

                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>

                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>
            </div>
        </div>
    </div>

    <div class="modal fade modal-danger" id="confirm_delete_modal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"
                            aria-hidden="true">&times;</button>
                    <h4 class="modal-title"><i class="voyager-warning"></i> {{ __('voyager::generic.are_you_sure') }}</h4>
                </div>

                <div class="modal-body">
                    <h4>{{ __('voyager::generic.are_you_sure_delete') }} '<span class="confirm_delete_name"></span>'</h4>
                </div>

                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                    <button type="button" class="btn btn-danger" id="confirm_delete">{{ __('voyager::generic.delete_confirm') }}
                    </button>
                </div>
            </div>
        </div>
    </div>
    <!-- End Delete File Modal -->
@stop

@push('javascript')
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //?? if browser does not handle date inputs
            $('.form-group input[type=date]').each(function (idx, elt) {
                if (elt.type != 'date' || elt.hasAttribute('data-datepicker')) {
                    elt.type = 'text';
                    $(elt).datetimepicker($(elt).data('datepicker'));
                }
            });

            @if ($isModelTranslatable)
                $('.side-body').multilingual({"editing": true});
            @endif

            $('.side-body input[data-slug-origin]').each(function(i, el) {
                $(el).slugify();
            });

            $('.form-group').on('click', '.remove-multi-image', function (e) {
                e.preventDefault();
                $image = $(this).siblings('img');

                params = {
                    slug:   '{{ $dataType->slug }}',
                    image:  $image.data('image'),
                    id:     $image.data('id'),
                    field:  $image.parent().data('field-name'),
                    _token: '{{ csrf_token() }}'
                }

                $('.confirm_delete_name').text($image.data('image'));
                $('#confirm_delete_modal').modal('show');
            });

            $('#confirm_delete').on('click', function(){
                $.post('{{ route('voyager.media.remove') }}', params, function (response) {
                    if ( response
                        && response.data
                        && response.data.status
                        && response.data.status == 200 ) {

                        toastr.success(response.data.message);
                        $image.parent().fadeOut(300, function() { $(this).remove(); })
                    } else {
                        toastr.error("Error removing image.");
                    }
                });

                $('#confirm_delete_modal').modal('hide');
            });
            $('[data-toggle="tooltip"]').tooltip();

            //CUSTOM

            var elementsLoan=[
                "[name=ouverture_compte_bank]",
                "[name=bank]",
                "[name=nombre_periode]",
                "[name=periodicite]",
                "[name=duree_pret]",
                "[name=taux_pret]",
                "[name=duree_pret_periode]"
            ].join(", "); //getting selector string for jQuery

            var elementsCash=[
                "[name=montant_echeance]"
            ].join(", "); //getting selector string for jQuery

            var elementsSegment=[
                "[name=emission_co2_materiel]",
                "[name=plafonnement_vp]"
            ].join(", "); //getting selector string for jQuery



            $("[name=complement_financement]").change(function() {
                if (this.value=="CASH") {
                    $(elementsCash)
                    .parent().show("fast");

                    $(elementsLoan)
                    .parent().hide("fast");
                    // $("[name=capital]").prop("required", true);
                }

                if (this.value=="LOAN") {
                  $(elementsCash)
                  .parent().hide("fast");

                  $(elementsLoan)
                  .parent().show("fast");
                }
            });

            $("[name=segment_materiel]").on("select2:select", function() {
              if (this.value=="1") {
                  $(elementsSegment)
                  .parent().show("fast");
                  // $("[name=capital]").prop("required", true);
              }else{
                $(elementsSegment)
                .parent().hide("fast");
              }
              // debugger;
            });

            if ($("[name=complement_financement]").val()=="CASH") { //setting default visibility
                $("#option-complement-financement-2").click();
                $("#option-complement-financement-1").click();
            }

            if ($("[name=complement_financement]").val()=="LOAN") { //setting default visibility
                $("#option-complement-financement-1").click();
                $("#option-complement-financement-2").click();
            }
            var immatriculationMaterielementsToHide=[
                "[name=genre_vehicle]",
                "[name=marque_vehicle]",
                "[name=type_vehicle]"
            ].join(", "); //getting selector string for jQuery

            $("[name=immatriculation_materiel]").on("change", function() {
                if (this.value == 1) { //Oui, show fields
                    $(immatriculationMaterielementsToHide)
                    .parent().show("fast");
                } else { //otherwise, hide fields
                    $(immatriculationMaterielementsToHide).val("")
                    .parent().hide("fast");
                }
            });

            $("[name=immatriculation_materiel]").trigger('change');

            $("#option-segment-materiel-"+$("[name=segment_materiel]").val()).click();

            var elementIsSubvention = [
                "[name=type_subvention]",
                "[name=montant_subvention]",
                "[name=other_subvention]"
            ].join(", "); //getting selector string for jQuery

            $("[name=is_subvention]").change(function() {
                if (this.checked) { //Oui, show fields
                    $(elementIsSubvention)
                        .parent().show("fast");
                    $("[name=type_subvention]").trigger("change").trigger("select2:select");
                } else { //otherwise, hide fields
                    $(elementIsSubvention).val("")
                        .parent().hide("fast");
                }
            });

            var elementsSubvention=[
                "[name=other_subvention]"
            ].join(", "); //getting selector string for jQuery

            $("[name=type_subvention]").on("select2:select", function() {
              if (this.value=="autres") {
                  $(elementsSubvention)
                  .parent().show("fast");
              }else{
                $(elementsSubvention)
                .parent().hide("fast");
              }
              // debugger;
            });

            $("[name=is_subvention]").trigger('change'); //setting default visibility
            $("[name=type_subvention]").trigger("change").trigger("select2:select");



            $('[name="type_defiscalisation"]').on('change', function(){
               $('[name="ri_amount_type_id"]').val(null).trigger("change");
               $('[name="ri_amount_type_id"] option, [name="ri_amount_type_id"] optgroup').remove();
                var $html = '';
                // FIXME I'm Horrible :'( Please is anybody here to make me more secure and prettier?
               if(this.value === "01"){
                    $html = ' <optgroup label="PLEIN DROIT | RUN - MAR - GUA">\n' +
                        '                       <option value="44.12">Normal : 44,12%</option>\n' +
                        '                   <option value="61.77">Rénovation hôtelière : 61,77%</option>\n' +
                        '                   <option value="52.95">Energie : 52,95%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="PLEIN DROIT | NCA - TAH - ST MARTIN - MAY - WAL - ST BARTH">\n' +
                        '                       <option value="44.12">Normal : 44,12%</option>\n' +
                        '                   <option value="52.95">Rénovation hôtelière : 52,95%</option>\n' +
                        '                   <option value="52.95">Energie : 52,95%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="PLEIN DROIT | MAY - WAL">\n' +
                        '                       <option value="52.95">Normal : 52,95%</option>\n' +
                        '                   <option value="52.95">Rénovation hôtelière : 52,95%</option>\n' +
                        '                   <option value="61.77">Energie : 61,77%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="PLEIN DROIT | GUY">\n' +
                        '                       <option value="52.95">Normal : 52,95%</option>\n' +
                        '                   <option value="61.77">Rénovation hôtelière : 61,77%</option>\n' +
                        '                   <option value="61.77">Energie : 61,77%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="******************************************"></optgroup>\n' +
                        '                       <optgroup label="AGREMENT | RUN - MAR - GUA">\n' +
                        '                       <option value="45.30">Normal : 45,30%</option>\n' +
                        '                   <option value="63.42">Rénovation hôtelière : 63,42%</option>\n' +
                        '                   <option value="54.36">Energie : 54,36%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="AGREMENT | NCA - TAH - ST MARTIN - MAY - WAL - ST BARTH">\n' +
                        '                       <option value="45.30">Normal : 45,30%</option>\n' +
                        '                   <option value="54.36">Rénovation hôtelière : 54,36%</option>\n' +
                        '                   <option value="54.36">Energie : 54,36%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="AGREMENT | MAY - WAL">\n' +
                        '                       <option value="54.36">Normal : 54,36%</option>\n' +
                        '                   <option value="54.36">Rénovation hôtelière : 54,36%</option>\n' +
                        '                   <option value="63.42">Energie : 63,42%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   <optgroup label="AGREMENT | GUY">\n' +
                        '                       <option value="54.36">Normal : 54,36%</option>\n' +
                        '                   <option value="63.42">Rénovation hôtelière : 63,42%</option>\n' +
                        '                   <option value="63.42">Energie : 63,42%</option>\n' +
                        '                   <option value="50">Logement social : 50,00%</option>\n' +
                        '                   </optgroup>\n' +
                        '                   '
               }else{
                   $html = '<option value="38.25">Impôt sur le Revenu: 38,25%</option>\n' +
                       '<option value="35.00">Impôt sur les Société: 35,00%</option>';
               }
               $('[name="ri_amount_type_id"]').html($html).select2();
            });

            $('[name="type_defiscalisation"]').trigger("change").trigger("select2:select");


            @if(!is_null(old('ri_amount_type_id', $dataTypeContent->ri_amount_type_id)))
                <?php $selected_value = old('ri_amount_type_id', $dataTypeContent->ri_amount_type_id); ?>
                $('[name="ri_amount_type_id"]').val({{$selected_value}}).trigger("change").trigger("select2:select");
            @endif

            $('[name="leaseholder_id"]').on("change", function(){
                $.getJSON('{{route('api.leaseholders.index')}}/'+this.value, {"_method" : "GET"}, function(leaseholder){
                    if ( true == leaseholder.data.depend_groupeco){
                        $('[name="type_defiscalisation"]').val("02").trigger("change");
                        $('[name="type_defiscalisation"] option[value="01"]').prop("disabled", true);
                        $('[name="type_defiscalisation"]').select2()
                    }else{
                        $('[name="type_defiscalisation"] option[value="01"]').prop("disabled", false);
                        $('[name="type_defiscalisation"]').select2()
                    }
                });

            });

            $('[name="leaseholder_id"]').trigger("change");

        });
    </script>
@endpush
