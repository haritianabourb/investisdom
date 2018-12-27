<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;
class MoneyFormField extends AbstractHandler
{
    protected $codename = 'money';
    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.custom.money', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
        // return view('voyager::formfields.custom.money');
    }
}