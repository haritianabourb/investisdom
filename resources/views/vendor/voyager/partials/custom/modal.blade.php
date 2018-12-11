@php
  $relationshipDataType = app('voyager')->model('DataType')->where('model_name', '=', get_class($relationshipClass))->first();
  $relationshipDataTypeRows = $relationshipDataType->{(!is_null($dataTypeContent->getKey()) ? 'editRows' : 'addRows' )};
@endphp

<div class="modal modal-success fade" tabindex="-1" id="add_contact_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="voyager-add"></i> Ajouter un nouveau {{$row->display_name}}
                    {{-- <i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ $dataType->display_name_singular }}? --}}
                </h4>
            </div>
            <form action="#" id="add_form" method="POST">
              <div class="modal-body">
                  {{ method_field("POST") }}
                    <!-- Adding / Editing -->
                    @foreach($relationshipDataTypeRows as $row)
                      <!-- GET THE DISPLAY OPTIONS -->
                      @php
                          $options = json_decode($row->details);
                          $display_options = isset($options->display) ? $options->display : NULL;
                      @endphp
                      @if ($options && isset($options->legend) && isset($options->legend->text))
                        @if(!$loop->first)
                          </div>
                        @endif
                          <div class="row">
                            <div class="col-md-12">
                              <legend class="text-{{$options->legend->align or 'center'}}" style="color: {{$options->legend->color or '#333'}};background-color: {{$options->legend->bgcolor or '#f0f0f0'}};padding: 5px; padding-left: 15px; display:inline-block">{{$options->legend->text}}</legend>
                            </div>
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
                              @elseif (isset($options->calculate) && $options->calculate && isset($options->manual) && $options->manual)
                                @include('voyager::formfields.custom.calculate_manual')
                              @elseif (isset($options->calculate) && $options->calculate)
                                @include('voyager::formfields.custom.calculate')
                              @else
                                  {!! app('voyager')->formField($row, $dataType, $dataTypeContent) !!}
                              @endif

                              {{-- @foreach (app('voyager')->afterFormFields($row, $dataType, $dataTypeContent) as $after)
                                  {!! $after->handle($row, $dataType, $dataTypeContent) !!}
                              @endforeach --}}
                      @endif
                    </div>
                    @endforeach
                    <input type="submit" style="display:none;">
                  {{ csrf_field() }}

              </div>
              <div class="modal-footer">
                  <input type="button" class="btn btn-primary pull-right add-confirm" value="Ajouter un {{$row->display_name}}">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
              </div>
          </form>
        </div>
    </div>
</div>
