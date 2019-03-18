<?php
/**
 * Created by PhpStorm.
 * User: flick
 * Date: 18/03/19
 * Time: 16:32
 */

namespace App\Imports\Legacy;

use App\Contact
use Illuminate\Database\Eloquent\Model;use Maatwebsite\Excel\Concerns\ToModel;

class ContactImport implements ToModel
{

    /**
     * @param array $row
     *
     * @return Contact|Contact[]|null
     */
    public function model(array $row)
    {
        // TODO: Implement model() method.
        return new Contact([
            'civilite' => $row[0],
            'fistname'     => $row[1],
            'lastname'    => $row[2],
            'function' => $row[3],
            'tel_fix' => $row[4],
            'gsm' => $row[5],
            'fax' => $row[6],
            'email' => $row[7],
            'address_1' => 'ADRESSE INCONNUE',
            'postal_code' => '00000',
            'city' => 'INCONNU',

        ]);
    }
}