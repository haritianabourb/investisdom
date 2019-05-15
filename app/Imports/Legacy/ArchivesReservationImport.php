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

    private $count=0;

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


//        TODO create log of missing reservation
        if(is_null($cgp)){

            $this->count++;

//            var_dump(is_null($investors)?$investors:$row['id_contact']);

            $error_Log = [
              "msg" => "erreur sur la reservation :" .$row["id_contrat"],
              "contact" => "le contacte id  :" .$row['id_contact'],
                "count" => $this->count
            ];
            var_dump($error_Log);
            return null;
        }



        // FIXME Formulae cannot work here, because we havent got CGP rate a this time,
        // I removed the calculate observer for the execution (see CSVArchivesReservationSeeder:21)
        // also i prepared the flow in order to save it correctly ;)

        // FIXME adding missing columns to csv
        if (!is_null($cgp) && !is_null($investors) && !is_null($formulae)){

            if($reservation = Reservation::where([
                "type_contrats_id" => $formulae->id,
                "cgps_id" => $cgp->id,
                "investors_id" => $investors->id,
                "user_id" => $contact->user_id,
                "mandat_reserved_at" => $row["date_reservation"],
                "mandat_start_at" =>    $row["date_mandat"],
                "mandat_finnish_at" =>  $row["date_fin_mandat"],
                "yousign_procedure_id" => "archive",
            ])->get()->first()){

                $error_Log = [
                    "msg" => "erreur sur la reservation :" .$row["id_contrat"],
                    "reservation" => "Reservation :" .$reservation->identifiant,
                    "count" => $this->count
                ];

                var_dump($error_Log);

                return null;

            }


            // obligation for id to be generate here don't worry ;)
            $date = (new Carbon($row["date_reservation"]))->format("Ymd");
            $identifiant =
                substr(preg_replace('/\s/', '', stripAccents($investors->name)), 0, 3)
                .substr(preg_replace('/\s/', '', stripAccents($cgp->name)), -3)
                ."-".$date
                ."/".$row['id_contrat'];
            $reservation = new Reservation([
                "identifiant" => $identifiant,
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
                "taux_rentabilite" => $row['rentabilite']/100.0,
                "apport" => $row['apport_calcule'],
                "montant_commission_cgp" => $row['calcul_com_cgp'],
                "gain_brut" => str_replace(",",".",$row['gain_brut']),
                "taux_reservation" => $row['taux_souscription']/100.0,
                "created_at" => \Carbon\Carbon::now(),
                "updated_at" => \Carbon\Carbon::now(),
                "part" => $row['nombre_part'],
                "mandat_reserved_at" => $row["date_reservation"],
                "mandat_start_at" =>    $row["date_mandat"],
                "mandat_finnish_at" =>  $row["date_fin_mandat"],
                "yousign_procedure_id" => "archive",
            ]);

            if (!is_null($row["investisseur_doc_reservation"])){
                $reservation->mr = json_encode([[
                    "download_link" => "reservations\\archives\\".$row["id_contrat"]."\\".$row["investisseur_doc_reservation"],
                    "original_name" => $row["investisseur_doc_reservation"],
                ]]);

            }

            if (!is_null($row["investisseur_doc_souscription"])){
                $reservation->res = json_encode([[
                    "download_link" => "reservations\\archives\\".$row["id_contrat"]."\\".$row["investisseur_doc_souscription"],
                    "original_name" => $row["investisseur_doc_souscription"],
                ]]);
            }

            if (!is_null($row["cheque_resa"])){
                $reservation->cr = json_encode([[
                    "download_link" => "reservations\\archives\\".$row["id_contrat"]."\\".$row["cheque_resa"],
                    "original_name" => $row["cheque_resa"],
                ]]);
            }

            if (!is_null($row["remise_cheque"])){
                $reservation->rc = json_encode([[
                    "download_link" => "reservations\\archives\\".$row["id_contrat"]."\\".$row["remise_cheque"],
                    "original_name" => $row["remise_cheque"],
                ]]);
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
          'delimiter' => ';',
        ];
    }
}
