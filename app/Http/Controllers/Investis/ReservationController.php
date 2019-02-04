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

//    protected $yousignFileName = "Document_test_trait";
    protected $yousignName = "Signing Procedure with trait";
    protected $yousignDescription = "New!!! now it's with trait, viva la dynamica!!!";

    public function getFiles()
    {
        return $this->pdf;
    }

    public function getMembers()
    {
        // TODO: Implement getMembers() method.
        return [$this->member];
    }

    public function setMember(Reservation $reservation)
    {
        $investor = \App\Investor::find($reservation->investors_id);

        $this->member = [
            "firstname" => $investor->name_invest,
            "lastname" => $investor->prenom_invest,
            "phone" => '+262692448152',
            "email" => 'monelchristophe@gmail.com',
        ];
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
            //TODO make it as configurable
            "email" => [
                "member.started" => [
                    [
                        "subject" => "Vous êtes invités à signer votre contrat sur Yousign!",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est prêt, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Réservation</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "procedure.started" => [
                    [
                        "subject" => "Une Nouvelle procedure de Réservation est en cours",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est prêt, Veuillez cliquer ici pour être redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Réservation</tag>",
                        "to" => ["@creator"],
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
        $this->setMember($reservation);
        $this->setFile($reservation);
        $response = $this->yousignStartProcedure();


        // FIXME do an event, please!!!!
//        $reservation->yousign_procedure_id = json_encode($this->yousignProcedure);
        // XXX little hack to not thrown the saving event for calculations
        DB::table($reservation->getTable())->where('id', $reservation->id)->update(['yousign_procedure_id' => json_encode($this->yousignProcedure)]);

        $this->alertSuccess("{$response->original->name} <br/> Envoyer a Yousign <br/> Procedure numéro: {$response->original->id}");
        return redirect()->back()->with($this->alerts);
    }

//    public function yousignReturnView(){
//        return response('here');
//    }

}
