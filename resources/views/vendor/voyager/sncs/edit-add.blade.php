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
          @if(is_null($dataTypeContent->getKey()))
            <div class="col-md-12">
          @else
            <div class="col-lg-10 col-md-8 col-sm-6">
          @endif
                <div class="panel panel-bordered">
                    <!-- form start -->
                    <form role="form"
                            class="form-edit-add"
                            id="{{$dataType->name}}_edit_add"
                            action="@if(!is_null($dataTypeContent->getKey())){{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}@else{{ route('voyager.'.$dataType->slug.'.store') }}@endif"
                            method="POST" enctype="multipart/form-data">
                        <!-- PUT Method if we are editing -->
                        @if(!is_null($dataTypeContent->getKey()))
                            {{ method_field("PUT") }}
                        @endif

                        <!-- CSRF TOKEN -->
                        {{ csrf_field() }}

                        <div class="panel-body">
                          @if(is_null($dataTypeContent->getKey()))
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
                                    <legend class="text-{{$options->legend->align or 'center'}}" style="background-color: {{$options->legend->bgcolor or '#f0f0f0'}};padding: 5px;">{{$options->legend->text}}</legend>
                                @endif
                                <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
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
                                        @else
                                            {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                        @endif

                                        @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                            {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                        @endforeach
                                @endif
                              </div>
                            @endforeach
                          @else
                              <h3>{{$dataTypeContent->name}}</h3>
                              @php
                                $dataTypeRows = $dataType->editRows
                                  ->filter(function($item, $key){
                                    return $item->field !== 'status';
                                  });
                              @endphp
                              @foreach($dataTypeRows as $row)
                                  <!-- GET THE DISPLAY OPTIONS -->
                                  @php
                                      $options = $row->details;
                                      $display_options = isset($options->display) ? $options->display : NULL;
                                  @endphp
                                  @if ($options && isset($options->legend) && isset($options->legend->text))
                                      <legend class="text-{{$options->legend->align or 'center'}}" style="background-color: {{$options->legend->bgcolor or '#f0f0f0'}};padding: 5px;">{{$options->legend->text}}</legend>
                                  @endif
                                  <div class="form-group @if($row->type == 'hidden') hidden @endif col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
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
                                          @else
                                              {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                                          @endif

                                          @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                              {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                                          @endforeach
                                  @endif
                                </div>
                              @endforeach
                          @endif
                        </div><!-- panel-body -->

                        <div class="panel-footer">
                            <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                        </div>
                    </form>
                  </div>
                    <iframe id="form_target" name="form_target" style="display:none"></iframe>
                    <form id="my_form" action="{{ route('voyager.upload') }}" target="form_target" method="post"
                            enctype="multipart/form-data" style="width:0;height:0;overflow:hidden">
                        <input name="image" id="upload_file" type="file"
                                 onchange="$('#my_form').submit();this.value='';">
                        <input type="hidden" name="type_slug" id="type_slug" value="{{ $dataType->slug }}">
                        {{ csrf_field() }}
                    </form>

                </div>

                @if(!is_null($dataTypeContent->getKey()))
            <div class="col-lg-2 col-md-4 col-sm-6">
              <!-- form start -->
              <form role="form"
                      class="form-edit-add"
                      action="{{ route('voyager.'.$dataType->slug.'.update', $dataTypeContent->getKey()) }}"
                      method="POST" enctype="multipart/form-data">
                  <!-- PUT Method if we are editing -->
                  @if(!is_null($dataTypeContent->getKey()))
                      {{ method_field("PUT") }}
                  @endif
              <div class="panel pnael-info panel-bordered">
                <!-- CSRF TOKEN -->
                {{ csrf_field() }}

                <div class="panel-body">
              <h4>Résumé</h4>
              @php
                $dataTypeRow = $dataType->editRows->where('field', 'status')->first();
                $options = json_decode($dataTypeRow->details);
                $display_options = isset($options->display) ? $options->display : NULL;

                $option_value = "";
                $option_display = "";

                switch ($dataTypeContent->{$dataTypeRow->field}){
                  case(\App\SNC::ACTIVE):
                    $option_value = \App\SNC::MARKETING_OFF;
                    $option_display = $options->options->{\App\SNC::MARKETING_OFF};
                    break;
                  case(\App\SNC::MARKETING_OFF):
                    $option_value = \App\SNC::MARKETING_ON;
                    $option_display = $options->options->{\App\SNC::MARKETING_ON};
                    break;
                  case(\App\SNC::MARKETING_ON):
                    $option_value = \App\SNC::CLOSE;
                    $option_display = $options->options->{\App\SNC::CLOSE};
                    break;
                  case(\App\SNC::IN_STOCK):
                    $option_value = \App\SNC::ACTIVE;
                    $option_display = $options->options->{\App\SNC::ACTIVE};
                    break;
                }
              @endphp
              {{-- {{dd($options->options->{$dataTypeContent->{$dataTypeRow->field} }, $options->options->{\App\SNC::ACTIVE})}} --}}
              <label for="{{$dataTypeRow->field}}">{{ $dataTypeRow->display_name }}: <strong>{{ $options->options->{$dataTypeContent->{$dataTypeRow->field} } }} </strong></label>
              <br/>
              <input type="hidden" name="{{$dataTypeRow->field}}" value="{{$option_value}}">
              <button type="submit" class="btn btn-info btn-block save">
                {{$option_display}}
              </button>
              {{-- {!! app('voyager')->formField($dataTypeRow, $dataType, $dataTypeContent) !!} --}}
            </div>
          </div>
        </form>
          </div>
        @endif
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

@section('javascript')
    <script>
        var params = {}
        var $image

        $('document').ready(function () {
            $('.toggleswitch').bootstrapToggle();

            //Init datepicker for date fields if data-datepicker attribute defined
            //or if browser does not handle date inputs
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
        });
    </script>
@stop
