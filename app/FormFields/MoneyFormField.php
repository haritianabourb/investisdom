<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;
class MoneyFormField extends AbstractHandler
{
    protected $codename = 'money';
    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('formfields.money', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
    }
}