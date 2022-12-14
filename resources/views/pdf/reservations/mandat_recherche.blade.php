@extends('pdf.layout')
@push('css')
    <STYLE type="text/css">

        body {
            margin-top: 0px;
            margin-left: 0px;
        }

        #page_1 {
            position: relative;
            overflow: hidden;
            padding: 0px;
            border: none;
        }

        #page_1 #p1dimg1 {
            position: absolute;
            top: 0px;
            left: 0px;
            z-index: -1;
            width: 718px;
            height: 1055px;
        }

        #page_1 #p1dimg1 #p1img1 {
            width: 718px;
            height: 1055px;
        }


        .dclr {
            clear: both;
            float: none;
            height: 1px;
            margin: 0px;
            padding: 0px;
            overflow: hidden;
        }

        .ft0 {
            font: 1px 'Arial';
            line-height: 1px;
        }

        .ft1 {
            font: bold 14pt 'Arial';
            text-align: center;
            color: #8f181b;
            line-height: 24px;
        }

        .ft2 {
            font: bold 12pt 'Arial';
        }

        .ft3 {
            font: 10pt 'Arial';
        }

        .ft4 {
            font: 10pt 'Arial';
        }

        .ft5 {
            font: 8pt 'Arial';
        }

        .p0 {
            text-align: left;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p2 {
            text-align: right;
            padding-right: 3px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p3 {
            text-align: right;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p4 {
            text-align: left;
            padding-left: 4px;
            margin-top: 2px;
            margin-bottom: 0px;
        }

        .p5 {
            text-align: left;
            padding-left: 4px;
            padding-right: 44px;
            margin-top: 21px;
            margin-bottom: 0px;
        }

        .p6 {
            text-align: left;
            padding-left: 4px;
            margin-top: 3px;
            margin-bottom: 0px;
        }

        .p7 {
            text-align: left;
            padding-left: 4px;
            margin-top: 20px;
            margin-bottom: 0px;
        }

        .p8 {
            text-align: left;
            padding-left: 4px;
            padding-right: 50px;
            margin-top: 11px;
            margin-bottom: 0px;
        }

        .p9 {
            text-align: left;
            padding-left: 4px;
            padding-right: 39px;
            margin-top: 8px;
            margin-bottom: 0px;
        }

        .p10 {
            text-align: left;
            padding-left: 4px;
            margin-top: 8px;
            margin-bottom: 0px;
        }

        .p11 {
            text-align: left;
            padding-left: 4px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p12 {
            text-align: left;
            padding-left: 4px;
            padding-right: 44px;
            margin-top: 13px;
            margin-bottom: 0px;
        }

        .p13 {
            text-align: left;
            padding-left: 4px;
            padding-right: 226px;
            margin-top: 0px;
            margin-bottom: 0px;
        }

        .p14 {
            text-align: left;
            padding-left: 5px;
            margin-top: 0px;
            margin-bottom: 0px;
            white-space: nowrap;
        }

        .p15 {
            text-align: left;
            padding-left: 98px;
            margin-top: 83px;
            margin-bottom: 0px;
        }

        .p16 {
            text-align: left;
            padding-left: 259px;
            margin-top: 9px;
            margin-bottom: 0px;
        }

        .td0 {
            padding: 0px;
            margin: 0px;
            width: 229px;
            vertical-align: bottom;
        }

        .td1 {
            padding: 0px;
            margin: 0px;
            /*width: 446px;*/
            vertical-align: bottom;
            text-align: right;
        }

        .td2 {
            padding: 0px;
            margin: 0px;
            width: 200px;
            vertical-align: bottom;
        }

        .td3 {
            padding: 0px;
            margin: 0px;
            width: 200px;
            vertical-align: bottom;
        }

        .td4 {
            padding: 0px;
            margin: 0px;
            width: 200px;
            vertical-align: bottom;
        }

        .td5 {
            padding: 0px;
            margin: 0px;
            width: 477px;
            vertical-align: bottom;
        }

        .td6 {
            padding: 0px;
            margin: 0px;
            width: 351px;
            vertical-align: bottom;
        }

        .td7 {
            padding: 0px;
            margin: 0px;
            width: 318px;
            vertical-align: bottom;
        }

        .tr0 {
            height: 32px;
        }

        .tr1 {
            height: 22px;
        }

        .tr2 {
            height: 27px;
        }

        .tr3 {
            height: 19px;
        }

        .tr4 {
            height: 20px;
        }

        .tr5 {
            height: 17px;
        }

        .t0 {
            width: 100%;
            margin-left: 4px;
            margin-top: 10px;
            font: 13px 'Arial';
        }

        .t1 {
            width: 100%;
            margin-left: 4px;
            margin-top: 6px;
            font: 13px 'Arial';
        }

        .t2 {
            width: 100%;
            margin-top: 10px;
            font: 13px 'Arial';
        }

        .t3 {
            width: 669px;
            margin-left: 4px;
            margin-top: 10px;
            font: 13px 'Arial';
        }

    </STYLE>
@endpush
@section('body')
<DIV id="page_1">
    <DIV class="dclr"></DIV>
    <h1 class="ft1">MANDAT DE RECHERCHE</h1>
    <TABLE cellpadding=0 cellspacing=0 class="t0">
        <TR>
            <TD class="tr1 td0"><P class="p0 ft2">ENTRE LES SOUSSIGNES :</P></TD>
            <TD class="tr1 td1"><P class="p0 ft0">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p0 ft3">Pr??nom : {{$investor->prenom_invest}}</P></TD>
            <TD class="tr2 td1"><P class="p2 ft3">Ville : {{$investor->city}}</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td0"><P class="p0 ft3">Nom : {{$investor->name_invest}}</P></TD>
            <TD class="tr3 td1"><P class="p3 ft3">T??l??phone fixe : {{$investor->fixe_invest}}</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td0"><P class="p0 ft3">Adresse : {{$investor->address_1}} {{$investor->address_2 ?: ""}}</P></TD>
            <TD class="tr3 td1"><P class="p3 ft3">T??l??phone portable : {{$investor->gsm_invest}}</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td0"><P class="p0 ft3">Code postal : {{$investor->postal_code}}</P></TD>
            <TD class="tr3 td1"><P class="p2 ft3">Email : {{$investor->email_invest}}</P></TD>
        </TR>
    </TABLE>
    <P class="p4 ft3">
        <NOBR>Ci-apr??s</NOBR>
        d??nomm??(e) ?? Le MANDANT ?? d'une part,
    </P>
    <P class="p5 ft3">La soci??t?? INVESTIS DOM, SASU au capital de 10 000 euros immatricul??e au RCS de Saint Denis de la
        R??union sous le num??ro 820 090 652 sise au 62 Boulevard du Chaudron - 97490 - SAINTE CLOTILDE, repr??sent??e par
        Christophe MONEL en qualit?? de Pr??sident,</P>
    <P class="p6 ft3">
        <NOBR>Ci-apr??s</NOBR>
        d??sign??e ?? Le MANDATAIRE ?? d'autre part,
    </P>
    <P class="p7 ft2">IL A ETE CONVENU CE QUI SUIT,</P>
    <P class="p8 ft4">Par les pr??sentes, le MANDANT est entr?? en contact avec le MANDATAIRE et lui donne mandat afin de
        rechercher pour son compte avant le 15 d??cembre {{date('Y')}}, des projets d'investissements s??lectionn??s par INVESTIS
        DOM entrants dans les dispositions de l'article 199 undecies B du Code G??n??ral des Imp??ts en vue de r??duire le
        montant de son IRPP.</P>
    <P class="p9 ft4">Le MANDANT souhaite prioritairement que le projet d'investissement propos?? se situe dans le
        secteur d'activit?? mentionn??
        <NOBR>ci-dessous.</NOBR>
        Dans le cas o?? le MANDANT n'a pas de pr??f??rence ou souhaite diluer le risque et mutualiser les investissements
        dans plusieurs SNC, il devra cocher la case ?? indiff??rent ?? et d??terminer le nombre de SNC dans lequel il
        souhaite investir.
    </P>
    <TABLE cellpadding=0 cellspacing=0 class="t1">
        <TR>
            <TD class="tr4 td2"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'industrie' && $reservation->nbr_snc <= 1) checked="checked"@endif> Industrie</label></TD>
            <TD class="tr4 td3"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'energie' && $reservation->nbr_snc <= 1) checked="checked"@endif> Energie</label></TD>
            <TD class="tr4 td4"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'indifferent' || $reservation->nbr_snc > 1) checked="checked"@endif> Indiff??rent</label></TD>
        </TR>
        <TR>
            <TD class="tr5 td2"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'artisanat' && $reservation->nbr_snc <= 1) checked="checked"@endif> Artisanat</label></TD>
            <TD class="tr5 td3"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'tp, transport, construction' && $reservation->nbr_snc <= 1) checked="checked"@endif> TP, Transport, Construction</label></TD>
            <TD class="tr5 td4">&nbsp;</TD>
        </TR>
        <TR>
            <TD class="tr3 td2"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'tourisme' && $reservation->nbr_snc <= 1) checked="checked"@endif> Tourisme</label></TD>
            <TD class="tr3 td3"><label class="p0 ft4"><input type="checkbox" @if($reservation->secteurs_activite == 'logement social' && $reservation->nbr_snc <= 1) checked="checked"@endif> Logement social</label></TD>
            <TD class="tr3 td4">&nbsp;</TD>
        </TR>
    </TABLE>
    <P class="p10 ft3">Nombre souhait?? de SNC : {{$reservation->nbr_snc}}</P>
    <P class="p6 ft3">Le MANDANT souhaite souscrire un produit :</P>
    <TABLE cellpadding=0 cellspacing=0 class="t2">
        <TR>
            <TD class="tr4 td2"><label class="p0 ft4"><input type="checkbox" @if(\Illuminate\Support\Str::startsWith($formulae->slug, "confort")) checked="checked" @endif> CONFORT</label></TD>
            <TD class="tr4 td5"><label class="p0 ft4"><input type="checkbox" @if(\Illuminate\Support\Str::startsWith($formulae->slug, "serenite")) checked="checked" @endif> SERENITE + (garanti ?? 100% financi??rement et fiscalement</label></TD>
        </TR>                                                                                                                                          
        <TR>
            <TD class="tr5 td2"><label class="p0 ft4"><input type="checkbox"> Assistance juridique</label></TD>
            <TD class="tr5 td5" style="padding-left: 18px"> par INVESTIS DOM et assistance juridique offerte).</TD>
        </TR>
    </TABLE>
    <P class="p12 ft4">En fonction du nombre de projets d'investissement et de crit??res de s??lection dont fait preuve le
        MANDATAIRE pour les retenir, le MANDATAIRE ne pourra garantir au MANDANT que son souhait prioritaire de secteur
        d'activit?? soit respect??. Aussi, dans le cas o?? le MANDATAIRE ne pourrait satisfaire le souhait ??mis, il est
        convenu entre les parties qu'un autre investissement permettant au MANDANT de r??duire le montant de son IRPP
        dans la m??me proportion lui sera propos??. Il est admis par le MANDANT que le MANDATAIRE est tenu ?? une
        obligation de moyens qui ne saurait en aucun cas ??tre consid??r??e comme une obligation de r??sultats.</P>
    <P class="p12 ft4">Le MANDANT souhaite r??duire le montant de son imposition ?? hauteur de : {{$reservation->montant_reduction}} euros.<br>
        Le pr??sent mandat est consenti jusqu'au {{\Carbon\Carbon::createFromFormat("Y-m-d",$reservation->mandat_finnish_at)->locale('FR_FR')->isoFormat('LL')}}.</P>
    <TABLE cellpadding=0 cellspacing=0 class="t3">
        <TR>
            <TD class="tr4 td6">
                <P class="p0 ft3">Fait ?? : PARIS, le
                    <NOBR>{{\Carbon\Carbon::createFromFormat("Y-m-d",$reservation->mandat_reserved_at)->locale('FR_FR')->isoFormat('LL')}}</NOBR>
                </P>
            </TD>
            <TD class="tr4 td7"><P class="p0 ft0">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr5 td6"><P class="p0 ft3">Le MANDANT</P></TD>
            <TD class="tr5 td7"><P class="p0 ft3">Le MANDATAIRE</P></TD>
        </TR>
        <TR>
            <TD class="tr3 td6"><P class="p0 ft5">?? Lu et approuv??, bon pour mandat ??</P></TD>
            <TD class="tr3 td7"><P class="p14 ft5">?? Lu et approuv??, bon pour acceptation de mandat ??</P></TD>
        </TR>
    </TABLE>
</DIV>
@endsection