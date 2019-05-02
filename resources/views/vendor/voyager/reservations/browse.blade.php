@extends('voyager::master')

@section('page_title', __('voyager::generic.viewing').' '.$dataType->display_name_plural)

@section('page_header')
    <div class="container-fluid">
        <h1 class="page-title">
            <i class="{{ $dataType->icon }}"></i> {{ $dataType->display_name_plural }}
        </h1>
        @can('add',app($dataType->model_name))
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
        @include('voyager::multilingual.language-selector')
    </div>
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @if ($isServerSide)
                            <form method="get" class="form-search">
                                <div id="search-input">
                                    <select id="search_key" name="key">
                                        @foreach($searchable as $key)
                                            <option value="{{ $key }}" @if($search->key == $key || $key == $defaultSearchKey){{ 'selected' }}@endif>{{ ucwords(str_replace('_', ' ', $key)) }}</option>
                                        @endforeach
                                    </select>
                                    <select id="filter" name="filter">
                                        <option value="contains" @if($search->filter == "contains"){{ 'selected' }}@endif>contains</option>
                                        <option value="equals" @if($search->filter == "equals"){{ 'selected' }}@endif>=</option>
                                    </select>
                                    <div class="input-group col-md-12">
                                        <input type="text" class="form-control" placeholder="{{ __('voyager::generic.search') }}" name="s" value="{{ $search->value }}">
                                        <span class="input-group-btn">
                                            <button class="btn btn-info btn-lg" type="submit">
                                                <i class="voyager-search"></i>
                                            </button>
                                        </span>
                                    </div>
                                </div>
                                @if (Request::has('sort_order') && Request::has('order_by'))
                                    <input type="hidden" name="sort_order" value="{{ Request::get('sort_order') }}">
                                    <input type="hidden" name="order_by" value="{{ Request::get('order_by') }}">
                                @endif
                            </form>
                        @endif
                        <div class="table-responsive">
                            <table id="dataTable" class="table table-hover" style="table-layout: fixed;">
                                <thead>
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <th>
                                                <input type="checkbox" class="select_all">
                                            </th>
                                        @endcan
                                        @foreach($dataType->browseRows as $row)
                                        <th>
                                            @if ($isServerSide)
                                                <a href="{{ $row->sortByUrl($orderBy, $sortOrder) }}">
                                            @endif
                                            {{ $row->display_name }}
                                            @if ($isServerSide)
                                                @if ($row->isCurrentSortField($orderBy))
                                                    @if ($sortOrder == 'asc')
                                                        <i class="voyager-angle-up pull-right"></i>
                                                    @else
                                                        <i class="voyager-angle-down pull-right"></i>
                                                    @endif
                                                @endif
                                                </a>
                                            @endif
                                        </th>
                                        @endforeach
                                        <th class="actions text-right">{{ __('voyager::generic.actions') }}</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dataTypeContent as $data)
                                    <tr>
                                        @can('delete',app($dataType->model_name))
                                            <td>
                                                <input type="checkbox" name="row_id" id="checkbox_{{ $data->getKey() }}" value="{{ $data->getKey() }}">
                                            </td>
                                        @endcan
                                        @foreach($dataType->browseRows as $row)
                                            @php
                                            $options = (array)$row->details;

                                            if ($data->{$row->field.'_browse'}) {
                                                $data->{$row->field} = $data->{$row->field.'_browse'};
                                                $options['accessor'] = true;
                                            }

                                            $options = json_decode(json_encode($options));
                                            @endphp
                                            <td>
                                                @if (isset($row->details->view))
                                                      @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $data->{$row->field}, 'action' => 'browse'])
                                                @elseif ( isset($options->accessor) )
                                                      {!! $data->{$row->field} !!}
                                                @elseif($row->type == 'email')
                                                          @include('voyager::formfields.custom.email', ['view' => 'browse'])
                                                @elseif($row->type == 'image')
                                                    <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:100px">
                                                @elseif($row->type == 'relationship')
                                                    @include('voyager::formfields.relationship', ['view' => 'browse'])
                                                @elseif($row->type == 'select_multiple')
                                                    @if(property_exists($options, 'relationship'))

                                                        @foreach($data->{$row->field} as $item)
                                                            @if($item->{$row->field . '_page_slug'})
                                                            <a href="{{ $item->{$row->field . '_page_slug'} }}">{{ $item->{$row->field} }}</a>@if(!$loop->last), @endif
                                                            @else
                                                            {{ $item->{$row->field} }}
                                                            @endif
                                                        @endforeach

                                                        {{-- $data->{$row->field}->implode($options->relationship->label, ', ') --}}
                                                    @elseif(property_exists($options, 'options'))
                                                        @foreach($data->{$row->field} as $item)
                                                         {{ $options->options->{$item} . (!$loop->last ? ', ' : '') }}
                                                        @endforeach
                                                    @endif

                                                @elseif($row->type == 'select_dropdown' && property_exists($options, 'options'))

                                                    @if($data->{$row->field . '_page_slug'})
                                                        <a href="{{ $data->{$row->field . '_page_slug'} }}">{!! $options->options->{$data->{$row->field}} !!}</a>
                                                    @else
                                                        {!! $options->options->{$data->{$row->field}} ?? '' !!}
                                                    @endif


                                                @elseif($row->type == 'select_dropdown' && $data->{$row->field . '_page_slug'})
                                                    <a href="{{ $data->{$row->field . '_page_slug'} }}">{{ $data->{$row->field} }}</a>
                                                @elseif($row->type == 'date' || $row->type == 'timestamp')
                                                {{ $options && property_exists($options, 'format') ? \Carbon\Carbon::parse($data->{$row->field})->formatLocalized($options->format) : $data->{$row->field} }}
                                                @elseif($row->type == 'checkbox')
                                                    @if($options && property_exists($options, 'on') && property_exists($options, 'off'))
                                                        @if($data->{$row->field})
                                                        <span class="label label-info">{{ $options->on }}</span>
                                                        @else
                                                        <span class="label label-primary">{{ $options->off }}</span>
                                                        @endif
                                                    @else
                                                    {{ $data->{$row->field} }}
                                                    @endif
                                                @elseif($row->type == 'color')
                                                    <span class="badge badge-lg" style="background-color: {{ $data->{$row->field} }}">{{ $data->{$row->field} }}</span>
                                                @elseif($row->type == 'text')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'text_area')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( $data->{$row->field} ) > 200 ? mb_substr($data->{$row->field}, 0, 200) . ' ...' : $data->{$row->field} }}</div>
                                                @elseif($row->type == 'file')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    @if(!empty($data->{$row->field}))
                                                        @if(json_decode($data->{$row->field}))
                                                            @foreach(json_decode($data->{$row->field}) as $file)
                                                                <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}"
                                                                   target="_blank" class="btn btn-success" title="{{ $file->original_name ?: '' }}">
                                                                    <i class="voyager-cloud-download"></i>
                                                                </a>
                                                                <br/>
                                                            @endforeach
                                                        @endif
                                                    @else
                                                        <form role="form"
                                                              class="form-edit-add"
                                                              id="{{ $row->field }}_edit_add_{{ $data->getKey()}}"
                                                              action="{{ route('admin.document.upload', ['slug'=>$dataType->slug , 'id' => $data->getKey()]) }}"
                                                              method="POST"
                                                              enctype="multipart/form-data">

                                                            <div class="btn btn-danger"
                                                                 onclick="myFunction('{{$dataType->name}}_{{ $row->field }}_upload_{{ $data->getKey()}}', '{{$dataType->name}}_{{ $row->field }}_document_{{ $data->getKey()}}')"
                                                                 title=""
                                                                 id="{{$dataType->name}}_{{ $row->field }}_document_{{ $data->getKey()}}"
                                                            >
                                                                <i class="voyager-upload"></i>
                                                            </div>

                                                            <input @if($row->required == 1 && !isset($data->{$row->field})) required
                                                                   @endif type="file"
                                                                   id="{{$dataType->name}}_{{ $row->field }}_upload_{{ $data->getKey()}}"
                                                                   name="{{ $row->field }}[]"
                                                                   multiple="multiple"
                                                                   style="display: none;"
                                                                   onchange="documentUploaded('{{$dataType->name}}_{{ $row->field }}_upload_{{ $data->getKey()}}', '{{$dataType->name}}_{{ $row->field }}_document_{{ $data->getKey()}}', '{{ $row->field }}_edit_add_{{ $data->getKey()}}')"
                                                            >
                                                            {{ csrf_field() }}
                                                            {{ method_field("PUT") }}
                                                        </form>
                                                    @endif
                                                @elseif($row->type == 'rich_text_box')
                                                    @include('voyager::multilingual.input-hidden-bread-browse')
                                                    <div class="readmore">{{ mb_strlen( strip_tags($data->{$row->field}, '<b><i><u>') ) > 200 ? mb_substr(strip_tags($data->{$row->field}, '<b><i><u>'), 0, 200) . ' ...' : strip_tags($data->{$row->field}, '<b><i><u>') }}</div>
                                                @elseif($row->type == 'coordinates')
                                                    @include('voyager::partials.coordinates-static-image')
                                                @elseif($row->type == 'multiple_images')
                                                    @php $images = json_decode($data->{$row->field}); @endphp
                                                    @if($images)
                                                        @php $images = array_slice($images, 0, 3); @endphp
                                                        @foreach($images as $image)
                                                            <img src="@if( !filter_var($image, FILTER_VALIDATE_URL)){{ Voyager::image( $image ) }}@else{{ $image }}@endif" style="width:50px">
                                                        @endforeach
                                                    @endif
                                                @elseif($row->type == 'media_picker')
                                                      @php
                                                          if (is_array($data->{$row->field})) {
                                                              $files = $data->{$row->field};
                                                          } else {
                                                              $files = json_decode($data->{$row->field});
                                                          }
                                                      @endphp
                                                      @if ($files)
                                                              @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                                  @foreach (array_slice($files, 0, 3) as $file)
                                                                      <img src="@if( !filter_var($file, FILTER_VALIDATE_URL)){{ Voyager::image( $file ) }}@else{{ $file }}@endif" style="width:50px">
                                                                  @endforeach
                                                              @else
                                                                  <ul>
                                                                      @foreach (array_slice($files, 0, 3) as $file)
                                                                          <li>{{ $file }}</li>
                                                                      @endforeach
                                                                  </ul>
                                                              @endif
                                                              @if (count($files) > 3)
                                                                  {{ __('voyager::media.files_more', ['count' => (count($files) - 3)]) }}
                                                              @endif
                                                      @elseif (is_array($files) && count($files) == 0)
                                                              {{ trans_choice('voyager::media.files', 0) }}
                                                      @elseif ($data->{$row->field} != '')
                                                              @if (property_exists($row->details, 'show_as_images') && $row->details->show_as_images)
                                                                  <img src="@if( !filter_var($data->{$row->field}, FILTER_VALIDATE_URL)){{ Voyager::image( $data->{$row->field} ) }}@else{{ $data->{$row->field} }}@endif" style="width:50px">
                                                              @else
                                                                  {{ $data->{$row->field} }}
                                                              @endif
                                                      @else
                                                              {{ trans_choice('voyager::media.files', 0) }}
                                                      @endif
                                                @elseif($row->type == 'money')
                                                      @include('voyager::partials.money')
                                                @elseif($row->type == 'percentage')
                                                      @include('voyager::partials.percentage')
                                                @else
                                                        @include('voyager::multilingual.input-hidden-bread-browse')
                                                          {{ $data->{$row->field} }}
                                                @endif
                                            </td>
                                        @endforeach
                                        <td class="no-sort no-click" id="bread-actions">
                                            @foreach(Voyager::actions() as $action)
                                                @if (!method_exists($action, 'massAction'))
                                                @include('voyager::reservations.partials.browse-actions', ['action' => $action])
                                                @endif
                                            @endforeach
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <select id="yearChange">
                            <option value="">Choose a year</option>
                        </select>
                        <hr>
                        <div class="table-responsive summary">
                            <table id="summaryReservation" class="table">
                                <tfoot>
                                <tr>
                                    <th colspan="2" style="text-align:right"></th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </tfoot>
                            </table>
                            <table id="totalSumarry" style="display:none;">
                                <tr>
                                    <td>ici mon total</td>
                                </tr>
                            </table>
                        </div>

                        @if ($isServerSide)
                            <div class="pull-left">
                                <div role="status" class="show-res" aria-live="polite">{{ trans_choice(
                                    'voyager::generic.showing_entries', $dataTypeContent->total(), [
                                        'from' => $dataTypeContent->firstItem(),
                                        'to' => $dataTypeContent->lastItem(),
                                        'all' => $dataTypeContent->total()
                                    ]) }}</div>
                            </div>
                            <div class="pull-right">
                                {{ $dataTypeContent->appends([
                                    's' => $search->value,
                                    'filter' => $search->filter,
                                    'key' => $search->key,
                                    'order_by' => $orderBy,
                                    'sort_order' => $sortOrder,
                                    'showSoftDeleted' => $showSoftDeleted,
                                ])->links() }}
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Single delete modal --}}
    <div class="modal modal-danger fade" tabindex="-1" id="delete_modal" role="dialog">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}?</h4>
                </div>
                <div class="modal-footer">
                    <form action="#" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm" value="{{ __('voyager::generic.delete_confirm') }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('css')
@if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
<link rel="stylesheet" href="{{ voyager_asset('lib/css/responsive.dataTables.min.css') }}">
@endif
@stop

@section('javascript')
    <!-- DataTables -->
    @if(!$dataType->server_side && config('dashboard.data_tables.responsive'))
        <script src="{{ voyager_asset('lib/js/dataTables.responsive.min.js') }}"></script>
    @endif
    <script>
        var filterDate = function(data) {
            var year = parseInt( $('#yearChange').val(), 10 );

            if(isNaN(year)) {
                return true;
            }
            var date =  moment(data[6], "DD/MM/YYYY").format("YYYY"); // use data for the age column
            return date == year;
        };

        $(document).ready(function () {
            $.fn.dataTable.moment( 'DD/MM/YYYY' );

            @if (!$dataType->server_side)
                var datatableConfig = {!! json_encode(
                    array_merge([
                        "autoWidth" => false,

                        "language" => __('voyager::datatable'),
                        "columnDefs" => [
                            ['width' => "20px", 'targets' => 0 ],
                            ['width' => "150px", 'targets' => 1 ],
                            ['targets' => -1, 'searchable' =>  false, 'orderable' => false, 'width' => "200px"],
                            ['width' => "72px", 'targets' => "_all" ],
                        ],
                        "scrollX"=> true
                    ],
                    config('voyager.dashboard.data_tables', []))
                , true) !!};

            datatableConfig.order = [[6, "desc"]];

            datatableConfig.rowGroup = {
                    "dataSrc":  function (row) {

                        return moment(row[6], "DD/MM/YYYY").format(`YYYY`);

                    }

            };



            var table = $('#dataTable').DataTable(datatableConfig);

            table.rowGroup().dataSrc();

            var example = $("#summaryReservation").DataTable({
                columns: [
                    { title : "Year", visible: false},
                    @if( Auth::user()->hasRole(['admin', 'investis', 'investisdom'])){ title : "CGP", visible: false}, @endif
                    { title: "Contact" },
                    { title: "Nombre de Réservation"},
                    { title: "Total comission par Contact" },
                    { title: "Total reduction d'impots" },
                ],
                "order": [[ 1, 'asc' ]],
                rowGroup: {
                    startRender: function ( rows, group, level ) {
                        return group;
                    },
                    endRender: function ( rows, group, level ) {
                        if(level === 1 ) {
                            var nbReservation = rows
                                .data()
                                .pluck(3)
                                .reduce( function (a, b) {
                                    return a + b;
                                }, 0);

                            var totalCommi = rows
                                .data()
                                .pluck(4)
                                .reduce( function (a, b) {

                                    b = parseFloat(b.replace(/\s|€/g,'').replace(/,/g,'.'));

                                    return a + b;
                                }, 0);

                            totalCommi = $.fn.dataTable.render.number(' ', ',', 2, ' Total Commission: ', '€').display( totalCommi );

                            var totalRI = rows
                                .data()
                                .pluck(5)
                                .reduce( function (a, b) {

                                    b = parseFloat(b.replace(/\s|€/g,'').replace(/,/g,'.'));

                                    return a + b;
                                }, 0);

                            totalRI = $.fn.dataTable.render.number(' ', ',', 2, ' Total RI: ', '€').display( totalRI );

                            return $("<tr></tr>")
                                .append('<td>&nbsp;</td>')
                                .append('<td><strong> Nombre de réservations: '+nbReservation+'</strong></td>')
                                .append('<td>'+totalCommi+'</td>')
                                .append('<td>'+totalRI+'</td>');
                        }
                    },
                    dataSrc: [ 0 @if( Auth::user()->hasRole(['admin', 'investis', 'investisdom'])), 1 @endif ]
                }

            });

            var dates = table.rows().data().pluck(6).toArray();

            dates = dates.map(function(date) {return moment(date, "DD/MM/YYYY").format("YYYY")}).filter(function(value, index, self) {
                return self.indexOf(value) === index;
            });

            for(date of dates){
                $('#yearChange').append('<option value="'+date+'">'+date+'</option>');
            }

            // Event listener to the two range filtering inputs to redraw on input
            $('#yearChange').change( function() {

                var year = parseInt( $('#yearChange').val(), 10 );

                if(!isNaN(year)){
                    var datas = [];
                    var myData = table.rows().data();
                    myData = myData.filter(filterDate);
                    datas = aggregateUsersByYear(myData, year);

                    example.rows().remove();
                    example.rows.add(datas);

                    example.draw();
                    $(".summary").show();

                    //show new table with sum off datas
                    show();

                }else{

                    $(".summary").hide();

                    //remove table with sum off datas
                    hide();
                }

                table.column(6).search(isNaN(year)? "" : year).draw();

            } );

            var aggregateUsersByYear = function (myData, year){
                datas = [];

                myData.column(3).data().unique().each(function(name, index){
                    var sumNBReservations = myData.filter(function(data){
                        if(name == data[3]) return true;
                        return false;
                    }).reduce( function ( total) {
                        return total+1 ;
                    },0 );

                    if(sumNBReservations > 0){
                        var sumRM = myData.filter(function(data){
                            if(name == data[3]) return true;
                            return false;
                        }).reduce( function ( total, value) {

                            var convertMontantResa = value[4].replace(/\s|€/g,'');
                            convertMontantResa = convertMontantResa.replace(/,/g,'.');

                            return total + parseFloat(convertMontantResa) ;
                        },0 );

                        var sumMC = myData.filter(function(data){
                            if(name == data[3]) return true;
                            return false;
                        }).reduce( function ( total, value) {

                            var convertMontantComi = value[9].replace(/\s|€/g,'');
                            convertMontantComi = convertMontantComi.replace(/,/g,'.');

                            return total + parseFloat(convertMontantComi) ;
                        },0 );

                        @if( Auth::user()->hasRole(['admin', 'investis', 'investisdom']))
                            var CGP = myData.filter(function(data){
                                if(name == data[3]) return true;
                                return false;
                            }).toArray()[0][2];
                        @endif

                            sumMCFormat = new IntlMessageFormat('{sumMC, number, EUR}', 'fr-FR', {
                                number: {
                                    EUR: {
                                        style   : 'currency',
                                        currency: 'EUR'
                                    }
                            }});

                            sumRMFormat = new IntlMessageFormat('{sumRM, number, EUR}', 'fr-FR', {
                                number: {
                                    EUR: {
                                        style   : 'currency',
                                        currency: 'EUR'
                                    }
                            }});

                        datas.push([year, @if( Auth::user()->hasRole(['admin', 'investis', 'investisdom']))CGP, @endif name, sumNBReservations, sumMCFormat.format({"sumMC" : sumMC}), sumRMFormat.format({"sumRM" : sumRM})]);
                    }

                });

                return datas;
            }

            function show() {
                document.getElementById('totalSumarry').style.display = 'block';
            }

            function hide() {
                document.getElementById('totalSumarry').style.display = 'none';
            }

            @else
                $('#search-input select').select2({
                    minimumResultsForSearch: Infinity
                });
            @endif

            @if ($isModelTranslatable)
                $('.side-body').multilingual();
                //Reinitialise the multilingual features when they change tab
                $('#dataTable').on('draw.dt', function(){
                    $('.side-body').data('multilingual').init();
                })
            @endif
            $('.select_all').on('click', function(e) {
                $('input[name="row_id"]').prop('checked', $(this).prop('checked'));
            });
        });


        var deleteFormAction;
        $('td').on('click', '.delete', function (e) {
            $('#delete_form')[0].action = '{{ route('voyager.'.$dataType->slug.'.destroy', ['id' => '__id']) }}'.replace('__id', $(this).data('id'));
            $('#delete_modal').modal('show');
        });

        @if($usesSoftDeletes)
            @php
                $params = [
                    's' => $search->value,
                    'filter' => $search->filter,
                    'key' => $search->key,
                    'order_by' => $orderBy,
                    'sort_order' => $sortOrder,
                ];
            @endphp
            $(function() {
                $('#show_soft_deletes').change(function() {
                    if ($(this).prop('checked')) {
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 1]), true)) }}"></a>');
                    }else{
                        $('#dataTable').before('<a id="redir" href="{{ (route('voyager.'.$dataType->slug.'.index', array_merge($params, ['showSoftDeleted' => 0]), true)) }}"></a>');
                    }

                    $('#redir')[0].click();
                })
            })
        @endif
        $('input[name="row_id"]').on('change', function () {
            var ids = [];
            $('input[name="row_id"]').each(function() {
                if ($(this).is(':checked')) {
                    ids.push($(this).val());
                }
            });
            $('.selected_ids').val(ids);
        });


    </script>

    <script>
        function myFunction(id, doc) {
            elem=document.getElementById(id);
            elem.click();
        }

        function documentUploaded(id, doc, form){
            document.getElementById(doc).title = document.getElementById(id).value;
            document.getElementById(form).submit();
        }
    </script>
@stop
