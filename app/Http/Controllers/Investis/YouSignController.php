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

    protected $yousignFileName = "Document_test_trait";
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

}
