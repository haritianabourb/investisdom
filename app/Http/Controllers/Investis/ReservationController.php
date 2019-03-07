<?php

namespace App\Http\Controllers\Investis;

use App\Http\Traits\YousignProcedure;
use Illuminate\Http\Request;
use \App\Reservation;
use DB;
use PDF;
use TCG\Voyager\Traits\AlertsMessages;
use Voyager;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class ReservationController extends VoyagerBaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    use YousignProcedure;

    protected $yousignName = "Signing Procedure with trait";
    protected $yousignDescription = "New!!! now it's with trait, viva la dynamica!!!";

    public function getFiles()
    {
        return $this->pdf;
    }

    public function getMembers()
    {
        // TODO: Implement getMembers() method.
        return $this->member;
    }

    public function setMember(Reservation $reservation)
    {
        $investor = \App\Investor::find($reservation->investors_id);
        $cgp = \App\CGP::find($reservation->cgps_id);
        $cgp_contact = \App\Contact::find($cgp->contact_id);

        // Create author (Investis)
        $author = collect([
            'user' => "/users/" . env('YOUSIGN_APP_USER'),
            'type' => "signer",
            'position' => 2,
            'fileObjects' => collect([
                'Demande_de_Reservation'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf' =>
                    [
                        [
                            "page" => 5,
                            "position" => "419,172,557,227",
                            "mention" => "Lu et approuvé, Bon pour accord",
                            "mention2" => "Signé par InvestisDOM."
                        ],
                        [
                            "page" => 12,
                            "position" => "415,72,553,127",
                            "mention" => "Lu et approuvé",
                            "mention2" => "Signé par INVESTIS DOM."
                        ],

                    ],
                'Mandat_de_Recherche'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf' => [
                    [
                        "page" => 1,
                        "position" => "430,56,551,110",
                        "mention" => "Lu et approuvé, bon pour acceptation de mandat",
                        "mention2" => "Signé par InvestisDOM."
                    ]
                ]
            ])


        ]);

        // Create the investor
        $contact = collect([
            "firstname" => $investor->name_invest,
            "lastname" => $investor->prenom_invest,
            "phone" => $investor->gsm_invest,
            "email" => $investor->email_invest,
            "type" => "signer",
            "position" => 1,
            'fileObjects' => collect([
                'Demande_de_Reservation'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf' =>
                    [
                        [
                            "page" => 5,
                            "position" => "124,187,222,226",
                            "mention" => "Lu et approuvé, Bon pour réservation",
                            "mention2" => "Signé par {$investor->name_invest} {$investor->prenom_invest}."
                        ],
                        [
                            "page" => 6,
                            "position" => "117,197,255,252",
                        ],
                        [
                            "page" => 7,
                            "position" => "118,373,256,428",
                        ],
                        [
                            "page" => 9,
                            "position" => "115,96,252,151",
                            "mention" => "Bon pour pouvoir",
                            "mention2" => "Signé par {$investor->name_invest} {$investor->prenom_invest}."
                        ],
                        [
                            "page" => 12,
                            "position" => "71,72,208,127",
                            "mention" => "Lu et approuvé",
                            "mention2" => "Signé par {$investor->name_invest} {$investor->prenom_invest}."
                        ],

                    ],
                'Mandat_de_Recherche'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf' =>
                    [
                        [
                            "page" => 1,
                            "position" => "116,56,237,110",
                            "mention" => "Lu et approuvé, bon pour mandat",
                            "mention2" => "Signé par {$investor->name_invest} {$investor->prenom_invest}."
                        ]
                    ]
            ])
        ]);

        // create the CGP
        $validator = collect([
            "firstname" => $cgp_contact->fistname,
            "lastname" => $cgp_contact->lastname,
            "phone" => $cgp_contact->gsm,
            "email" => $cgp_contact->email,
            "type" => "validator",
            "position" => 3,
        ]);

        $conjoint = null;
        if(in_array($investor->regime_mat_invest, ["02", "04"])){
            // Create investor's husband/wife if exist
            $conjoint = collect([
                "firstname" => $investor->nom_conjoint,
                "lastname" => $investor->prenom_conjoint,
                "phone" => $investor->phone_conjoint,
                "email" => $investor->mail_conjoint,
                "type" => "signer",
                "position" => 2,
                'fileObjects' => collect([
                    'Demande_de_Reservation'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf' =>
                        [
                            [
                                "page" => 8,
                                "position" => "117,197,255,252",
                                "mention2" => "Signé par {$investor->nom_conjoint} {$investor->prenom_conjoint}."
                            ],
                        ],

                ])
            ]);

            $contact->put('position', 1);
            $author->put('position', 3);
            $validator->put('position', 4);

        }

        // Push all
        $this->member = collect([
            $author,
            $contact,
            $validator,
        ]);

        // Add Conjoint if exist
        if($conjoint){
            $this->member->push($conjoint);
        }

        $this->member = $this->member->sortBy('position', SORT_REGULAR)->values();
    }

    public function setFile(Reservation $reservation)
    {
        $investor = \App\Investor::find($reservation->investors_id);
        $formulae = \App\TypeContrat::find($reservation->type_contrats_id);

        $pdf = PDF::loadView('pdf.reservations.reservation', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);

        $this->pdf ['Demande_de_Reservation'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf'] = $pdf->output();

        $another_pdf = PDF::loadView('pdf.reservations.mandat_recherche', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);

        $this->pdf ['Mandat_de_Recherche'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf'] = $another_pdf->output();

        $this->yousignFileName = 'Mandat_de_Recherche'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf';
        $this->yousignName = "{$reservation->identifiant} - {$investor->name_invest} {$investor->prenom_invest}";
        $this->yousignDescription = "Reservation d'un Mandat de Recherche pour {$investor->name_invest} {$investor->prenom_invest} - Dossier n° {$reservation->identifiant}";

    }



    public function getYousignConfig(){
        return [
            // TODO make it as configurable
            // TODO remove all string inner
            // TODO better better BETTER messages
            "email" => [
                "member.started" => [
                    [
                        "subject" => "Vous êtes invités à signer votre contrat sur Yousign!",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est prêt, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Réservation</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "member.finished" => [
                    [
                        "subject" => "Votre contrat sur Yousign a été signé!",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation a été, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés aux documents</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "procedure.started" => [
                    [
                        "subject" => "Une Nouvelle procedure de Réservation est en cours",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est prêt, La procédure a débuté, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Procédure</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "procedure.finished" => [
                    [
                        "subject" => "La procedure de Réservation est terminée!",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est validé, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Procédure</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "procedure.refused" => [
                    [
                        "subject" => "La procedure de Réservation est refusée",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est refusé, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Procédure</tag>",
                        "to" => ["@member"],
                    ]
                ]
            ]
        ];
    }



    public function generatePDFMandat(Request $request, Reservation $reservation){
        $this->authorize('browse', $reservation);
        $investor = \App\Investor::find($reservation->investors_id);
        $formulae = \App\TypeContrat::find($reservation->type_contrats_id);
        $pdf = PDF::loadView('pdf.reservations.mandat_recherche', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);
        return $pdf->download('Mandat_de_Recherche'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf');
    }

    public function generatePDFRecherche(Request $request, Reservation $reservation){
        $this->authorize('browse', $reservation);
        $investor = \App\Investor::find($reservation->investors_id);
        $formulae = \App\TypeContrat::find($reservation->type_contrats_id);
        $pdf = PDF::loadView('pdf.reservations.reservation', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);
        return $pdf->download('Demande_de_Reservation'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf');
    }

    public function generatePDFSEPA(Request $request, Reservation $reservation){
        $this->authorize('browse', $reservation);
        $investor = \App\Investor::find($reservation->investors_id);
        $formulae = \App\TypeContrat::find($reservation->type_contrats_id);
        $pdf = PDF::loadView('pdf.reservations.sepa', ['reservation' => $reservation, 'investor' => $investor, 'formulae' => $formulae]);
        return $pdf->download('Mandat_SEPA'.$investor->name_invest.'_'.$investor->prenom_invest.'_'.date('m-d-Y').'.pdf');
    }

    public function yousign(Request $request, Reservation $reservation){
//        dd(
//            $investor = \App\Investor::find($reservation->investors_id),
//            $cgp = \App\CGP::find($reservation->cgps_id),
//            $cgp_contact = \App\Contact::find($cgp->contact_id)
//        );


//        if($yousignProcedure = $this->isExistingYousignProcedure($reservation->yousign_procedure_id)){
//            $this->alertWarning(
//                "Procédure Yousign Existante"
//                ."<br/>"
//                ."Procédure numéro: {$yousignProcedure->id}");
//            return redirect()->back()->with($this->alerts);
//        }

        $this->setFile($reservation);
        $this->setMember($reservation);


        $response = $this->yousignStartProcedure();


        // FIXME do an event, please!!!!
        // XXX little hack to not thrown the saving event for calculations
        DB::table($reservation->getTable())->where('id', $reservation->id)->update(['yousign_procedure_id' => json_encode($this->yousignProcedure)]);

        $this->alertSuccess("{$response->original->name} <br/> Envoyer a Yousign <br/> Procedure numéro: {$response->original->id}");
        return redirect()->back()->with($this->alerts);
    }

}
