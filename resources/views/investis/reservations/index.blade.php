@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.'Reservations')

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="voyager-calendar"></i> Réservations
        </h1>
        {{-- @can('add',app($dataType->model_name))
            <a href="{{ route('voyager.'.$dataType->slug.'.create') }}" class="btn btn-success btn-add-new">
                <i class="voyager-plus"></i> <span>{{ __('voyager::generic.add_new') }}</span>
            </a>
        @endcan
        @can('delete',app($dataType->model_name))
            @include('voyager::partials.bulk-delete')
        @endcan
        @can('edit',app($dataType->model_name))
        @if(isset($dataType->order_column) && isset($dataType->order_display_column))
            <a href="{{ route('voyager.'.$dataType->slug.'.order') }}" class="btn btn-primary">
                <i class="voyager-list"></i> <span>{{ __('voyager::bread.order') }}</span>
            </a>
        @endif
        @endcan
        @include('voyager::multilingual.language-selector') --}}
    </div>
@stop

@section('content')
  <div class="page-content browse container-fluid">
      @include('voyager::alerts')
      <div class="row">
          <div class="col-md-12">
              <div class="panel panel-bordered">
                  <div class="panel-body">
                    <div class="table-responsive">
                        <table id="dataTable" class="table table-hover">
                            <thead>
                              <tr>
                                <th>Nom de l'investisseur</th>
                                <th>Contrat</th>
                                <th>CGP</th>
                                <th>SNC</th>
                                <th>RI</th>
                                <th>Apport</th>
                                <th>Nbr Part</th>
                                <th>Rent %</th>
                                <th>Frais</th>
                                <th>Ass Juridique</th>
                                <th>DR</th>
                                <th>fichiers</th>
                                <th>Actions</th>

                              </tr>
                            </thead>
                            <tbody>
                              <tr>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td class="no-sort no-click" id="bread-actions">
                                    actions
                                </td>
                              </tr>
                              <tr>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td>asa</td>
                                <td>asaaa</td>
                                <td class="no-sort no-click" id="bread-actions">
                                  actions
                                </td>
                              </tr>
                            </tbody>
                        </table>
                    </div>
                  </div>
              </div>
          </div>
      </div>
  </div>
@stop

@section('css')
    <link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@stop

@section('javascript')
    <!-- DataTables -->
    <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    <script>
        $(document).ready(function () {
          var table = $('#dataTable').DataTable({!! json_encode(
              array_merge([
                  "order" => [],
                  "language" => __('voyager::datatable'),
                  "columnDefs" => [['targets' => -1, 'searchable' =>  false, 'orderable' => false]],
              ],
              config('voyager.dashboard.data_tables', []))
          , true) !!});

            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '#';
            $('#delete_modal').modal('show');
        });
    </script>
@stop
