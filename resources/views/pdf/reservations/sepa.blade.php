@extends('pdf.layout')
@push('css')
    <STYLE type="text/css">

        body {margin-top: 0px;margin-left: 0px;}
        #page_1, #page_2 {page-break-after  : always;page-break-before : avoid;page-break-inside : avoid}
        #page_3 {page-break-after : avoid;page-break-before : avoid;page-break-inside : avoid}

        #page_1 {position:relative; overflow: hidden;margin: 27px 0px 194px 42px;padding: 0px;border: none;width: 752px;height: 901px;}

        #page_1 #p1dimg1 {position:absolute;top:0px;left:0px;z-index:-1;width:691px;height:901px;}
        #page_1 #p1dimg1 #p1img1 {width:691px;height:901px;}




        #page_2 {position:relative; overflow: hidden;margin: 64px 0px 0px 21px;padding: 0px;border: none;width: 773px;height: 1070px;}

        #page_2 #p2dimg1 {position:absolute;top:25px;left:0px;z-index:-1;width:718px;height:1045px;}
        #page_2 #p2dimg1 #p2img1 {width:718px;height:1045px;}




        #page_3 {position:relative; overflow: hidden;margin: 63px 0px 752px 27px;padding: 0px;border: none;width: 767px;}

        #page_3 #p3dimg1 {position:absolute;top:278px;left:97px;z-index:-1;width:551px;height:41px;}
        #page_3 #p3dimg1 #p3img1 {width:551px;height:41px;}




        .dclr {clear:both;float:none;height:1px;margin:0px;padding:0px;overflow:hidden;}

        .ft0{font: bold 16px 'Arial';line-height: 19px;}
        .ft1{font: bold 12px 'Arial';line-height: 15px;}
        .ft2{font: bold 12px 'Arial';color: #0070c0;line-height: 15px;}
        .ft3{font: 10px 'Arial';line-height: 13px;}
        .ft4{font: 10px 'Arial';color: #ff0000;line-height: 13px;}
        .ft5{font: 11px 'Arial';margin-left: 20px;line-height: 13px;}
        .ft6{font: 11px 'Arial';line-height: 13px;}
        .ft7{font: 11px 'Arial';margin-left: 20px;line-height: 14px;}
        .ft8{font: 11px 'Arial';line-height: 14px;}
        .ft9{font: bold 9px 'Arial';line-height: 11px;}
        .ft10{font: 9px 'Arial';line-height: 12px;}
        .ft11{font: 1px 'Arial';line-height: 1px;}
        .ft12{font: 1px 'Arial';line-height: 6px;}
        .ft13{font: 9px 'Arial';color: #0070c0;line-height: 12px;}
        .ft14{font: bold 11px 'Arial';color: #ff0000;line-height: 14px;}
        .ft15{font: bold 11px 'Arial';line-height: 22px;}
        .ft16{font: bold 11px 'Arial';color: #ff0000;line-height: 22px;}
        .ft17{font: 11px 'Arial';color: #0070c0;line-height: 14px;}
        .ft18{font: italic 11px 'Arial';line-height: 14px;}
        .ft19{font: italic 9px 'Arial';line-height: 12px;}
        .ft20{font: italic 11px 'Arial';line-height: 12px;}
        .ft21{font: italic 9px 'Arial';line-height: 11px;}
        .ft22{font: 11px 'Arial';color: #0070c0;margin-left: 3px;line-height: 14px;}
        .ft23{font: bold 11px 'Arial';line-height: 14px;}
        .ft24{font: bold 11px 'Arial';color: #0070c0;line-height: 14px;}
        .ft25{font: bold 11px 'Arial';color: #0070c0;margin-left: 3px;line-height: 14px;}
        .ft26{font: bold 11px 'Arial';color: #ff0000;margin-left: 21px;line-height: 13px;}
        .ft27{font: bold 11px 'Arial';color: #ff0000;line-height: 13px;}
        .ft28{font: bold 10px 'Arial';color: #ff0000;margin-left: 21px;line-height: 14px;}
        .ft29{font: bold 10px 'Arial';color: #ff0000;line-height: 14px;}
        .ft30{font: bold 10px 'Arial';line-height: 12px;}
        .ft31{font: 12px 'Arial';line-height: 15px;}
        .ft32{font: 1px 'Arial';line-height: 11px;}

        .p0{text-align: left;padding-left: 195px;margin-top: 125px;margin-bottom: 0px;}
        .p1{text-align: left;padding-left: 152px;margin-top: 34px;margin-bottom: 0px;}
        .p2{text-align: left;padding-left: 18px;padding-right: 70px;margin-top: 45px;margin-bottom: 0px;}
        .p3{text-align: left;padding-left: 18px;padding-right: 69px;margin-top: 0px;margin-bottom: 0px;}
        .p4{text-align: left;padding-left: 43px;margin-top: 0px;margin-bottom: 0px;}
        .p5{text-align: left;padding-left: 43px;margin-top: 1px;margin-bottom: 0px;}
        .p6{text-align: left;padding-left: 18px;margin-top: 14px;margin-bottom: 0px;}
        .p7{text-align: left;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p8{text-align: left;padding-left: 18px;margin-top: 22px;margin-bottom: 0px;}
        .p9{text-align: left;padding-left: 18px;margin-top: 9px;margin-bottom: 0px;}
        .p10{text-align: left;padding-left: 18px;padding-right: 77px;margin-top: 1px;margin-bottom: 0px;}
        .p11{text-align: left;padding-left: 18px;margin-top: 126px;margin-bottom: 0px;}
        .p12{text-align: left;padding-left: 18px;margin-top: 12px;margin-bottom: 0px;}
        .p13{text-align: left;padding-left: 293px;margin-top: 67px;margin-bottom: 0px;}
        .p14{text-align: left;padding-left: 6px;margin-top: 0px;margin-bottom: 0px;}
        .p15{text-align: left;padding-left: 6px;margin-top: 12px;margin-bottom: 0px;}
        .p16{text-align: left;padding-left: 6px;margin-top: 7px;margin-bottom: 0px;}
        .p17{text-align: left;padding-left: 6px;margin-top: 8px;margin-bottom: 0px;}
        .p18{text-align: left;padding-left: 6px;margin-top: 9px;margin-bottom: 0px;}
        .p19{text-align: left;padding-left: 6px;margin-top: 20px;margin-bottom: 0px;}
        .p20{text-align: left;padding-left: 6px;margin-top: 19px;margin-bottom: 0px;}
        .p21{text-align: justify;padding-left: 31px;padding-right: 62px;margin-top: 39px;margin-bottom: 0px;}
        .p22{text-align: left;margin-top: 0px;margin-bottom: 0px;}
        .p23{text-align: left;padding-left: 25px;margin-top: 15px;margin-bottom: 0px;}
        .p24{text-align: left;padding-left: 25px;margin-top: 12px;margin-bottom: 0px;}
        .p25{text-align: justify;padding-left: 25px;padding-right: 61px;margin-top: 7px;margin-bottom: 0px;}
        .p26{text-align: left;padding-left: 25px;margin-top: 8px;margin-bottom: 0px;}
        .p27{text-align: left;padding-left: 25px;margin-top: 0px;margin-bottom: 0px;}
        .p28{text-align: left;padding-left: 49px;padding-right: 61px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
        .p29{text-align: left;padding-left: 49px;padding-right: 56px;margin-top: 0px;margin-bottom: 0px;text-indent: -24px;}
        .p30{text-align: left;padding-left: 24px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p31{text-align: left;padding-left: 17px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p32{text-align: left;padding-left: 18px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p33{text-align: center;padding-right: 3px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p34{text-align: center;padding-right: 41px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p35{text-align: left;padding-left: 40px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p36{text-align: left;padding-left: 55px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}
        .p37{text-align: left;padding-left: 59px;margin-top: 0px;margin-bottom: 0px;white-space: nowrap;}

        .td0{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 303px;vertical-align: bottom;}
        .td1{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 366px;vertical-align: bottom;}
        .td2{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 85px;vertical-align: bottom;}
        .td3{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 43px;vertical-align: bottom;}
        .td4{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 16px;vertical-align: bottom;}
        .td5{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 222px;vertical-align: bottom;}
        .td6{padding: 0px;margin: 0px;width: 303px;vertical-align: bottom;}
        .td7{padding: 0px;margin: 0px;width: 64px;vertical-align: bottom;}
        .td8{padding: 0px;margin: 0px;width: 21px;vertical-align: bottom;}
        .td9{padding: 0px;margin: 0px;width: 43px;vertical-align: bottom;}
        .td10{padding: 0px;margin: 0px;width: 16px;vertical-align: bottom;}
        .td11{padding: 0px;margin: 0px;width: 222px;vertical-align: bottom;}
        .td12{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 47px;vertical-align: bottom;}
        .td13{border-right: #000000 1px solid;border-top: #000000 1px solid;border-bottom: #000000 1px solid;padding: 0px;margin: 0px;width: 15px;vertical-align: bottom;}
        .td14{border-right: #000000 1px solid;padding: 0px;margin: 0px;width: 42px;vertical-align: bottom;}
        .td15{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 48px;vertical-align: bottom;}
        .td16{border-bottom: #828282 1px solid;padding: 0px;margin: 0px;width: 21px;vertical-align: bottom;}
        .td17{border-left: #c0c0c0 1px solid;border-right: #c0c0c0 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 17px;vertical-align: bottom;background: #dddddd;}
        .td18{border-right: #c0c0c0 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;background: #dddddd;}
        .td19{border-right: #dddddd 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 24px;vertical-align: bottom;background: #dddddd;}
        .td20{border-right: #dddddd 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;background: #dddddd;}
        .td21{border-right: #dddddd 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;background: #dddddd;}
        .td22{border-right: #c0c0c0 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;background: #dddddd;}
        .td23{border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 144px;vertical-align: bottom;background: #dddddd;}
        .td24{border-right: #c0c0c0 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 128px;vertical-align: bottom;background: #dddddd;}
        .td25{border-right: #c0c0c0 1px solid;border-top: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 137px;vertical-align: bottom;background: #dddddd;}
        .td26{border-left: #c0c0c0 1px solid;border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 17px;vertical-align: bottom;background: #dddddd;}
        .td27{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;background: #dddddd;}
        .td28{border-right: #dddddd 1px solid;padding: 0px;margin: 0px;width: 75px;vertical-align: bottom;background: #dddddd;}
        .td29{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;background: #dddddd;}
        .td30{padding: 0px;margin: 0px;width: 144px;vertical-align: bottom;background: #dddddd;}
        .td31{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 128px;vertical-align: bottom;background: #dddddd;}
        .td32{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 137px;vertical-align: bottom;background: #dddddd;}
        .td33{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 24px;vertical-align: bottom;background: #dddddd;}
        .td34{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;background: #dddddd;}
        .td35{border-right: #c0c0c0 1px solid;padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;background: #dddddd;}
        .td36{border-left: #c0c0c0 1px solid;border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 17px;vertical-align: bottom;background: #fbfbfb;}
        .td37{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 7px;vertical-align: bottom;background: #fbfbfb;}
        .td38{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 75px;vertical-align: bottom;background: #fbfbfb;}
        .td39{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 36px;vertical-align: bottom;background: #fbfbfb;}
        .td40{padding: 0px;margin: 0px;width: 144px;vertical-align: bottom;background: #fbfbfb;}
        .td41{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 128px;vertical-align: bottom;background: #fbfbfb;}
        .td42{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 137px;vertical-align: bottom;background: #fbfbfb;}
        .td43{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 24px;vertical-align: bottom;background: #fbfbfb;}
        .td44{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 8px;vertical-align: bottom;background: #fbfbfb;}
        .td45{border-right: #fbfbfb 1px solid;padding: 0px;margin: 0px;width: 41px;vertical-align: bottom;background: #fbfbfb;}

        .tr0{height: 15px;}
        .tr1{height: 14px;}
        .tr2{height: 13px;}
        .tr3{height: 24px;}
        .tr4{height: 6px;}
        .tr5{height: 18px;}
        .tr6{height: 16px;}
        .tr7{height: 12px;}
        .tr8{height: 22px;}
        .tr9{height: 30px;}
        .tr10{height: 11px;}

        .t0{width: 669px;margin-left: 18px;margin-top: 12px;font: 9px 'Arial';}
        .t1{width: 669px;margin-left: 18px;margin-top: 13px;font: bold 9px 'Arial';}
        .t2{width: 550px;margin-left: 97px;margin-top: 18px;font: bold 11px 'Arial';}

    </STYLE>
@endpush
@section("body")
<DIV id="page_1">
    <P class="p0 ft0">MANDAT DE PRELEVEMENT SEPA CORE</P>
    <P class="p1 ft2"><SPAN class="ft1">Référence unique du mandat : </SPAN>{{$reservation->identifiant}}<SPAN class="ft1"></SPAN></P>
    <P class="p2 ft3">En signant ce formulaire de mandat, vous autorisez le Créancier à envoyer des instructions à votre banque pour débiter votre compte, et votre banque à débiter votre compte conformément aux instructions du Créancier.</P>
    <P class="p3 ft3">Vous bénéficiez du droit d’être remboursé par votre banque selon les conditions décrites dans la convention que vous avez passée avec elle. Une demande de remboursement doit être présentée :</P>
    <P class="p4 ft6"><SPAN class="ft4">-</SPAN><SPAN class="ft5">dans les 8 semaines suivant la date de débit de votre compte pour un prélèvement autorisé et contesté.</SPAN></P>
    <P class="p5 ft8"><SPAN class="ft4">-</SPAN><SPAN class="ft7">sans tarder et au plus tard dans les 13 mois en cas de prélèvement non autorisé.</SPAN></P>
    <P class="p6 ft1">Créancier</P>
    <TABLE cellpadding=0 cellspacing=0 class="t0">
        <TR>
            <TD class="tr0 td0"><P class="p7 ft9">Nom du créancier</P></TD>
            <TD colspan=6 class="tr0 td1"><P class="p7 ft10">SAS INVESTIS DOM</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td0"><P class="p7 ft9">Adresse</P></TD>
            <TD colspan=6 class="tr1 td1"><P class="p7 ft10">62 boulevard du Chaudron</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p7 ft9">Code Postal, ville</P></TD>
            <TD colspan=6 class="tr2 td1"><P class="p7 ft10">97490 SAINTE CLOTILDE</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td0"><P class="p7 ft9">Pays</P></TD>
            <TD colspan=3 class="tr1 td2"><P class="p7 ft10">FRANCE</P></TD>
            <TD class="tr1 td3"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr1 td4"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr1 td5"><P class="p7 ft11">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr2 td0"><P class="p7 ft9">Identifiant du Créancier Sepa (I.C.S.)</P></TD>
            <TD colspan=3 class="tr2 td2"><P class="p7 ft10">FR67ZZZ813992</P></TD>
            <TD class="tr2 td3"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr2 td4"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr2 td5"><P class="p7 ft11">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD rowspan=2 class="tr3 td6"><P class="p7 ft9">Type de paiement</P></TD>
            <TD colspan=2 class="tr4 td7"><P class="p7 ft12">&nbsp;</P></TD>
            <TD class="tr4 td8"><P class="p7 ft12">&nbsp;</P></TD>
            <TD class="tr4 td9"><P class="p7 ft12">&nbsp;</P></TD>
            <TD class="tr4 td10"><P class="p7 ft12">&nbsp;</P></TD>
            <TD class="tr4 td11"><P class="p7 ft12">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr5 td12"><P class="p7 ft10">Récurrent</P></TD>
            <TD class="tr6 td13"><P class="p7 ft11" style="font-size: 10pt; text-align: center; padding-left: 5px;  ">@if(in_array($formulae->id,[3, 4]) || $reservation->paiement = "echelonne") X @endif</P></TD>
            <TD class="tr5 td8"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr5 td14"><P class="p7 ft10">Ponctuel</P></TD>
            <TD class="tr6 td13"><P class="p7 ft11" style="font-size: 10pt; text-align: center; padding-left: 5px;">@if(in_array($formulae->id,[1, 2]) && $reservation->paiement = "unique") X @endif</P></TD>
            <TD class="tr5 td11"><P class="p7 ft11">&nbsp;</P></TD>
        </TR>
        <TR>
            <TD class="tr7 td0"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr7 td15"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr7 td4"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr7 td16"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr7 td3"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr7 td4"><P class="p7 ft11">&nbsp;</P></TD>
            <TD class="tr7 td5"><P class="p7 ft11">&nbsp;</P></TD>
        </TR>
    </TABLE>
    <P class="p8 ft1">Débiteur</P>
    <TABLE cellpadding=0 cellspacing=0 class="t1">
        <TR>
            <TD class="tr0 td0"><P class="p7 ft9">Nom Prénoms / Raison sociale du débiteur</P></TD>
            <TD class="tr0 td1"><P class="p7 ft13">{{$investor->full_name}}</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td0"><P class="p7 ft9">Adresse</P></TD>
            <TD class="tr1 td1"><P class="p7 ft13">{{$investor->address_1}} {{$investor->address_2?:""}}</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td0"><P class="p7 ft9">Code Postal, Ville</P></TD>
            <TD class="tr1 td1"><P class="p7 ft13">{{$investor->postal_code}} {{$investor->city}}</P></TD>
        </TR>
        <TR>
            <TD class="tr1 td0"><P class="p7 ft9">Pays</P></TD>
            <TD class="tr1 td1"><P class="p7 ft13">FRANCE</P></TD>
        </TR>
    </TABLE>
    <div style="margin: 0 auto; padding-left: 18px;">
        <br>
        <p>Les coordonnées de votre compte</p>
        <br>
        <?php
            $iban = str_split($investor->bank_iban, 4);

        ?>
        <TABLE cellpadding=0 cellspacing=0>
            <TR>
                @foreach($iban as $ib)
                    <?php
                    $an = str_split($ib);
                    ?>
                    @foreach($an as $a)
                    <TD style="border: 1px solid black; text-align: center;">{{$a}}</TD>
                    @endforeach
                    <TD>&nbsp;</TD>
                    <TD>&nbsp;</TD>
                @endforeach
            </TR>
            <TR>
                <TD colspan="39" style="font-size: 12px">Numéro d'identification international du compte bancaire - IBAN (International Bank Account Number)</TD>
            </TR>
            <TR>
                @foreach(str_split($investor->bank_bic) as $bic)
                <TD style="border: 1px solid black; text-align: center;">{{$bic}}</TD>
                @endforeach
                <TD colspan="24">&nbsp;</TD>
            </TR>
            <TR>
                <TD colspan="39" style="font-size: 12px">Code international d'identification de votre banque - BIC (Bank Identifier Code)</TD>
            </TR>
        </TABLE>
    </div>
    <P class="p11 ft8">Fait à {{$investor->postal_code}} {{$investor->city}}</P>
    <P class="p12 ft17"><SPAN class="ft8">Le </SPAN>{{$reservation->created_at->format('d/m/Y')}}</P>
    <P class="p13 ft8">Signature</P>
</DIV>
<DIV id="page_2">
    <P class="p14 ft8">Note : Vos droits concernant le présent mandat sont expliqués dans un document que vous pouvez obtenir auprès de votre banque</P>
    <P class="p15 ft1">Informations relatives au contrat entre le créancier et le débiteur - fournies seulement à titre indicatif :</P>
    <P class="p16 ft9">Code identifiant du débiteur</P>
    <P class="p17 ft18">………………………………………………………………………………………………………………………………………..</P>
    <P class="p14 ft19"><SPAN class="ft18">…………………………..</SPAN>IIndiquer ici tout code que vous souhaitez voir restitué par votre banque</P>
    <P class="p18 ft9">Tiers débiteur pour le compte duquel le paiement est effectué (si différent du débiteur lui même)</P>
    <P class="p18 ft18">………………………………………………………………………………………………………………………………………..</P>
    <P class="p14 ft19"><SPAN class="ft20">…………………………..</SPAN>Nom du tiers débiteur : si votre paiement concerne un accord passé entre le Créancier et un tiers (par exemple, vous payez la facture</P>
    <P class="p14 ft21">d’une autre personne), veuillez indiquer ici son nom.</P>
    <P class="p14 ft19">Si vous payez pour votre propre compte, ne pas remplir.</P>
    <P class="p17 ft18">………………………………………………………………………………………………………………………………………..…………………………..</P>
    <P class="p14 ft19">Code identifiant du tiers débiteur</P>
    <P class="p19 ft19">Nom du tiers créancier : le créancier doit compléter cette section s’il remet des prélèvements pour le compte d’un tiers.</P>
    <P class="p17 ft18">………………………………………………………………………………………………………………………………………..</P>
    <P class="p14 ft19"><SPAN class="ft18">…………………………..</SPAN>Code identifiant du tiers créancier</P>
    <P class="p20 ft9">Contrat concerné</P>
    <P class="p18 ft17"><SPAN class="ft22">{{$reservation->identifiant}}</SPAN><SPAN class="ft8"> / Réservation Girardin industrielle </SPAN>{{date('Y')}}</P>
    <P class="p14 ft19">Numéro et description du contrat</P>
    <P class="p21 ft8">Les informations contenues dans le présent mandat, qui doit être complété, sont destinées à n’être utilisées par le créancier que pour la gestion de sa relation avec son client. Elles pourront donner lieu à l’exercice, par ce dernier, de ses droits d’oppositions, d’accès et de rectification tels que prévus aux articles 38 et suivants de la loi <NOBR>n°78-17</NOBR> du 6 janvier 1978 relative à l’informatique, aux fichiers et aux libertés.</P>
</DIV>
<DIV id="page_3">
    <P class="p22 ft23">Echéancier</P>
    <P class="p23 ft23">Investisseur :</P>
    <P class="p24 ft17">{{$investor->civilite}} {{$investor->full_name}}<SPAN class="ft8">domiciliée à </SPAN> {{$investor->address_1}} {{$investor->address_2}}, {{$investor->postal_code}} {{$investor->city}},</P>
    <P class="p25 ft8">INVESTIS DOM SAS, en charge de la trésorerie et de la gestion des SNC réalisant les investissements éligibles aux dispositifs de réduction d’impôt régis à l’article 199 undecies B du Code Général des Impôts prélèvera les sommes suivantes sur le compte de <SPAN class="ft17">{{$investor->civilite}} {{$investor->full_name}}</SPAN></P>
    <br>
    <br>
    <TABLE cellpadding=0 cellspacing=0>
        <TR>
            <TD class="tr8 td25"><P class="p30 ft23">Date</P></TD>
            <TD class="tr8 td23"><P class="p30 ft23">Apport en compte Courant</P></TD>
            <TD class="tr8 td24"><P class="p30 ft23">Formalités</P></TD>
            <TD class="tr8 td24"><P class="p30 ft23">Assistance Juridique</P></TD>
        </TR>
        @if($reservation->paiement == "unique")
        <TR>
            <TD class="tr8 td25"><P class="p30 ft23">{{$reservation->created_at}}</P></TD>
            <TD class="tr8 td23"><P class="p30 ft23">{{number_format($reservation->apport, 2, ',', " ")}}</P></TD>
            <TD class="tr8 td24"><P class="p30 ft23">{{number_format($reservation->nbr_snc*60, 2, ',', " ")}}</P></TD>
            <TD class="tr8 td24"><P class="p30 ft23">{{number_format($reservation->nbr_snc*75, 2, ',', " ")}}</P></TD>
        </TR>
        @else
            <?php
            $diffInMonth = $reservation->created_at->DiffInMonths('2019-11-01 00:00:00');
            $start = $reservation->apport *40/100;

            $rest = ($reservation->apport - $start)/($diffInMonth);
            ?>
        <TR>
            <TD><P>{{$reservation->created_at->format('d/m/Y')}}</P></TD>
            <TD><P>{{number_format($start, 2, ',', " ")}}</P></TD>
            <TD><P>{{number_format($reservation->nbr_snc*60, 2, ',', " ")}}</P></TD>
            <TD><P>{{number_format($reservation->nbr_snc*75, 2, ',', " ")}}</P></TD>
        </TR>
            <?php
                    $loopDate = $reservation->created_at->addMonth()->copy()->startOfMonth();
            ?>
            @for ($i = 1; $i <= $diffInMonth; $i++)
                    <TR>
                        <TD><P>{{$loopDate->format('d/m/Y')}}</P></TD>
                        <TD><P>{{number_format($rest, 2, ',', " ")}}</P></TD>
                        <TD><P>&nbsp;</P></TD>
                        <TD><P>&nbsp;</P></TD>
                    </TR>
                <?php
                      $loopDate = $loopDate->addMonth()->copy()->startOfMonth();
                ?>
            @endfor

        @endif
    </TABLE>
</DIV>
@endsection
