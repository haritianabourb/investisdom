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

use App\TauxCGP;
use App\TypeContrat;
use Illuminate\Console\OutputStyle;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class TauxCGPImport implements ToModel, WithProgressBar, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return TauxCGP|TauxCGP[]|null
     */
    public function model(array $row)
    {

        $cgp = CGP::where("name", trim($row["nom_cgp"]))->first();
        $formulae = TypeContrat::where("slug", trim($row["formule"]))->first();

        if(!$cgp){
            dd($row);
        }

        if(!$formulae){
            dd($row);
        }

        // TODO: Implement model() method.
        return new TauxCGP([
            "cgps_id" => $cgp->id,
            "type_contrat_id" => $formulae->id,
            "mois_1"    => str_replace(",",".",trim($row["janvier"])),
            "mois_2"    => str_replace(",",".",trim($row["fevrier"])),
            "mois_3"    => str_replace(",",".",trim($row["mars"])),
            "mois_4"    => str_replace(",",".",trim($row["avril"])),
            "mois_5"    => str_replace(",",".",trim($row["mai"])),
            "mois_6"    => str_replace(",",".",trim($row["juin"])),
            "mois_7"    => str_replace(",",".",trim($row["juillet"])),
            "mois_8"    => str_replace(",",".",trim($row["aout"])),
            "mois_9"    => str_replace(",",".",trim($row["septembre"])),
            "mois_10"   => str_replace(",",".",trim($row["octobre"])),
            "mois_11"   => str_replace(",",".",trim($row["novembre"])),
            "mois_12"   => str_replace(",",".",trim($row["decembre"])),
            "year"      => str_replace(",",".",trim($row["annee"])),
            "reduction_aj" => trim($row["aj_comprise"])
        ]);
    }
}