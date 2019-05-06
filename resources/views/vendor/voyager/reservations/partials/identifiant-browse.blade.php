<a href="{{ route('voyager.'.$dataType->slug.'.show', [$dataType->name => $reservation]) }}">
    {{$reservation->identifiant}}
</a>
<br>
git s
<span class="label label-primary">
    {{$reservation->typeContratsId->nom}}
</span><br><br>
<span>SNC Souscrit @if($reservation->nbr_snc > 1)s @endif : {{$reservation->nbr_snc}}</span><br>
<span>Ass Jud. : {{ $reservation->type_aj ? __('generic.yes') : __('generic.no') }}</span><br>
<span>{{ucfirst($reservation->mode_paiement)}}</span><br>
