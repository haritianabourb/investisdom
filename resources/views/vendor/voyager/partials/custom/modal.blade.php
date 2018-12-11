<div class="modal modal-success fade" tabindex="-1" id="{{$relationshipDataType->name}}_edit_add" role="dialog">
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
            <form action="#" id="add_form_{{$relationshipDataType->name}}" method="POST">
              <div class="modal-body">
                  {{ method_field("POST") }}
                    <!-- Adding / Editing -->
                    @foreach($relationshipDataTypeRows as $relationshipRow)
                      <!-- GET THE DISPLAY OPTIONS -->
                      @php
                          $options = json_decode($relationshipRow->details);
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
                      <div class="form-group @if($relationshipRow->type == 'hidden') hidden @endif col-md-12" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                      @if ($options && isset($options->formfields_custom))
                          {{ $relationshipRow->slugify }}
                          <label for="name">{{ $relationshipRow->display_name }}</label>
                          @include('voyager::formfields.custom.' . $options->formfields_custom)
                      @else
                              {{ $relationshipRow->slugify }}
                              <label for="name">{{ $relationshipRow->display_name }}</label>
                              @include('voyager::multilingual.input-hidden-bread-edit-add')
                              @if($relationshipRow->type == 'relationship')
                                  @include('voyager::formfields.relationship')
                              @else
                                  {!! app('voyager')->formField($relationshipRow, $relationshipDataType, $relationshipClass) !!}
                              @endif

                              @foreach (app('voyager')->afterFormFields($relationshipRow, $relationshipDataType, $relationshipClass) as $after)
                                  {!! $after->handle($relationshipRow, $relationshipDataType, $relationshipClass) !!}
                              @endforeach
                      @endif
                    </div>
                    @endforeach
                    <input type="submit" style="display:none;">
                  {{ csrf_field() }}

              </div>
              <div class="modal-footer">
                  <input type="button" class="btn btn-primary pull-right add-confirm" value="{{ __('voyager::generic.add') }}">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
              </div>
          </form>
        </div>
    </div>
</div>
