@extends('voyager::master')

@section('page_title', __('voyager::generic.view').' '.$dataType->display_name_singular)

@section('page_header')
    <h1 class="page-title">
        <i class="{{ $dataType->icon }}"></i>  {{$dataTypeContent->name}} <small>- {{$dataTypeContent->identifiant}}</small>

        @can('edit', $dataTypeContent)
        <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getRouteKey()) }}" class="btn btn-info">
            <span class="glyphicon glyphicon-pencil"></span>&nbsp;
            {{ __('generic.edit') }}
        </a>
        @endcan
        @can('delete', $dataTypeContent)
            @if($isSoftDeleted)
                <a href="{{ route('voyager.'.$dataType->slug.'.restore', $dataTypeContent->getKey()) }}" title="{{ __('voyager::generic.restore') }}" class="btn btn-default restore" data-id="{{ $dataTypeContent->getKey() }}" id="restore-{{ $dataTypeContent->getKey() }}">
                    <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.restore') }}</span>
                </a>
            @else
            <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete" data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                <i class="voyager-trash"></i> <span class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
            </a>
            @endif
        @endcan

        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
            <span class="glyphicon glyphicon-list"></span>&nbsp;
            {{ __('voyager::generic.return_to_list') }}
        </a>

        <a type="button" href="{{ route('admin.cgps.generate-convention', ['cgp' => $dataTypeContent]) }}" class="btn btn-default generate-pdf-convention"><i class="voyager-documentation"></i> Generer la convention</a>
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="row">
            <div class="col-md-12">

                <div class="panel panel-bordered" style="padding-bottom:5px;">
                  <div class="panel-body" style="padding-top:10px;">
                    <!-- form start -->
                    @foreach($dataType->readRows as $row)
                      @php
                          if ($dataTypeContent->{$row->field.'_read'}) {
                              $dataTypeContent->{$row->field} = $dataTypeContent->{$row->field.'_read'};
                          }
                      @endphp
                        @php $rowDetails = $row->details;
                         if($rowDetails === null){
                                $rowDetails=new stdClass();
                                $rowDetails->options=new stdClass();
                         }


                             $display_options = isset($rowDetails->display) ? $rowDetails->display : NULL;
                        @endphp
                        @if ($rowDetails && isset($rowDetails->section) && isset($rowDetails->section->text))
                          @php
                            $sectionOpened = true;
                          @endphp
                          @if(!$loop->first)
                            </div>
                          @endif
                            <div class="row">
                          <div class="col-md-12" style="border-bottom:0;">
                            <h3 class="text-{{$rowDetails->section->align ?? 'center'}}" style="color: {{$rowDetails->section->color ?? '#333'}};background-color: {{$rowDetails->section->bgcolor ?? '#f0f0f0'}};padding: 5px; padding-left: 15px;">{{$rowDetails->section->text}}</h3>
                          </div>
                        @endif
                        @if($row->field == "cgp_belongsto_contact_relationship")
                                    <div class="col-sm-6">
                        @else
                          <div class="col-md-{{ $display_options->width ?? 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                        @endif
                            <h5>{{ $row->display_name }}</h5>
                            @if (isset($row->details->view))
                                  @include($row->details->view, ['row' => $row, 'dataType' => $dataType, 'dataTypeContent' => $dataTypeContent, 'content' => $dataTypeContent->{$row->field}, 'action' => 'read'])
                            @elseif($row->field == "cgp_belongsto_contact_relationship")
                                  @include('voyager::partials.contact', ['contact' => $dataTypeContent->contact])
                            @elseif($row->type == "image")
                                <img class="img-responsive"
                                     src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                            @elseif($row->type == 'multiple_images')
                                @if(json_decode($dataTypeContent->{$row->field}))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                        <img class="img-responsive"
                                             src="{{ filter_var($file, FILTER_VALIDATE_URL) ? $file : Voyager::image($file) }}">
                                    @endforeach
                                @else
                                    <img class="img-responsive"
                                         src="{{ filter_var($dataTypeContent->{$row->field}, FILTER_VALIDATE_URL) ? $dataTypeContent->{$row->field} : Voyager::image($dataTypeContent->{$row->field}) }}">
                                @endif
                            @elseif($row->type == 'relationship')
                                  @if($row->field == "cgp_belongstomany_contact_relationship")
                                      {{--
                                          TODO remove this and make it more configurable
                                          For now, it's here, but I really want a custom attribute, like money or percent customs fields
                                       --}}
                                      @include("voyager::formfields.custom.cgps.contacts", ['view' => 'read', 'options' => $rowDetails])
                                  @else
                                      @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
                                  @endif
                            @elseif($row->type == 'select_dropdown' && property_exists($rowDetails, 'options') &&
                                    !empty($rowDetails->options->{$dataTypeContent->{$row->field}})
                            )

                                <?php echo $rowDetails->options->{$dataTypeContent->{$row->field}};?>
                            @elseif($row->type == 'select_dropdown' && $dataTypeContent->{$row->field . '_page_slug'})
                                <a href="{{ $dataTypeContent->{$row->field . '_page_slug'} }}">{{ $dataTypeContent->{$row->field}  }}</a>
                            @elseif($row->type == 'select_multiple')
                                @if(property_exists($rowDetails, 'relationship'))

                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                        @if($item->{$row->field . '_page_slug'})
                                        <a href="{{ $item->{$row->field . '_page_slug'} }}">{{ $item->{$row->field}  }}</a>@if(!$loop->last), @endif
                                        @else
                                        {{ $item->{$row->field}  }}
                                        @endif
                                    @endforeach

                                @elseif(property_exists($rowDetails, 'options'))
                                    @foreach(json_decode($dataTypeContent->{$row->field}) as $item)
                                     {{ $rowDetails->options->{$item} . (!$loop->last ? ', ' : '') }}
                                    @endforeach
                                @endif
                            @elseif($row->type == 'date' || $row->type == 'timestamp')
                                {{ property_exists($row->details, 'format') ? \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($row->details->format) : $dataTypeContent->{$row->field} }}
                            @elseif($row->type == 'checkbox')
                                @if(property_exists($row->details, 'on') && property_exists($row->details, 'off'))
                                    @if($dataTypeContent->{$row->field})
                                    <span class="label label-info">{{ $row->details->on }}</span>
                                    @else
                                    <span class="label label-primary">{{ $row->details->off }}</span>
                                    @endif
                                @else
                                {{ $dataTypeContent->{$row->field} }}
                                @endif
                            @elseif($row->type == 'color')
                                <span class="badge badge-lg" style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                            @elseif($row->type == 'coordinates')
                                @include('voyager::partials.coordinates')
                            @elseif($row->type == 'rich_text_box')
                                @include('voyager::multilingual.input-hidden-bread-read')
                                <p>{!! $dataTypeContent->{$row->field} !!}</p>
                            @elseif($row->type == 'file')
                                  @if(!empty($dataTypeContent->{$row->field}))
                                      @if(json_decode($dataTypeContent->{$row->field}))
                                          @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                              <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                                  {{ $file->original_name ?: '' }}
                                              </a>
                                              <br/>
                                          @endforeach
                                      @else
                                          <form role="form"
                                                class="form-edit-add"
                                                id="{{$dataType->name}}_edit_add"
                                                action="{{ route('admin.document.upload', ['slug'=>$dataType->slug , 'id' => $dataTypeContent->getKey()]) }}"
                                                method="POST" enctype="multipart/form-data">
                                              <input @if($row->required == 1 && !isset($dataTypeContent->{$row->field})) required @endif type="file" name="{{ $row->field }}[]" multiple="multiple">
                                              <button type="submit" class="btn btn-primary save">{{ __('voyager::generic.save') }}</button>
                                              {{ csrf_field() }}
                                              {{ method_field("PUT") }}
                                          </form>

                                      @endif
                                  @endif
                            @elseif($row->type == 'email')
                                  @include('voyager::formfields.custom.email', ["view" => "read"])
                            @elseif($row->type == 'money')
                                  @include('voyager::partials.money')
                            @elseif($row->type == 'percentage')
                                  @include('voyager::partials.percentage')
                            @else
                                @include('voyager::multilingual.input-hidden-bread-read')
                                @if(isset($display_options->percent) && $display_options->percent && floatval($display_options->percent))
                                    @include('voyager::partials.custom.percent')
                                @else
                                  <p>{{ $dataTypeContent->{$row->field} }}</p>
                                @endif
                            @endif
                            @if(isset($sectionOpened) && $sectionOpened && $loop->last)
                              </div>
                            @endif
                      </div>
                    @endforeach
                  </div><!-- panel-body -->

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
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field('DELETE') }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->display_name_singular) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right" data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
                </div>
            </div><!-- /.modal-content -->
        </div><!-- /.modal-dialog -->
    </div><!-- /.modal -->
@stop

@section('javascript')
    @if ($isModelTranslatable)
    <script>
        $(document).ready(function () {
            $('.side-body').multilingual();
        });
    </script>
    <script src="{{ voyager_asset('js/multilingual.js') }}"></script>
    @endif
    <script>
        var deleteFormAction;
        $('.delete').on('click', function (e) {
            var form = $('#delete_form')[0];

            if (!deleteFormAction) { // Save form action initial value
                deleteFormAction = form.action;
            }

            form.action = deleteFormAction.match(/\/[0-9]+$/)
                ? deleteFormAction.replace(/([0-9]+$)/, $(this).data('id'))
                : deleteFormAction + '/' + $(this).data('id');
            console.log(form.action);

            $('#delete_modal').modal('show');
        });

    </script>
@stop
