
@isset($cgp)
<div>
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
                <td>{{$cgp->etablishment_code}}</td>
            </tr>
            <tr>
                <td>Date d'immatriculation</td>
                <td>{{$cgp->started_at}}</td>
            </tr>
            <tr>
                <td>Lieu d'immatriculation</td>
                <td>{{$cgp->registration_city}}</td>
            </tr>
            <tr>
                <td>N° SIRET</td>
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
@endisset
@isset($contact)
<div class="col-md-6 table-responsive">
    <h3 class="text-center">Informations du Représentant</h3>
    <table class="table table-striped table-hover">
        <tbody>
            <tr>
                <td>Civilité du représentant</td>
                <td>{{$contact->civilite}}</td>

            </tr>
            <tr>
                <td>Nom</td>
                <td>{{$contact->firstname}}</td>
            </tr>
            <tr>
                <td>Prénom</td>
                <td>{{$contact->lastname}}</td>
            </tr>
            <tr>
                <td>Fonction</td>
                <td>{{$cgp->contact_status}}</td>
            </tr>
            <tr>
                <td>Téléphone</td>
                <td>{{$contact->tel_fixe}}</td>
            </tr>
            <tr>
                <td>Mobile</td>
                <td>{{$contact->gsm}}</td>
            </tr>
            <tr>
                <td>Fax</td>
                <td>{{$contact->fax}}</td>
            </tr>
            <tr>
                <td>Courriel</td>
                <td><a href="mailto:{{$contact->email}}">{{$contact->email}}</a></td>
            </tr>
        </tbody>
    </table>
</div>
</div>
@endisset
