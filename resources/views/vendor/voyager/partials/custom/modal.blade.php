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
                    {{dump($relationshipDataTypeRows)}}

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
