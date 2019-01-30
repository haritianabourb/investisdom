<?php
/**
 * Created by PhpStorm.
 * User: imthecatinthebox
 * Date: 15.01.2019
 * Time: 17:40
 */

namespace App\Http\Controllers\Investis;

use App\Http\Traits\YousignProcedure;
use PDF;


class YouSignController extends VoyagerBaseController
{
    use YousignProcedure;

//    protected $yousignFileName = "Document_test_trait";
    protected $yousignName = "Signing Procedure with trait";
    protected $yousignDescription = "New!!! now it's with trait, viva la dynamica!!!";

    public function getFile()
    {
        return PDF::loadView('testview')->output();
    }

    public function getMember()
    {
        return [
           "nom" => 'Soundi',
           "prenom" => 'Fica',
           "phone" => '+33754284387',
           "email" => 'soundifica@gmail.com',
        ];
    }

    public function getYousignConfig(){
        return [
            //TODO make it as configurable
            "email" => [
                "member.started" => [
                    [
                        "subject" => "Vous êtes invités à signer votre contrat sur Yousign!",
                        "message" => "Bonjour <tag data-tag-type='string' data-tag-name='recipient.firstname'></tag> <tag data-tag-type='string' data-tag-name='recipient.lastname'></tag>, <br><br> Votre Contrat de Reservation est pret, Veuillez cliquer ici pour etre redirigé: <tag data-tag-type='button' data-tag-name='url' data-tag-title='Access to documents'>Accés à la Réservation</tag>",
                        "to" => ["@member"],
                    ]
                ],
                "procedure.started" => [
                    [
                        "subject" => "John, created a procedure your API have",
                        "message" => "The content of this email is totally awesome.",
                        "to" => ["@creator"],
                    ]
                ]
            ]
        ];
    }


}
