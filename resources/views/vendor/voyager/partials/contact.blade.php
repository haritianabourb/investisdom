<div class="panel panel-default">
    {{--TODO Make it as blade component--}}
    <div class="panel-heading">
        <h3 class="panel-title">{{ $contact->full_name_civ }}<br>
            <small>{{$contact->function ?? "Aucun Poste Défini"}}</small>
        </h3>
    </div>
        <table class="table table-striped table-hover">
            <tbody>
                @if($contact->tel_fixe)
                    <tr>
                        <td>
                            <abbr title="Télephone Fixe">Tél:</abbr>
                        </td>
                        <td>
                            {{$contact->tel_fixe}}
                        </td>
                    </tr>
                @endif
                @if($contact->gsm)
                    <tr>
                        <td>
                            <abbr title="Téléphone Mobile">GSM:</abbr>
                        </td>
                        <td>
                            {{$contact->gsm}}
                        </td>
                    </tr>
                @endif
                @if($contact->fax)
                    <tr>
                        <td>
                            <abbr title="Fax">Fax:</abbr>
                        </td>
                        <td>
                            {{$contact->fax}}
                        </td>
                    </tr>
                @endif
                <tr>
                    <td>
                        <abbr title="Courriel">Courriel:</abbr>
                    </td>
                    <td>
                        <a href="mailto:{{$contact->email}}">{{$contact->email}}</a>
                    </td>
                </tr>

            </tbody>
        </table>
    {{--</div>--}}
</div>