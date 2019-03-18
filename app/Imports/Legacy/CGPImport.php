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

use Illuminate\Console\OutputStyle;
use Maatwebsite\Excel\Concerns\Importable;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithProgressBar;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class CGPImport implements ToModel, WithProgressBar, WithHeadingRow
{
    use Importable;

    /**
     * @param array $row
     *
     * @return CGP|CGP[]|null
     */
    public function model(array $row)
    {
        $contact = Contact::where('email', $row['email_contact_attached'])->first();

        if(env('MAIL_HOST') == "smtp.mailtrap.io"){
            sleep(5);
        }

        // TODO: Implement model() method.
        return new CGP([
            "contact_id"=> $contact->id,
            "name"=> $row['name'],
            "registered_key"=> str_replace(' ','',$row['registered_key']),
            "address_1"=> $row['address_1'],
            "address_2"=> null,
            "postal_code"=> $row['postal_code'],
            "city"=> $row['city'],
            "started_at"=> $row['started_at'],
            "capital"=> str_replace(' ','',$row['capital']),
            "registration_city"=> $row['registration_city'],
            "ape_key"=> null,
            "etablishment_code"=> null,
            "juridical_registration"=> $row['juridical_registration'],
            "activity"=> $row['activity'],
            "type_registration"=> $row['type_registration'],
        ]);
    }
}