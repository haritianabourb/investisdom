@extends('voyager::master')

@section('page_title', "simulateur")

@section('page_header')
    <h1 class="page-title">
        <i class="voyager-calculate"></i> Simulateur

        {{--<a href="{{ route('voyager.'.$dataType->slug.'.index') }}" class="btn btn-warning">--}}
        {{--<span class="glyphicon glyphicon-list"></span>&nbsp;--}}
        {{--{{ __('voyager::generic.return_to_list') }}--}}
        {{--</a>--}}
    </h1>
    @include('voyager::multilingual.language-selector')
@stop

@section('content')
    <div class="page-content browse container-fluid">
        @include('voyager::alerts')
        <div class="row">
            <div class="col-md-12">
                <div class="panel panel-bordered">
                    <div class="panel-body">
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        {{--Step 1--}}
                        <form action="{{route("admin.cgps.simulator.simulate")}}" class="form form-horizontal"
                              enctype="multipart/form-data" method="post">
                            {{csrf_field()}}

                            <div class="form-group col-md-6">
                                <label class="col-md-8 control-label">Montant de la réduction d'impôt utilisé avant
                                    opération Girardin :</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="montant_ri"
                                           value="{{ old('montant_ri', '') }}" min="0" step="01">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-8 control-label">Vous souhaitez connaitre le montant de
                                    souscription ou de réduction d'impôt :</label>
                                <div class="col-md-4">
                                    <select name="mode_calcul" class="form-control">
                                        <option value="souscription"
                                                @if(old('mode_calcul', '') == 'souscription') selected @endif>
                                            Souscription
                                        </option>
                                        <option value="reduction_impot"
                                                @if(old('mode_calcul', '') == 'reduction_impot') selected @endif>
                                            Réduction d'impôt
                                        </option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-8 control-label">Vos frais de commercialisation %:</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="com_cgp"
                                           value="{{ old('com_cgp', '') }}" min="0.0" max="100.0" step="0.01">
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-8 control-label">Nombre de SNC :</label>
                                <div class="col-md-4">
                                    <input class="form-control" type="number" name="nb_snc"
                                           value="{{ old('nb_snc', '') }}" min="0" step="1" >
                                </div>
                            </div>

                            <div class="form-group col-md-6">
                                <label class="col-md-8 control-label">Assistance juridique :</label>
                                <div class="col-md-4">
                                    <select name="ass_juridique" class="form-control">
                                        <option value="oui" @if(old('ass_juridique', '') == 'oui') selected @endif>Oui
                                        </option>
                                        <option value="non" @if(old('ass_juridique', '') == 'non') selected @endif>Non
                                        </option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group col-md-6">
                                <label class="col-md-8 control-label">Type de contrat souhaité :</label>
                                {{--{{var_dump($typeContrat)}}--}}
                                <div class="col-md-4">
                                    <select name="contrat" class="form-control">
                                        @foreach($typeContrat as $contrat)
                                            <option value="{{$contrat->slug}}" @if(old('contrat', '') == $contrat->slug) selected @endif title="{{$contrat->description}}">
                                                {{ $contrat->nom }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                            @isset($m2)
                                {{--Step 2--}}
                                <div class="col-md-12">
                                    <hr class="bg-dark"/>
                                </div>
                                <div class="form-group col-md-12">
                                    <span id="helpBlock" class="help-block text-danger">
                                        @if(old('mode_calcul') == "souscription")
                                            Le montant maximum de la souscription pour l'année est de
                                            <strong>{{$m2}}</strong>€
                                            soit une réduction d'impôt possible en Girardin de
                                            <strong>{{$m}}</strong>€

                                        @else
                                        La réduction maximum d'impôt possible en Girardin est de
                                        <strong>{{$m}}</strong>€
                                        soit une souscription maximum pour l'année de
                                        <strong>{{$m2}}</strong>€
                                    @endif
                                    </span>
                                    <div class="col-md-8">
                                        <label class="col-md-4 control-label">Indiquer le
                                        @if($mode_calcul == "souscription")
                                                montant de la souscription :
                                        @else
                                                montant de la réduction d'impôt :
                                        @endif
                                        </label>
                                        <div class="col-md-4">
                                            <input class="form-control" type="number" name="montant_souscription"
                                                   value="{{ old('montant_souscription', 0) }}" min="0" step="0.01">
                                        </div>
                                    </div>
                                </div>
                            @endisset
                            <div class="col-md-12">
                                <hr>
                                <input type="submit" class="btn btn-primary btn-lg " value="Valider">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        @isset($gain)
            {{--Result--}}
            <div class="panel">
                <div class="panel-body">
                    <table class="table table-bordered table-striped table-hover">
                        <thead>
                        <tr>
                            <th></th>
                            <th style="background-color:#ccc;">Plafond de droit commun sans opération Girardin</th>
                            <th style="background-color:#ccc;">Plafond spécifique DOM avec opération Girardin</th>
                            <th style="background-color:#ccc;">Nature d'opération</th>
                        </tr>
                        </thead>
                        <tr>
                            <td></td>
                            <td>10000 €</td>
                            <td>18000 €</td>
                            <td class="active"><b>Plein droit</b></td>
                        </tr>
                        <tr>
                            <td>Montant de réduction utilisé avant opération Girardin</td>
                            <td>{{old('montant_ri')}} €</td>
                            <td></td>
                            <td class="active"><strong>Type de contrat : {{ $typeContrat->where("slug", old('contrat'))->first()->nom }}</strong></td>
                        </tr>
                        <tr>
                            <td>Total de réduction d'impôt possible disponible</td>
                            <td>{{ $tot }} €</td>
                            <td>{{$tot2}} €</td>
                            <td class="active"><b>Enveloppe globale : {{$taux}} %</b></td>
                        </tr>
                        <tr>
                            <td class="info">Montant de la réduction d'impôt possible en Girardin</td>
                            <td class="info"><b>{{$m}} €</b></td>
                            <td class="info"></td>
                            <td class="active"><b>Frais de commercialisation : <?php echo old('com_cgp', 0); ?> %</b>
                            </td>
                        </tr>
                        <tr>
                            <td class="info">Soit une souscription maximum de</td>
                            <td class="info"><b>{{$m2}} €</b></td>
                            <td class="info"></td>
                            <td class="active"><strong>
                                    @if (old('mode_calcul', 0) == "souscription")
                                        Gain NET fiscal sur opération : {{round(($gain), 2)}} €
                                    @else
                                        Gain NET fiscal sur opération : {{round(($gain2), 2)}} €
                                    @endif
                                </strong>
                            </td>
                        </tr>
                        <tr>
                            <td class="success">Vous souhaitez connaitre le montant de la {{old('mode_calcul', 0)}}</td>
                            @if (old('mode_calcul', 0) == "souscription")
                                <td class="success" colspan="2">Montant de la souscription</td>
                            @else
                                <td class="success" colspan="2">Montant de la réduction d'impôt souhaité</td>
                            @endif
                            <td class="active"><b>Rentabilité fiscale sur l'année : <?php echo $renta; ?> %</b></td>
                        </tr>

                        @if (old('mode_calcul', 0) == "souscription")
                        <tr>
                            <td class="success">Montant de la souscription à INVESTIS DOM</td>
                            <td class="success"><?php echo old('montant_souscription', 0); ?> €</td>
                            <td class="success"></td>
                            <td class="active"></td>
                        </tr>
                        <tr>
                            <td class="success">Montant de la réduction d'impôt obtenue</td>
                            <td class="success"><?php echo $mri; ?> €</td>
                            <td class="success"></td>
                            <td class="active"></td>
                        </tr>
                        @else
                        <tr>
                            <td class="success">Montant de la souscription à INVESTIS DOM</td>
                            <td class="success"><?php echo round(($ms), 2); ?> €</td>
                            <td class="success"></td>
                            <td class="active"></td>
                        </tr>
                        <tr>
                            <td class="success">Montant de la réduction d'impôt obtenue</td>
                            <td class="success"><?php echo old('montant_souscription', 0); ?> €</td>
                            <td class="success"></td>
                            <td class="active"></td>
                        </tr>
                        @endif
                        <tr>
                            <td>Nombre souhaité de SNC</td>
                            <td><?php echo old('nb_snc', 0); ?></td>
                            <td></td>
                            <td class="active"></td>
                        </tr>
                        <tr>
                            <td>Assistance juridique</td>
                            @if (old('contrat', 0) == "confort")
                            <td>{{old('ass_juridique', 0)}} 75 euros / SNC pour les 5 ans</td>
                            @else
                            <td> Assistance juridique offerte dans le contrat Sérénité +</td>
                            @endif
                            <td></td>
                            <td class="active"></td>
                        </tr>
                        <tr>
                            <td style="background-color:#ccc;">Chèque de souscription et de frais à établir</td>
                            <td style="background-color:#ccc;">Souscription à l'ordre de INVESTIS DOM COLLECTE</td>
                            <td style="background-color:#ccc;">Frais d'enregistrement à l'ordre de INVESTIS DOM</td>
                            <td style="background-color:#ccc;"></td>
                        </tr>
                        <tr>
                            <td></td>
                            @if (old('mode_calcul', 0) == "souscription")
                                <td><strong>{{old('montant_souscription', 0)}} €</strong></td>
                            @else
                                <td><b><?php echo round(($ms), 2); ?> €</b></td>
                            @endif
                            <td>
                                @if (old('contrat', 0) == "confort" && old('ass_juridique', 0) == "oui")
                                    <strong>{{$frais1}} €</strong>
                                @else
                                    <strong>{{$frais2}} €</strong>
                                @endif
                            </td>
                        </tr>
                    </table>
                </div>
            </div>
        @endisset
    </div>
    </div>
@endsection

@section("javascript")
    <script>
        $('select').select2()
    </script>
@endsection