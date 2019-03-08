@php($cgp = \App\CGP::ofContact($contact)->first())
@php($representor = \App\Contact::find($cgp->contact_id))
<div class="container">
    @isset($cgp)
        <hr/>
        <div class="row">
            <div class="col-md-6 table-responsive">
                <h3 class="text-center">Informations du CGP: {{$cgp->name}}</h3>
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>Adresse</td>
                            <td>{{$cgp->address_1}}@isset($cgp->address_2) {{$cgp->address_2}}@endisset</td>
                        </tr>
                        <tr>
                            <td>Ville</td>
                            <td>{{$cgp->city}}</td>
                        </tr>
                        <tr>
                            <td>Code Postal</td>
                            <td>{{$cgp->postal_code}}</td>
                        </tr>
                        <tr>
                            <td>Forme Juridique</td>
                            <td>{{$cgp->juridical_registration}}</td>
                        </tr>
                        <tr>
                            <td>Immatriculation</td>
                            <td>
                            @switch($cgp->type_registration)
                                @case("CMA")
                                    Chambre des Métiers et de l'Artisanat
                                    @break
                                @case("RCS")
                                    Registre des Commerces et des Sociétés
                                    @break
                                @case("SS")
                                    Sécurité sociale
                                    @break
                            @endswitch
                            </td>
                        </tr>
                        <tr>
                            <td>Date d'immatriculation</td>
                            <td>{{\Carbon\Carbon::createFromFormat("Y-m-d", $cgp->started_at)->format("d/m/Y")}}</td>
                        </tr>
                        <tr>
                            <td>Lieu d'immatriculation</td>
                            <td>{{$cgp->registration_city}}</td>
                        </tr>
                        <tr>
                            <td>Numéro d'immatriculation</td>
                            <td>{{number_format($cgp->registered_key,0,","," ")}}</td>
                        </tr>
                        <tr>
                            <td>Capital</td>
                            <td>{{number_format($cgp->capital, 2, ",", " ")}} &euro;</td>
                        </tr>
                        <tr>
                            <td>Activité</td>
                            <td>{{$cgp->activity}}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-md-6 table-responsive">
            @if(isset($representor) && !$representor->is($contact))
                <h3 class="text-center">Informations du Représentant</h3>
                <table class="table table-striped table-hover">
                    <tbody>
                        <tr>
                            <td>Civilité du représentant</td>
                            <td>{{$representor->civilite == 1 ? "Mr" : "Mme"}}</td>

                        </tr>
                        <tr>
                            <td>Nom</td>
                            <td>{{$representor->fistname}}</td>
                        </tr>
                        <tr>
                            <td>Prénom</td>
                            <td>{{$representor->lastname}}</td>
                        </tr>
                        <tr>
                            <td>Fonction</td>
                            <td>{{$cgp->contact_status}}</td>
                        </tr>
                        <tr>
                            <td>Téléphone</td>
                            <td>{{$representor->tel_fixe}}</td>
                        </tr>
                        <tr>
                            <td>Mobile</td>
                            <td>{{$representor->gsm}}</td>
                        </tr>
                        <tr>
                            <td>Fax</td>
                            <td>{{$representor->fax}}</td>
                        </tr>
                        <tr>
                            <td>Courriel</td>
                            <td><a href="mailto:{{$representor->email}}">{{$representor->email}}</a></td>
                        </tr>
                    </tbody>
                </table>
                @else
                    <h3 class="text-center">Contact du CGP: {{$cgp->name}}</h3>
                    @include("voyager::formfields.custom.cgps.contacts-show", ["selected_values" => $cgp->contacts])
            @endif
            </div>
        </div>
    @endisset
</div>
