@extends('pdf.layout')
@push('css')
<style>
    #body {
        font-family: 'Arial';
        color: rgb(0,0,0);
        font-weight: normal;
    }
    .title {
        font-size: 50px;
        color: rgb(143, 24, 27);
        font-weight: bold;
        font-size: 15pt;
        text-align: center;
        line-height: 40px;
    }
    .sub-title {
        font-weight: bold;
        font-size: 12pt;
    }
    .text-center {
        text-align: center;
    }
    .cell-border {
        width: 100%;
        padding-top: 15px;
        padding-bottom: 15px;
        text-align: center;
        border-style: solid;
        border-width: 2px;
        border-color: rgb(0,0,0);
        font-size: 18px;
        font-weight: bold;
    }
    .cell {
        padding-top: 10px;
        padding-bottom: 10px;
        text-align: center;
    }
    .text {
        font-size: 10pt;
    }
    .break-10 {
        height: 10pt;
    }
    .break-8 {
        height: 8pt;
    }
    .break-20 {
        height: 95pt;
    }
    .text-right {
        text-align: right;
    }
    .col {
        float: left;
        width: 50%;
    }
    .row {
        overflow: auto;
    }

    th, td {
        font-size: 13px;
    }

    tr:nth-child(even) {background-color: #f2f2f2;}

</style>
@endpush
@section('body')
<div id="body">
    <h1 class="title">
        CONTRAT DE PARTENARIAT EN VUE DE LA PRESENTATION D'INVESTISSEURS
    </h1>

    <div class="break-10"></div>

    <h2 class="sub-title">ENTRE</h2>

    <p class="text">
        INVESTIS DOM, Société par Action Simplifiée au capital de 10.000 euros, ayant son
        siège social au 62 boulevard du Chaudron - 97490 - SAINTE CLOTILDE, immatriculée au
        RCS de SAINT DENIS sous le numéro 820 090 652, représentée par Monsieur Christophe MONEL,
        en qualité de Président,<br>D'une part,
    </p>

    <p class="text">
        {{ $nom }}, {{ $forme_juridique }} au capital de {{ $capital }} euros, ayant son siège social
        {{ $adresse }} - {{ $cgpcp }} - {{ $cgpville }}, immatriculée {{ $immatriculation }}  sous le
        numéro {{ $siret }}, immatriculée à {{ $lieu_immatriculation }}.<br>Représentée par
        {{ $civilite }} {{ $prenom }} {{ $nom_representant }}, en qualité de {{ $fonction }},<br>D'autre part,
    </p>

    <p class="text">
        Ci-après dénommé, le Gestionnaire de Patrimoine
    </p>

    <h2 class="sub-title">APRES AVOIR EXPOSE QUE :</h2>

    <p class="text">
        INVESTIS DOM exerce une activité de montage d'opérations de défiscalisation et de financement
        dans les DOM et COM selon les dispositions de l'article 199 indécies A ou B du Code Général des
        Impôts (CGI).<br><br>
        Le Gestionnaire de Patrimoine est mandaté par ses clients pour leur présenter des
        produits financiers, des placements, correspondant à leurs besoins.<br><br>
        Le Gestionnaire de Patrimoine
        s'est déclaré intéressé par la possibilité de présenter à ses clients les opérations de financement
        mises au point par INVESTIS DOM dans les DOM et les COM.<br><br>
        Dans ce cadre, les parties ont décidé de préciser les conditions dans lesquelles le Gestionnaire
        de Patrimoine pourra percevoir des honoraires
        au titre des souscriptions de ses clients dans les opérations de financement mises au point par INVESTIS DOM.
    </p>

    <pagebreak>
    </pagebreak>

    <h2 class="sub-title">IL A ETE CONVENU CE QUI SUIT :</h2>

    <h2 class="sub-title">ARTICLE 1 : DEFINITIONS</h2>

    <p class="text">
        Client ou Mandant ou Investisseur : Désigne une personne physique, mandant du Gestionnaire de Patrimoine,
        dont les coordonnées seront communiquées à INVESTIS DOM par le Gestionnaire de Patrimoine, susceptible d'être
        intéressée pour souscrire au capital et apporter des sommes en compte courant de SNC dans les DOM-COM,
        pour l'acquisition de matériel professionnel neuf dans le cadre des dispositions fiscales des articles 199
        indécies A ou B du CGI.<br><br>
        Opérations : Désigne l'ensemble des SNC ayant pour objet d’acquérir des investissements dans
        le cadre des dispositions fiscales relatives à l'article 199 undécies B du CGI.<br><br>
        Investissements : Désigne l'ensemble
        des matériels et éventuellement la nature des frais annexes nécessaires à leur mise en exploitation financés dans
        le cadre des Opérations.<br><br>
        Base défiscalisable : Désigne le montant de l'investissement Hors Taxes après
        déduction des subventions publiques éventuellement sollicitées et/ou allouées pour cet investissement
        (parmi lesquelles la TVA NPR).<br><br>
        Territoire d'intervention : DOM (Département d'Outre-Mer) COM (Collectivité d'Outre-Mer)<br><br>
        Apport investisseur :  Somme que les associés de SNC apportent au financement des matériels
    </p>

    <h2 class="sub-title">ARTICLE 2 : OBJET</h2>

    <p class="text">
        Aux termes du présent contrat, INVESTIS DOM s'engage à verser au Gestionnaire de Patrimoine des honoraires pour
        les opérations de financement d'investissements à réaliser dans le cadre des dispositions de l'article 199 indécise
        B du Code Général des Impôts qui donneraient lieu à souscription par des Investisseurs dont les coordonnées lui auront
        été communiquées par le Gestionnaire de Patrimoine pendant la durée de ce contrat.
    </p>

    <h2 class="sub-title">ARTICLE 3 : INTUITU PERSONAE</h2>

    <p class="text">
        Le présent protocole est conclu intuitu personae pour la société INVESTIS DOM, qui s'engage dans les termes de ce contrat en
        considération :<br>- De la bonne notoriété du Gestionnaire de Patrimoine,<br>- De la personnalité des dirigeants effectifs du
        Gestionnaire de Patrimoine et de ses associés,<br>
        - De l'indépendance du Gestionnaire de Patrimoine à l'égard des concurrents
        d'INVESTIS DOM en matière de défiscalisation.<br><br>
        Le présent contrat, conclu intuitu personae pour la société INVESTIS DOM,
        ne pourra pas être cédé ou transmis, même par voie de fusion, scission ou apport partiel d'actif du Gestionnaire de Patrimoine
        sans l'accord préalable et exprès d'INVESTIS DOM.<br><br>
        Le Gestionnaire de Patrimoine s'engage à informer INVESTIS DOM de toute
        modification dans la répartition majoritaire de son capital, par écrit, avant la réalisation de l'opération.
    </p>

    <pagebreak>
    </pagebreak>

    <br>
    <h2 class="sub-title">ARTICLE 4 : DOCUMENTS CONTRACTUELS</h2>

    <p class="text">
        Le présent accord est régi exclusivement par les documents suivants, dans l'ordre de priorité croissant :<br>
        - Le présent contrat<br>
        - Ses annexes ou avenants.<br><br>
        Aucune modification ne pourra intervenir sans la signature d'un avenant signé par les représentants habilités
        des deux parties.
    <p>

    <h2 class="sub-title">ARTICLE 5 : COMMUNICATION DE DOCUMENTS ET D'INFORMATIONS</h2>

    <p class="text">
        Le Gestionnaire de Patrimoine pourra remettre à sa clientèle les documents d'information sur les opérations de
        financement susceptibles de l'intéresser, documents qui lui seront communiqués par INVESTIS DOM.<br><br>
        Le Gestionnaire de Patrimoine s'engage à ne communiquer ces documents qu'aux Investisseurs actuels ou
        potentiels lui ayant confié un mandat.<br><br>
        Il s'interdit de modifier ces documents ou de les reprendre sous son nom.
    </p>

    <pagebreak>
    </pagebreak>

    <h2 class="sub-title">
        ARTICLE 6 : MODALITES DE TRANSMISSION DES DEMANDES D'INVESTISSEMENT SOUSCRIPTIONS AUX OPERATIONS
        PAR LES MANDANTS DU GESTIONNAIRE DE PATRIMOINE
    </h2>

    <p class="text">
        ABSENCE DE MANDAT<br>
        Le Gestionnaire de Patrimoine ne dispose d'aucun mandat ni mission de représentation de ou par INVESTIS DOM.<br><br>
        En particulier, le Gestionnaire de Patrimoine n'a aucun pouvoir pour accepter ou refuser une demande de souscription
        ou de réservation.<br><br>
        DROIT DE PROPRIETE<br>
        Le Gestionnaire de Patrimoine n'est pas tenu à une obligation d'exclusivité vis-à-vis d'INVESTIS DOM.<br><br>
        MODALITES DE COLLABORATION<br>
        Acceptation des souscriptions :<br><br>
        INVESTIS DOM dispose de 20 jours ouvrés suivant la réception d'une souscription pour faire valoir sa réponse
        de principe, étant précisé que toute souscription est soumise, après accord d'INVESTIS DOM, à l'agrément préalable
        des associés de la société d'investissement concernée.<br><br>
        INVESTIS DOM s'engage à faire ses meilleurs efforts pour que les investisseurs intéressés par la
        souscription d'une opération disponible soient agréés par les associés de la société d'investissement en cause.<br><br>
        Dans l'hypothèse où un programme d'investissement serait entièrement souscrit lors de la réception d'un dossier de
        souscription complet, INVESTIS DOM s'engage à faire ses meilleurs efforts pour proposer un autre programme équivalent
        aux mandants du Gestionnaire de Patrimoine, par l'intermédiaire de ce dernier, afin que les éventuels souscripteurs
        conservent leurs objectifs de réduction d'impôt dans les mêmes conditions que celles émises initialement.<br><br>
        Exécution des souscriptions :<br><br>
        Les mandants du Gestionnaire de Patrimoine devront adresser les règlements des souscriptions,
        par chèque postal ou bancaire émanant d'une banque ayant une représentation en France, à INVESTIS DOM avec le dossier de
        souscription dûment rempli et signé.<br><br>
        Les chèques de souscription devront notamment être libellés à l'ordre de : INVESTIS DOM COLLECTE.
    </p>

    <pagebreak>
    </pagebreak>

    <h2 class="sub-title">ARTICLE 7 : REMUNERATION</h2>

    <p class="text">
        Le Gestionnaire de Patrimoine bénéficiera d'une rémunération fixée dans l'annexe 1.<br><br>
        Le Gestionnaire de patrimoine se verra affecté un taux de commercialisation global variant selon
        des périodes définies. Ce taux de commercialisation global comprendra la rentabilité offerte aux
        investisseurs de même que la rémunération du Gestionnaire de Patrimoine, cette dernière étant plafonnée
        à 7% HT des apports effectués par ses mandants, pendant la durée de ce contrat, pour des opérations présentées
        par ses soins (hors prix d'acquisition des parts sociales des sociétés d'investissement, du montant des formalités
        d'enregistrement et du montant de l'assistance juridique optionnelle proposée par INVESTIS DOM).<br><br>
        Cette rémunération est calculée sur le montant HT des apports effectivement réalisés par les mandants concernés,
        exclusion faîte du prix des parts sociales des sociétés d'investissement concernées, et des éventuels frais administratifs
        et fiscaux liés à l'enregistrement des souscriptions.<br><br>
        Cette rémunération ne sera due qu'après encaissement effectif des apports correspondants. Elle sera réglée au Gestionnaire
        de Patrimoine à 30 jours date de réception de facture.<br><br>
        Le Gestionnaire de Patrimoine, qui n'est chargé d'aucun mandat par INVESTIS DOM, ne peut prétendre à aucune autre rémunération
        ou indemnisation que celle prévue au présent contrat.<br><br>
    </p>

    <h2 class="sub-title">ARTICLE 8 : OBLIGATION DE LOYAUTE</h2>

    <p class="text">
        RESPECT DES MANDANTS DU GESTIONNAIRE DE PATRIMOINE<br><br>
        INVESTIS DOM s'interdit toute démarche commerciale active directe à l'attention des mandants du Gestionnaire
        de Patrimoine dont il aurait eu les coordonnées par l'intermédiaire de ce dernier.<br><br>
        CONFIDENTIALITE<br><br>
        Les deux parties s'engagent à conserver confidentielles les informations communiquées dans le cadre de
        ce contrat, sauf réquisition judiciaire ou des administrations fiscales et sociales.<br><br>
        Le Gestionnaire de Patrimoine s'interdit toute diffusion des documents qui lui auront été remis dans le
        cadre de ce contrat sauf à ses mandants pour la bonne fin des opérations de souscription ou de réservation.<br><br>
        Le Gestionnaire de Patrimoine s'interdit de divulguer les informations auxquelles il aura eu accès sur l'organisation
        d'INVESTIS DOM, ses associés, fournisseurs et clients, ses activités et les opérations auxquelles elle s'intéresse, à
        des tiers sans l'accord préalable et exprès d'INVESTIS DOM.<br><br>
        L'ensemble des documents remis au Gestionnaire de Patrimoine par INVESTIS DOM restera la propriété de
        cette dernière qui pourra se les faire restituer sur simple demande.
    </p>


    <pagebreak>
    </pagebreak>

    <h2 class="sub-title">ARTICLE 9 : DUREE</h2>

    <p class="text">
        Le présent accord est conclu pour une durée initiale allant de sa date de dernière signature jusqu'au 31 décembre {{ $annee }}.<br>
        A l'issue de cette durée, les parties se rencontreront afin de décider des modalités de poursuite de leurs relations.<br>
        En cas de poursuite de leurs relations sans signature d'un nouveau contrat, les parties sont convenues que les dispositions
        de la présente convention seront prorogées pour une durée indéterminée.<br>
        Dans ce cas, l'arrêt du contrat devra être notifié par LRAR au moins 6 mois avant la date de cessation,
        sauf application des dispositions ci-dessous en cas de manquement grave.
    </p>

    <h2 class="sub-title">ARTICLE 10 : RESILIATION ANTICIPEE</h2>

    <p class="text">
        Le présent contrat pourra être rompu de manière anticipée en cas de manquement grave de l'une ou l'autre des parties
        à ses obligations, de plein droit, un mois après envoi d'une mise en demeure d'avoir à respecter ses obligations adressées
        par la partie non défaillante à l'autre partie restée sans effet.
    </p>

    <h2 class="sub-title">ARTICLE 11 : ELECTION DE DOMICILE - ATTRIBUTION DE JURIDICTION</h2>

    <p class="text">
        Les parties élisent domicile en leur siège social et domicile respectifs tels que mentionnés en tête des présentes.<br><br>
        Tout litige lié à la conclusion, l'exécution ou la cessation de ce contrat sera soumis à la compétence exclusive des tribunaux
        de Saint Denis de la Réunion, seuls compétents même en cas de pluralité d'instance ou de parties ou de référé.
    </p>

    <div class="break-20"></div>

    <p class="text">
        FAIT A : {{ $cgpville }}, LE {{ $madate }}<br>
        En deux exemplaires originaux<br><br>
    </p>
    <div class="row text">
        <div class="col">Pour {{ $nom }}</div>
        <div class="col text-right">Pour INVESTIS DOM</div>
    </div>


    <pagebreak>
    </pagebreak>

    <div class="cell-border">ANNEXE 1</div>

    <div class="cell">BAREME DE COMMERCIALISATION {{ $annee }}</div>

    <div class="text">
        Rentabilité investisseur et honoraires de commercialisation attribuée par INVESTIS DOM au
        cabinet {{ $nom }} pour présentation d'investisseurs :
    </div>
    
    <p class="text">
    Offre CONFORT sur des dossiers de plein droit :<br><br>
    </p>

        
    @for ($i = 0; $i < $nb_contrat_confort ; $i++)
        <h4>Offre {{ $contrat_confort_name[$i] }}</h4>
        <table style="width:80%">
            <tr>
                <th>Mois</th>
                <th>Enveloppe globale </th>
                <th>Plafond de Rémuneration </th>
            </tr>
            <tr>
                <td>Janvier</td>
                <td>{{ $contrat_confort_value[$i]->mois_1 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Février</td>
                <td>{{ $contrat_confort_value[$i]->mois_2 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Mars</td>
                <td>{{ $contrat_confort_value[$i]->mois_3 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Avril</td>
                <td>{{ $contrat_confort_value[$i]->mois_4 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Mai</td>
                <td>{{ $contrat_confort_value[$i]->mois_5 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Juin</td>
                <td>{{ $contrat_confort_value[$i]->mois_6 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Juillet</td>
                <td>{{ $contrat_confort_value[$i]->mois_7 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Aout</td>
                <td>{{ $contrat_confort_value[$i]->mois_8 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Septembre</td>
                <td>{{ $contrat_confort_value[$i]->mois_9 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Octobre</td>
                <td>{{ $contrat_confort_value[$i]->mois_10 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Novembre</td>
                <td>{{ $contrat_confort_value[$i]->mois_11 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Decembre</td>
                <td>{{ $contrat_confort_value[$i]->mois_12 }}% </td>
                <td>7%</td>
            </tr>
        </table>
    @endfor

    <pagebreak>
    </pagebreak>

    <p class="text">
    Offre SERENITE + sur des dossiers de plein droit : (produit mutualisé sur 3 à 5 SNC, avec assurance garantissant la perte
    financière et fiscale)<br><br>
    </p>
        
    @for ($i = 0; $i < $nb_contrat_serenite ; $i++)
        <h4>Offre {{ $contrat_serenite_name[$i] }}</h4>
        <table style="width:80%">
            <tr>
                <th>Mois</th>
                <th>Enveloppe globale </th>
                <th>Plafond de Rémuneration </th>
            </tr>
            <tr>
                <td>Janvier</td>
                <td>{{ $contrat_serenite_value[$i]->mois_1 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Février</td>
                <td>{{ $contrat_serenite_value[$i]->mois_2 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Mars</td>
                <td>{{ $contrat_serenite_value[$i]->mois_3 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Avril</td>
                <td>{{ $contrat_serenite_value[$i]->mois_4 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Mai</td>
                <td>{{ $contrat_serenite_value[$i]->mois_5 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Juin</td>
                <td>{{ $contrat_serenite_value[$i]->mois_6 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Juillet</td>
                <td>{{ $contrat_serenite_value[$i]->mois_7 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Aout</td>
                <td>{{ $contrat_serenite_value[$i]->mois_8 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Septembre</td>
                <td>{{ $contrat_serenite_value[$i]->mois_9 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Octobre</td>
                <td>{{ $contrat_serenite_value[$i]->mois_10 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Novembre</td>
                <td>{{ $contrat_serenite_value[$i]->mois_11 }}% </td>
                <td>7%</td>
            </tr>
            <tr>
                <td>Decembre</td>
                <td>{{ $contrat_serenite_value[$i]->mois_12 }}% </td>
                <td>7%</td>
            </tr>
        </table>
    @endfor



</div>
@endsection
