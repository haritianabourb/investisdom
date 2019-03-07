<div class="panel panel-default">
    {{--TODO Make it as blade component--}}
    <div class="panel-heading">
        <h3 class="panel-title">{{ $contact->full_name_civ }}<br>
            <small>{{$contact->function ?? "Aucun Poste Défini"}}</small>
        </h3>
    </div>
    <div class="panel-body" style="padding-top: 15px">
        <address>
            @if($contact->tel_fixe)
                <abbr title="Télephone Fixe">Tél:</abbr> {{$contact->tel_fixe}}<br>
            @endif
            @if($contact->gsm)
                <abbr title="Téléphone Mobile">GSM:</abbr> {{$contact->gsm}}<br>
            @endif
            @if($contact->fax)
                <abbr title="Fax">Fax:</abbr> {{$contact->fax}}<br>
            @endif
            <abbr title="Courriel">Courriel:</abbr> <a href="mailto:{{$contact->email}}">{{$contact->email}}</a><br>
        </address>
    </div>
</div>