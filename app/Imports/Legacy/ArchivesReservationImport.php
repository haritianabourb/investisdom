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
use Carbon\Carbon;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\SkipsErrors;
use Maatwebsite\Excel\Concerns\SkipsFailures;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithCustomCsvSettings;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ArchivesReservationImport implements ToModel, WithProgressBar, WithHeadingRow, WithCustomCsvSettings
{
    use Importable, SkipsErrors, SkipsFailures;

    /**
     * @param array $row
     *
     * @return Reservation|Reservation[]|null
     */
    public function model(array $row)
    {
        dd($row);
        $contact = Contact::where('email', $row['id_contact'])->first();
        $investors = Investor::where('email_invest', $row['id_investisseur_rattache'])->first();
        $cgp = CGP::ofContact($contact)->first();
        $formulae = TypeContrat::where('slug', $row["type_contrat"])->first();

//        $mandat_reserved_at = \DateTime::createFromFormat('d/m/Y',$row['date_reservation']);
//        $mandat_start_at = \DateTime::createFromFormat('d/m/Y',$row['date_mandat']);
//        $mandat_finnish_at = \DateTime::createFromFormat('d/m/Y',$row['date_fin_mandat']);



        //Reservation::truncate();

        // FIXME Formulae cannot work here, because we havent got CGP rate a this time,
        // I removed the calculate observer for the execution (see CSVArchivesReservationSeeder:21)
        // also i prepared the flow in order to save it correctly ;)
        $date = (new Carbon($row["date_reservation"]))->format("Ymd");
        $identifiant =
            substr(preg_replace('/\s/', '', stripAccents($investors->name)), 0, 3)
            .substr(preg_replace('/\s/', '', stripAccents($cgp->name)), -3)
            ."-".$date
            ."/".$row['iid_contrat'];


        // FIXME adding missing columns to csv
        if (!is_null($cgp) && !is_null($investors) && !is_null($formulae)){
            $reservation = new Reservation([
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

            if (!is_null($row["folder"])){

                if (!is_null($row["investisseur_doc_reservation"])){
                    $reservation->mr = json_encode([[
                        "download_link" => "reservations\\archives\\".$row["iid_contrat"]."\\".$row["investisseur_doc_reservation"],
                        "original_name" => $row["investisseur_doc_reservation"],
                    ]]);

                    //[{"download_link":"investors\\April2019\\l3tfbUgNr64q2zEIqu3m.pdf","original_name":"Contrat_de_partenariat_FINANCIERE DES LYS(6).pdf"}]
                }

                if (!is_null($row["investisseur_doc_souscription"])){
                    $reservation->res = json_encode([[
                        "download_link" => "reservations\\archives\\".$row["iid_contrat"]."\\".$row["investisseur_doc_souscription"],
                        "original_name" => $row["investisseur_doc_souscription"],
                    ]]);
                }

                if (!is_null($row["cheque_resa"])){
                    $reservation->cr = json_encode([[
                        "download_link" => "reservations\\archives\\".$row["iid_contrat"]."\\".$row["cheque_resa"],
                        "original_name" => $row["cheque_resa"],
                    ]]);
                }

                if (!is_null($row["remise_cheque"])){
                    $reservation->rc = json_encode([[
                        "download_link" => "reservations\\archives\\".$row["iid_contrat"]."\\".$row["remise_cheque"],
                        "original_name" => $row["remise_cheque"],
                    ]]);
                }
            }


            return $reservation;
        }
        return null;
    }

    /**
     * @return array
     */
    public function getCsvSettings(): array
    {
        // TODO: Implement getCsvSettings() method.
        return [
            'input_encoding' => 'ISO-8859-1',
            'delimiter' => ';',
        ];
    }
}
