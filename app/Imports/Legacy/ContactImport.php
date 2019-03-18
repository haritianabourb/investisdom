<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 18/03/19
 * Time: 16:32
 */

namespace App\Imports\Legacy;

use App\Contact;

use Illuminate\Console\OutputStyle;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ContactImport implements ToModel, WithProgressBar, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return Contact|Contact[]|null
     */
    public function model(array $row)
    {
        // TODO: Implement model() method.
        return new Contact([
            'civilite' => $row['civilite'],
            'fistname'     => $row['fistname'],
            'lastname'    => $row['lastname'],
            'function' => $row['function'],
            'tel_fixe' => $row['tel_fixe'],
            'gsm' => $row['tel_gsm'],
            'fax' => $row['fax'],
            'email' => $row['email'],
            'address_1' => 'ADRESSE INCONNUE',
            'postal_code' => '00000',
            'city' => 'INCONNU',

        ]);
    }
}