@push('footer')
<!-- Start modal for {{$relationshipDataType->name}} -->
<div class="modal modal-success fade" tabindex="-1" id="{{$modal_id}}" role="dialog">
  <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}">
            <span aria-hidden="true">&times;</span>
          </button>
          <h4 class="modal-title">
            <i class="voyager-add"></i> Ajouter un nouveau {{$row->display_name}}
          </h4>
        </div>
        <!-- !modal-header -->
        <form action="#" id="add_form_{{$modal_id}}" method="POST">
          <div class="modal-body">
          {{ method_field("POST") }}
          <!-- Adding / Editing -->
          @foreach($relationshipDataTypeRows as $relationshipRow)
            @php
              $options = json_decode($relationshipRow->details);
              $display_options = isset($options->display) ? $options->display : NULL;
            @endphp
            <div class="row">
              <div class="col-md-12">
                <div class="form-group @if($relationshipRow->type == 'hidden') hidden @endif" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                  {{ $relationshipRow->slugify }}
                  <label for="name">{{ $relationshipRow->display_name }}</label>
                  @if ($options && isset($options->formfields_custom))
                      @include("voyager::formfields.custom.{{$options->formfields_custom}}")
                  @else
                      @include("voyager::multilingual.input-hidden-bread-edit-add")
                      {!! app('voyager')->formField($relationshipRow, $relationshipDataType, $relationshipClass) !!}
                  @endif
              </div>
            </div>
          </div>
          @endforeach
          {{ csrf_field() }}
          <div class="modal-footer">
              <input type="submit" class="btn btn-primary pull-right add-confirm" value="{{ __('voyager::generic.add') }}">
              <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!--  End Modal for {{$relationshipDataType->name}} -->
@endpush


@push('javascript')
<script>
  $.fn.modal.Constructor.prototype.enforceFocus = function () {};
</script>
@endpush
