@extends('voyager::master')

@section('page_title', $dataType->display_name_singular . ' : ' .  $dataTypeContent->identifiant)

@section('page_header')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-9">
                <h1 class="page-title">
                    <i class="{{ $dataType->icon }}"></i> {{ __('voyager::generic.viewing') }} {{ ucfirst($dataType->display_name_singular) }} : {{$dataTypeContent->identifiant}}
                    &nbsp;
                </h1>
            </div>
            <div class="col-md-3">
                    <div class="affix hidden-sm" style="z-index: 5;">
                        <div class="row text-center">
                            <div class="col-md-12">
                                @can('edit', $dataTypeContent)
                                    <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                                        <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                                        {{ __('voyager::generic.edit') }}
                                    </a>
                                @endcan
                                @can('delete', $dataTypeContent)
                                    <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete"
                                       data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                                        <i class="voyager-trash"></i> <span
                                                class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                                    </a>
                                @endcan

                                <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
                                    <span class="glyphicon glyphicon-list"></span>&nbsp;
                                    {{ __('voyager::generic.return_to_list') }}
                                </a>
                                @include('voyager::multilingual.language-selector')
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    </div>
@stop

@section('content')
    <div class="page-content read container-fluid">
        <div class="col-md-8">
            <div class="row visible-sm">
                <div class="col-md-12">
                        @can('edit', $dataTypeContent)
                                            <a href="{{ route('voyager.'.$dataType->slug.'.edit', $dataTypeContent->getKey()) }}" class="btn btn-info">
                                <span class="glyphicon glyphicon-pencil"></span>&nbsp;
                                {{ __('voyager::generic.edit') }}
                            </a>
                        @endcan
                        @can('delete', $dataTypeContent)
                            <a href="javascript:;" title="{{ __('voyager::generic.delete') }}" class="btn btn-danger delete"
                                               data-id="{{ $dataTypeContent->getKey() }}" id="delete-{{ $dataTypeContent->getKey() }}">
                                <i class="voyager-trash"></i> <span
                                                        class="hidden-xs hidden-sm">{{ __('voyager::generic.delete') }}</span>
                            </a>
                        @endcan

                        <a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">
                            <span class="glyphicon glyphicon-list"></span>&nbsp;
                            {{ __('voyager::generic.return_to_list') }}
                        </a>
                        @include('voyager::multilingual.language-selector')
                </div>
            </div>
            <div class="row">
                <div class="col-md-12">

                    <div class="panel panel-bordered" style="padding-bottom:5px;">
                        <div class="panel-body" style="padding-top:10px;">
                            <!-- form start -->
                            @foreach($dataType->readRows as $row)
                                @php $rowDetails = json_decode($row->details);
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
                                <h3 class="text-{{$rowDetails->section->align or 'center'}}"
                                    style="color: {{$rowDetails->section->color or '#333'}};background-color: {{$rowDetails->section->bgcolor or '#f0f0f0'}};padding: 5px; padding-left: 15px;">{{$rowDetails->section->text}}</h3>
                            </div>
                                @endif
                            <div class="col-md-{{ $display_options->width or 12 }}" @if(isset($display_options->id)){{ "id=$display_options->id" }}@endif>
                                <h5>{{ $row->display_name }}</h5>
                                @if($row->field == 'schedule')
                                    @include('voyager::formfields.custom.mandat_van_paiement')
                                    {{-- @elseif($row->field == 'resultats')
                                      @include('voyager::formfields.custom.mandat_resultat') --}}
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
                                    @include('voyager::formfields.relationship', ['view' => 'read', 'options' => $rowDetails])
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
                                                <a href="{{ $item->{$row->field . '_page_slug'} }}">{{ $item->{$row->field}  }}</a>@if(!$loop->last)
                                                    , @endif
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
                                    {{ $rowDetails && property_exists($rowDetails, 'format') ? \Carbon\Carbon::parse($dataTypeContent->{$row->field})->formatLocalized($rowDetails->format) : $dataTypeContent->{$row->field} }}
                                @elseif($row->type == 'checkbox')
                                    @if($rowDetails && property_exists($rowDetails, 'on') && property_exists($rowDetails, 'off'))
                                        @if($dataTypeContent->{$row->field})
                                            <span class="label label-info">{{ $rowDetails->on }}</span>
                                        @else
                                            <span class="label label-primary">{{ $rowDetails->off }}</span>
                                        @endif
                                    @else
                                        {{ $dataTypeContent->{$row->field} }}
                                    @endif
                                @elseif($row->type == 'color')
                                    <span class="badge badge-lg"
                                          style="background-color: {{ $dataTypeContent->{$row->field} }}">{{ $dataTypeContent->{$row->field} }}</span>
                                @elseif($row->type == 'coordinates')
                                    @include('voyager::partials.coordinates')
                                @elseif($row->type == 'rich_text_box')
                                    @include('voyager::multilingual.input-hidden-bread-read')
                                    <p>{!! $dataTypeContent->{$row->field} !!}</p>
                                @elseif($row->type == 'file')
                                    @if(json_decode($dataTypeContent->{$row->field}))
                                        @foreach(json_decode($dataTypeContent->{$row->field}) as $file)
                                            <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($file->download_link) ?: '' }}">
                                                {{ $file->original_name ?: '' }}
                                            </a>
                                            <br/>
                                        @endforeach
                                    @else
                                        <a href="{{ Storage::disk(config('voyager.storage.disk'))->url($row->field) ?: '' }}">
                                            {{ __('voyager::generic.download') }}
                                        </a>
                                    @endif
                                @elseif($row->type == 'money')
                                    @include('voyager::partials.money')
                                @elseif($row->type == 'percentage')
                                    @include('voyager::partials.percentage')
                                @else
                                    @include('voyager::multilingual.input-hidden-bread-read')
                                    @if(isset($display_options->percent) && $display_options->percent)
                                        @include('voyager::partials.custom.percent')
                                    @elseif(is_null($dataTypeContent->{$row->field}))
                                        <p class="label label-warning">Non renseign&eacute;</p>
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
        <div class="col-md-4 hidden-sm">
            <div class="row padding-top">
                <div class="col-md-12">
                    <div class="affix">
                        {{--<address>--}}
                            {{--@php($leaseholder = $dataTypeContent->leaseholderId->where('id', $dataTypeContent->leaseholderId->id)->first())--}}
                            {{--<strong>{{$leaseholder->name}}</strong><br/>--}}
                        {{--</address>--}}
                        {{--<h5>--}}
                            {{--Fournisseur--}}
                        {{--</h5>--}}
                        {{--<address>--}}
                            {{--@php($supplier = $dataTypeContent->supplierId->where('id', $dataTypeContent->supplierId->id)->first())--}}
                            {{--<strong>{{$supplier->name}}</strong><br/>--}}
                        {{--</address>--}}
                        <table class="table table-striped table-hover table-borderless">
                            <thead>
                                <tr>
                                    <th colspan="4" class="text-center"><strong>{{$dataTypeContent->identifiant}}</strong></th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Montant Investissement:</td><td class="text-right">{{$dataTypeContent->montant_ht}}</td>
                                    <td>TVA NPR: </td><td class="text-right">{{$dataTypeContent->tva_npr}}</td>
                                </tr>
                                <tr>
                                    <td>Fraix Eligibles:</td><td class="text-right">{{$dataTypeContent->fraix_defiscalisable}}</td>
                                    <td>TVA sur Investissement:</td><td class="text-right">{{$dataTypeContent->tva_investissement}}</td>
                                </tr>
                                <tr>
                                    <td>Fraix Non Eligibles:</td><td class="text-right">{{$dataTypeContent->fraix_non_defiscalisable}}</td>
                                    <td>Subvention:</td><td class="text-right">{{($dataTypeContent->montant_subvention ?? 0) }}</td>
                                </tr>
                                <tr>
                                    <td>Carte Grise:</td><td class="text-right">{{$dataTypeContent->carte_grise}}</td>
                                    <td>Montant HT:</td><td class="text-right">{{$dataTypeContent->montant_ht_mandat}}</td>
                                </tr>
                                <tr>
                                    <td>Deduction Base:</td><td class="text-right">{{$dataTypeContent->montant_deduction ?? 0}}</td>
                                    <td>Base Eligible:</td><td class="text-right">{{$dataTypeContent->base_defiscalisable}}</td>
                                </tr>
                                <tr>
                                    <td>Taux de Reduction:</td><td class="text-right">{{number_format($dataTypeContent->ri_amount_type_id ?? 0, 2, ',', ' ')}} %</td>
                                    <td>Montant T.T.C:</td><td class="text-right">{{$dataTypeContent->montant_ttc_mandat}}</td>
                                </tr>
                                <tr>
                                    <td>Apport SNC:</td><td class="text-right">{{$dataTypeContent->apport_snc?? 0}}</td>
                                    <td>y compris l'avance de TVA de :</td><td class="text-right">{{$dataTypeContent->montant_ttc_mandat}}</td>
                                </tr>
                                <tr>
                                    <td>Taux de Retrocession:</td><td class="text-right">{{number_format(($dataTypeContent->retrocession?? 0) * 100, 2, ',', " ")}} %</td>
                                    <td>Taux sur base eligible:</td><td class="text-right">{{number_format(($dataTypeContent->taux_base_eligible ?? 0) * 100, 2, ',', " ")}} %</td>
                                </tr>
                                <tr>
                                    <td>Financement:</td><td class="text-right">{{$dataTypeContent->complement_financement}}</td>
                                    <td colspan="2" class="text-right">{{$dataTypeContent->taux_pret}} sur {{$dataTypeContent->duree_pret}} échéances</td>
                                </tr>
                                <tr>
                                    <td>Apport Locataire:</td><td class="text-right">{{$dataTypeContent->apport_locataire}}</td>
                                    <td>Reste a Financer:</td><td class="text-right">{{$dataTypeContent->montant_compl_fin}}</td>
                                </tr>
                                <tr>
                                    <td>Loyer H.T:</td><td class="text-right">{{$dataTypeContent->echeance_loyer}}</td>
                                    <td>Soit Loyer T.T.C:</td><td class="text-right">{{$dataTypeContent->echeance_loyer_ttc}}</td>
                                </tr>
                                <tr>
                                    <td>Tva sur Loyer:</td><td class="text-right">{{$dataTypeContent->tva_loyer}}</td>
                                    <td>Honoraire Juridique:</td><td class="text-right">{{$dataTypeContent->hono_jur}}</td>
                                </tr>
                                <tr>
                                    <td>CFE & Taxes Annexes:</td><td class="text-right">{{$dataTypeContent->cfe_tax}}</td>
                                    <td colspan="2">&nbsp;</td>
                                </tr>
                            </tbody>
                        </table>
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
                    <button type="button" class="close" data-dismiss="modal"
                            aria-label="{{ __('voyager::generic.close') }}"><span
                                aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title"><i
                                class="voyager-trash"></i> {{ __('voyager::generic.delete_question') }} {{ strtolower($dataType->display_name_singular) }}
                        ?</h4>
                </div>
                <div class="modal-footer">
                    <form action="{{ route('voyager.'.$dataType->slug.'.index') }}" id="delete_form" method="POST">
                        {{ method_field("DELETE") }}
                        {{ csrf_field() }}
                        <input type="submit" class="btn btn-danger pull-right delete-confirm"
                               value="{{ __('voyager::generic.delete_confirm') }} {{ strtolower($dataType->display_name_singular) }}">
                    </form>
                    <button type="button" class="btn btn-default pull-right"
                            data-dismiss="modal">{{ __('voyager::generic.cancel') }}</button>
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
