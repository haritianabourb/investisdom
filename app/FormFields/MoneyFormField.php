<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;
class MoneyFormField extends AbstractHandler
{
    protected $codename = 'money';
    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.custom.money', compact('row', 'options', 'dataType', 'dataTypeContent'));
        // return view('voyager::formfields.custom.money');
    }
}
