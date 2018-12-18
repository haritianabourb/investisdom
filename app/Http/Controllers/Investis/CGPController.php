<?php

namespace App\Http\Controllers\Investis;

use Illuminate\Http\Request;
use \App\CGP;
use Fpdf;
use PDF;
use Voyager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class CGPController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function generatePDF(Request $request, CGP $cgp){
      // $canBrowsePost = Voyager::can('browse_cgps');
      $this->authorize('browse', $cgp);
      // dd($canBrowsePost);
      // XXX FIELD RESUP
      // $compte="test compte";
      $nom = $cgp->name;
      $adresse = $cgp->address_1." ".($cgp->address_2?:"");
      $cgpville = $cgp->city;
      $cgpcp = $cgp->postal_code;
      // $tel_fix = 'telephone';
      // $portable = 'mobile';
      // $mail = 'courriel';
      $forme_juridique = $cgp->juridical_registration;
      $immatriculation = $cgp->registrationEntitiesId->description;
      $nom_representant = $cgp->contactId->firstname;
      $prenom = $cgp->contactId->lastname;
      // $nom_representant = $cgp->getContactId->firstname." ".$cgp->getContactId->lastname;
      // $fax = 'fax';
      $dateconvention = date ("d-m-Y");
      $fonction = $cgp->contact_status;
      $civilite = "M.";
      $siret = $cgp->registered_key;
      $capital = $cgp->capital;
      $lieu_immatriculation = $cgp->registration_city;
      $madate = date ("d-m-Y");
      $annee=date("Y", strtotime($madate));

      // XXX Configure It
      Fpdf::AliasNbPages();
      Fpdf::AddPage();
      Fpdf::SetDisplayMode("fullpage");
      Fpdf::SetAutoPageBreak(true,30);
      Fpdf::SetY(40);
      Fpdf::SetFont('Arial','',10);

      // XXX now generate the file
      Fpdf::SetFont('Arial','B',15);
      Fpdf::SetTextColor(143,24,27);
      Fpdf::MultiCell(0,10,utf8_decode("CONTRAT DE PARTENARIAT EN VUE DE LA PRESENTATION D'INVESTISSEURS"),0,'C',0,true);
      Fpdf::SetTextColor(0,0,0);
      Fpdf::Ln(10);
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ENTRE\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("INVESTIS DOM, Société par Action Simplifiée au capital de 10.000 euros, ayant son siège social au 62 boulevard du Chaudron - 97490 - SAINTE CLOTILDE, immatriculée au RCS de SAINT DENIS sous le numéro 820 090 652, représentée par Monsieur Christophe MONEL, en qualité de Président,\nD'une part,\n\n"));
      Fpdf::write(5,utf8_decode("$nom, $forme_juridique au capital de $capital euros, ayant son siège social $adresse - $cgpcp - $cgpville, immatriculée $immatriculation  sous le numéro $siret, immatriculée à $lieu_immatriculation.\nReprésentée par $civilite $prenom $nom_representant, en qualité de $fonction,\nD'autre part,\n\n"));
      Fpdf::write(5,utf8_decode("Ci-après dénommé, le Gestionnaire de Patrimoine\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"APRES AVOIR EXPOSE QUE :\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("INVESTIS DOM exerce une activité de montage d'opérations de défiscalisation et de financement dans les DOM et COM selon les dispositions de l'article 199 indécies A ou B du Code Général des Impôts (CGI).\n\nLe Gestionnaire de Patrimoine est mandaté par ses clients pour leur présenter des produits financiers, des placements, correspondant à leurs besoins.\n\nLe Gestionnaire de Patrimoine s'est déclaré intéressé par la possibilité de présenter à ses clients les opérations de financement mises au point par INVESTIS DOM dans les DOM et les COM.\n\nDans ce cadre, les parties ont décidé de préciser les conditions dans lesquelles le Gestionnaire de Patrimoine pourra percevoir des honoraires au titre des souscriptions de ses clients dans les opérations de financement mises au point par INVESTIS DOM.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"IL A ETE CONVENU CE QUI SUIT :\n\n");
      Fpdf::write(5,"ARTICLE 1 : DEFINITIONS\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Client ou Mandant ou Investisseur : Désigne une personne physique, mandant du Gestionnaire de Patrimoine, dont les coordonnées seront communiquées à INVESTIS DOM par le Gestionnaire de Patrimoine, susceptible d'être intéressée pour souscrire au capital et apporter des sommes en compte courant de SNC dans les DOM-COM, pour l'acquisition de matériel professionnel neuf dans le cadre des dispositions fiscales des articles 199 indécies A ou B du CGI.\n\n\n\n\nOpérations : Désigne l'ensemble des SNC ayant pour objet d’acquérir des investissements dans le cadre des dispositions fiscales relatives à l'article 199 undécies B du CGI.\n\nInvestissements : Désigne l'ensemble des matériels et éventuellement la nature des frais annexes nécessaires à leur mise en exploitation financés dans le cadre des Opérations.\n\nBase défiscalisable : Désigne le montant de l'investissement Hors Taxes après déduction des subventions publiques éventuellement sollicitées et/ou allouées pour cet investissement (parmi lesquelles la TVA NPR).\n\nTerritoire d'intervention : DOM (Département d'Outre-Mer) COM (Collectivité d'Outre-Mer)\n\nApport investisseur :  Somme que les associés de SNC apportent au financement des matériels\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 2 : OBJET\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Aux termes du présent contrat, INVESTIS DOM s'engage à verser au Gestionnaire de Patrimoine des honoraires pour les opérations de financement d'investissements à réaliser dans le cadre des dispositions de l'article 199 indécise B du Code Général des Impôts qui donneraient lieu à souscription par des Investisseurs dont les coordonnées lui auront été communiquées par le Gestionnaire de Patrimoine pendant la durée de ce contrat.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 3 : INTUITU PERSONAE\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Le présent protocole est conclu intuitu personae pour la société INVESTIS DOM, qui s'engage dans les termes de ce contrat en considération :\n- De la bonne notoriété du Gestionnaire de Patrimoine,\n- De la personnalité des dirigeants effectifs du Gestionnaire de Patrimoine et de ses associés,\n- De l'indépendance du Gestionnaire de Patrimoine à l'égard des concurrents d'INVESTIS DOM en matière de défiscalisation.\n\nLe présent contrat, conclu intuitu personae pour la société INVESTIS DOM, ne pourra pas être cédé ou transmis, même par voie de fusion, scission ou apport partiel d'actif du Gestionnaire de Patrimoine sans l'accord préalable et exprès d'INVESTIS DOM.\n\nLe Gestionnaire de Patrimoine s'engage à informer INVESTIS DOM de toute modification dans la répartition majoritaire de son capital, par écrit, avant la réalisation de l'opération.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 4 : DOCUMENTS CONTRACTUELS\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Le présent accord est régi exclusivement par les documents suivants, dans l'ordre de priorité croissant :\n- Le présent contrat\n- Ses annexes ou avenants.\n\nAucune modification ne pourra intervenir sans la signature d'un avenant signé par les représentants habilités des deux parties.\n\n\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 5 : COMMUNICATION DE DOCUMENTS ET D'INFORMATIONS\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Le Gestionnaire de Patrimoine pourra remettre à sa clientèle les documents d'information sur les opérations de financement susceptibles de l'intéresser, documents qui lui seront communiqués par INVESTIS DOM.\n\nLe Gestionnaire de Patrimoine s'engage à ne communiquer ces documents qu'aux Investisseurs actuels ou potentiels lui ayant confié un mandat.\n\nIl s'interdit de modifier ces documents ou de les reprendre sous son nom.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 6 : MODALITES DE TRANSMISSION DES DEMANDES D'INVESTISSEMENT SOUSCRIPTIONS AUX OPERATIONS PAR LES MANDANTS DU GESTIONNAIRE DE PATRIMOINE\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("ABSENCE DE MANDAT\nLe Gestionnaire de Patrimoine ne dispose d'aucun mandat ni mission de représentation de ou par INVESTIS DOM.\n\nEn particulier, le Gestionnaire de Patrimoine n'a aucun pouvoir pour accepter ou refuser une demande de souscription ou de réservation.\n\nDROIT DE PROPRIETE\nLe Gestionnaire de Patrimoine n'est pas tenu à une obligation d'exclusivité vis-à-vis d'INVESTIS DOM.\n\nMODALITES DE COLLABORATION\nAcceptation des souscriptions :\n\nINVESTIS DOM dispose de 20 jours ouvrés suivant la réception d'une souscription pour faire valoir sa réponse de principe, étant précisé que toute souscription est soumise, après accord d'INVESTIS DOM, à l'agrément préalable des associés de la société d'investissement concernée.\n\nINVESTIS DOM s'engage à faire ses meilleurs efforts pour que les investisseurs intéressés par la souscription d'une opération disponible soient agréés par les associés de la société d'investissement en cause.\n\nDans l'hypothèse où un programme d'investissement serait entièrement souscrit lors de la réception d'un dossier de souscription complet, INVESTIS DOM s'engage à faire ses meilleurs efforts pour proposer un autre programme équivalent aux mandants du Gestionnaire de Patrimoine, par l'intermédiaire de ce dernier, afin que les éventuels souscripteurs conservent leurs objectifs de réduction d'impôt dans les mêmes conditions que celles émises initialement.\n\nExécution des souscriptions :\n\nLes mandants du Gestionnaire de Patrimoine devront adresser les règlements des souscriptions, par chèque postal ou bancaire émanant d'une banque ayant une représentation en France, à INVESTIS DOM avec le dossier de souscription dûment rempli et signé.\n\nLes chèques de souscription devront notamment être libellés à l'ordre de : INVESTIS DOM COLLECTE.\n\n\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 7 : REMUNERATION\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Le Gestionnaire de Patrimoine bénéficiera d'une rémunération fixée dans l'annexe 1.\n\nLe Gestionnaire de patrimoine se verra affecté un taux de commercialisation global variant selon des périodes définies. Ce taux de commercialisation global comprendra la rentabilité offerte aux investisseurs de même que la rémunération du Gestionnaire de Patrimoine, cette dernière étant plafonnée à 7% HT des apports effectués par ses mandants, pendant la durée de ce contrat, pour des opérations présentées par ses soins (hors prix d'acquisition des parts sociales des sociétés d'investissement, du montant des formalités d'enregistrement et du montant de l'assistance juridique optionnelle proposée par INVESTIS DOM).\n\nCette rémunération est calculée sur le montant HT des apports effectivement réalisés par les mandants concernés, exclusion faîte du prix des parts sociales des sociétés d'investissement concernées, et des éventuels frais administratifs et fiscaux liés à l'enregistrement des souscriptions.\n\nCette rémunération ne sera due qu'après encaissement effectif des apports correspondants. Elle sera réglée au Gestionnaire de Patrimoine à 30 jours date de réception de facture.\n\nLe Gestionnaire de Patrimoine, qui n'est chargé d'aucun mandat par INVESTIS DOM, ne peut prétendre à aucune autre rémunération ou indemnisation que celle prévue au présent contrat.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 8 : OBLIGATION DE LOYAUTE\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("RESPECT DES MANDANTS DU GESTIONNAIRE DE PATRIMOINE\n\nINVESTIS DOM s'interdit toute démarche commerciale active directe à l'attention des mandants du Gestionnaire de Patrimoine dont il aurait eu les coordonnées par l'intermédiaire de ce dernier.\n\nCONFIDENTIALITE\n\nLes deux parties s'engagent à conserver confidentielles les informations communiquées dans le cadre de ce contrat, sauf réquisition judiciaire ou des administrations fiscales et sociales.\n\nLe Gestionnaire de Patrimoine s'interdit toute diffusion des documents qui lui auront été remis dans le cadre de ce contrat sauf à ses mandants pour la bonne fin des opérations de souscription ou de réservation.\n\nLe Gestionnaire de Patrimoine s'interdit de divulguer les informations auxquelles il aura eu accès sur l'organisation d'INVESTIS DOM, ses associés, fournisseurs et clients, ses activités et les opérations auxquelles elle s'intéresse, à des tiers sans l'accord préalable et exprès d'INVESTIS DOM.\n\nL'ensemble des documents remis au Gestionnaire de Patrimoine par INVESTIS DOM restera la propriété de cette dernière qui pourra se les faire restituer sur simple demande.\n\n"));
      Fpdf::AddPage();
      Fpdf::Ln(8);
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 9 : DUREE\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Le présent accord est conclu pour une durée initiale allant de sa date de dernière signature jusqu'au 31 décembre $annee.\nA l'issue de cette durée, les parties se rencontreront afin de décider des modalités de poursuite de leurs relations.\nEn cas de poursuite de leurs relations sans signature d'un nouveau contrat, les parties sont convenues que les dispositions de la présente convention seront prorogées pour une durée indéterminée.\nDans ce cas, l'arrêt du contrat devra être notifié par LRAR au moins 6 mois avant la date de cessation, sauf application des dispositions ci-dessous en cas de manquement grave.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 10 : RESILIATION ANTICIPEE\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Le présent contrat pourra être rompu de manière anticipée en cas de manquement grave de l'une ou l'autre des parties à ses obligations, de plein droit, un mois après envoi d'une mise en demeure d'avoir à respecter ses obligations adressées par la partie non défaillante à l'autre partie restée sans effet.\n\n"));
      Fpdf::SetFont('Arial','B',12);
      Fpdf::write(5,"ARTICLE 11 : ELECTION DE DOMICILE - ATTRIBUTION DE JURIDICTION\n\n");
      Fpdf::SetFont('Arial','',10);
      Fpdf::write(5,utf8_decode("Les parties élisent domicile en leur siège social et domicile respectifs tels que mentionnés en tête des présentes.\n\nTout litige lié à la conclusion, l'exécution ou la cessation de ce contrat sera soumis à la compétence exclusive des tribunaux de Saint Denis de la Réunion, seuls compétents même en cas de pluralité d'instance ou de parties ou de référé.\n\n"));
      Fpdf::Ln(20);
      Fpdf::write(5,"FAIT A : $cgpville, LE $madate\nEn deux exemplaires originaux\n\n\nPour $nom                                                                                                              Pour INVESTIS DOM");
      Fpdf::AddPage();
      Fpdf::Ln(8);
      Fpdf::Rect(10,40,190,15,'D');
      Fpdf::SetFont('Arial','B',16);
      Fpdf::Ln(8);
      Fpdf::Cell(190,5,utf8_decode("ANNEXE 1"),0,0,'C');
      Fpdf::SetFont('Arial','',10);
      Fpdf::Ln(10);
      Fpdf::Cell(185,10,utf8_decode("BAREME DE COMMERCIALISATION $annee"),0,0,'C');
      Fpdf::Ln(10);
      Fpdf::write(5,utf8_decode("Rentabilité investisseur et honoraires de commercialisation attribuée par INVESTIS DOM au cabinet $nom pour présentation d'investisseurs :\n\n"));
      Fpdf::write(5,utf8_decode("Offre CONFORT sur des dossiers de plein droit :\n\n- De janvier à fin mars, le taux de commercialisation sera de 25% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n- D'avril à fin juin, le taux de commercialisation sera de 23% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n- De juillet à fin septembre, le taux de commercialisation sera de 21% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n- D'octobre à fin décembre, le taux de commercialisation sera de 19% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n\n"));
      Fpdf::write(5,utf8_decode("Offre SERENITE + sur des dossiers de plein droit : (produit mutualisé sur 3 à 5 SNC, avec assurance garantissant la perte financière et fiscale)\n\n- De janvier à fin mars, le taux de commercialisation sera de 21% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n- D'avril à fin juin, le taux de commercialisation sera de 19% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n- De juillet à fin septembre, le taux de commercialisation sera de 17% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n- D'octobre à fin décembre, le taux de commercialisation sera de 15% incluant la rentabilité offerte aux investisseurs et votre rémunération plafonnée à 7%.\n\n"));
      Fpdf::Output("Contrat_de_partenariat_$nom.pdf","D");
    }

    public function generateMPDF(Request $request, CGP $cgp){
      $this->authorize('browse', $cgp);

      $data['nom'] = $cgp->name;
      $data['adresse'] = $cgp->address_1." ".($cgp->address_2?:"");
      $data['cgpville'] = $cgp->city;
      $data['cgpcp'] = $cgp->postal_code;

      $data['forme_juridique'] = $cgp->juridical_registration;
      $data['immatriculation'] = $cgp->registrationEntitiesId->description;
      $data['nom_representant'] = $cgp->contactId->firstname;
      $data['prenom'] = $cgp->contactId->lastname;

      $data['dateconvention'] = date ("d-m-Y");
      $data['fonction'] = $cgp->contact_status;
      $data['civilite'] = "M.";
      $data['siret'] = $cgp->registered_key;
      $data['capital'] = $cgp->capital;
      $data['lieu_immatriculation'] = $cgp->registration_city;
      $data['madate'] = date ("d-m-Y");
      $data['annee']=date("Y", strtotime(date ("d-m-Y")));

      $pdf = PDF::loadView('pdf.investis.body', $data);
      return $pdf->stream('Contrat_de_partenariat_'.$cgp->name.'.pdf');
      // $mpdf = new Mpdf();

      // $headerHtml = view('pdf.investis.header')->render();
      // $mpdf->SetHTMLHeader($headerHtml);
      // $bodyHtml = view('pdf.investis.body', $data)->render();
      // // return view('pdf.investis.header');
      // // return view('pdf.investis.body', $data);
      // $mpdf->WriteHTML($bodyHtml);
      // $mpdf->Output();
      dd('stop');

      // return $test->stream('document.pdf');


    }

}
