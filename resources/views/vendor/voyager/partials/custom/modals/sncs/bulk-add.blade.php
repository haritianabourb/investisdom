<div class="modal modal-success fade" tabindex="-1" id="bulk_add_modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}">
                    <span aria-hidden="true">&times;</span>
                </button>
                <h4 class="modal-title">
                    <i class="voyager-add"></i> Création de SNC à la volée
                    {{-- <i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ $dataType->display_name_singular }}? --}}
                </h4>
            </div>
            <form action="{{route('admin.sncs.bulk-add')}}" id="add_form" method="POST">
            {{-- <form action="#" id="add_form" method="POST"> --}}
              <div class="modal-body">
                  {{ method_field("POST") }}
                    <!-- Adding / Editing -->
                    <!-- GET THE DISPLAY OPTIONS -->
                    <div class="form-group  col-md-12">
                      <label for="name">Nombre de SNC*</label>
                      <select class="form-control select2" name="nbr_snc">
                        <option> 2 </option>
                        <option> 5 </option>
                        <option> 10 </option>
                        <option> 20 </option>
                        <option> 50 </option>
                      </select>
                    </div>
                    <!-- GET THE DISPLAY OPTIONS -->
                    <div class="form-group  col-md-12">
                      <label for="name">Prefixe des SNC</label>
                      <input required class="form-control" name="prefix" placeholder="Prefixe des snc" type="text">
                    </div>

                    <input type="submit" style="display:none;">
                  {{ csrf_field() }}

              </div>
              <div class="modal-footer">
                  <input type="submit" class="btn btn-primary pull-right add-confirm" value="Ajouter un {{$row->display_name}}">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
              </div>
          </form>
        </div>
    </div>
</div>
