<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;
class EmailHandler extends AbstractHandler
{
    protected $codename = 'email';

    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.custom.email', compact('row', 'options', 'dataType', 'dataTypeContent'));
    }
}
