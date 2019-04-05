<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 18/03/19
 * Time: 16:32
 */

namespace App\Imports\Legacy;

use App\CGP;
use App\Contact;

use App\Investor;
use App\Reservation;
use App\TypeContrat;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MissingReservationImport implements ToModel, WithProgressBar, WithHeadingRow
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
     * @param array $row
     *
     * @return Reservation|Reservation[]|null
     */
    public function model(array $row)
    {
        $contact = Contact::where('email', $row['id_contact'])->first();
        $investors = Investor::where('email_invest', $row['id_investisseur_rattache'])->first();
        $cgp = CGP::ofContact($contact)->first();
        $formulae = TypeContrat::where('slug', $row["type_contrat"])->first();

//        $mandat_reserved_at = \DateTime::createFromFormat('d/m/Y',$row['date_reservation']);
//        $mandat_start_at = \DateTime::createFromFormat('d/m/Y',$row['date_mandat']);
//        $mandat_finnish_at = \DateTime::createFromFormat('d/m/Y',$row['date_fin_mandat']);


        if(!$cgp){
            dd($contact, $investors);
        }

        // TODO: Implement model() method.
        return new Reservation([
            "montant_reduction" => $row["montant_reduction_impot"],
            "commission_cgp" => $row["taux_commission_cgp"]/100,
            "type_contrats_id" => $formulae->id,
            "cgps_id" => $cgp->id,
            "investors_id" => $investors->id,
            "user_id" => $contact->user_id,
            "nbr_snc" => $row["nb_snc_souscrit"],
            "assistance_juridique" => $row["assistance_juridique"] == "oui" ? 1 : 0,
            "secteurs_activite" => $row["secteur_activite_souscrit"],
            "type_aj" => "permanent",
            "paiement" => "unique",
            "mode_paiement" => "cheque",
            "mandat_reserved_at" => $row["date_reservation"],
            "mandat_start_at" =>    $row["date_mandat"],
            "mandat_finnish_at" =>  $row["date_fin_mandat"],
        ]);
    }
}