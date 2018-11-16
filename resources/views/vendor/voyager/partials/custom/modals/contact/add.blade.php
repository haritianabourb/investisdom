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
                  <input type="button" class="btn btn-primary pull-right add-confirm" value="Ajouter un {{$row->display_name}}">
                  <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
              </div>
          </form>
        </div>
    </div>
</div>
