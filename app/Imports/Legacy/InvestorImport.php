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
use Illuminate\Console\OutputStyle;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class InvestorImport implements ToModel, WithProgressBar, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return Investor|Investor[]|null
     */
    public function model(array $row)
    {
        $cgp = CGP::where('name', $row['id_cgp_rattache'])->get()->first();

        if(!$cgp){
            dd($row);
        }

        $naissance_conjoint = \DateTime::createFromFormat('d/m/Y',$row['naissance_conjoint']);
        $investisseur_naissance = \DateTime::createFromFormat('d/m/Y',$row['investisseur_naissance']);

        // TODO: Implement model() method.
        return new Investor([
            "nature_entities_id" => 1,
            "type_entities_id" => 4,
            "address_1" => $row['adresse'],
            "postal_code" => $row['cp'],
            "city" => $row['ville'],
            "cgp_id" => $cgp->id,
            "cgp_attached" => $cgp->id,
            "contact_attached" => $cgp->contact_id,
            "civilite" => $row['investisseur_civilite'],
            "prenom_invest" => $row['investisseur_prenom'],
            "name_invest" => $row['investisseur_nom'],
            "name_jeunefille_invest" =>  $row['investisseur_nom_fille'],
            "birth_location" => $row['investisseur_lieu_naissance'],
            "birth_cp" => $row['investisseur_cp_naissance'],
            "email_invest" => $row['email'],
            "country_invest" => $row['investisseur_nationalite'],
            "fixe_invest" => str_replace(' ', '', $row['telephone']),
            "gsm_invest" => str_replace(' ', '', $row['mobile']),
            "fax_invest" => str_replace(' ', '', $row['fax']),
            "regime_mat_invest" => $row['regime_matrimonial'],
            "father_invest" => $row['nom_pere'],
            "madre_invest" => $row['nom_mere'],
            "profession_invest" => $row['profession'],
            "prenom_conjoint" => $row['prenom_conjoint'],
            "nom_conjoint" => $row['nom_conjoint'],
            "nom_jeunefille_conjoint" => $row['nom_fille_conjoint'],
            "birth_conjoint" => $naissance_conjoint ? $naissance_conjoint ->format('Y-m-d'): null,
            "birth_date" => $investisseur_naissance ? $investisseur_naissance ->format('Y-m-d') : null,
        ]);
    }
}


























































