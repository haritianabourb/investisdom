<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;
class PercentageFormField extends AbstractHandler
{
    protected $codename = 'percentage';
    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.percentage', [
            'row' => $row,
            'options' => $options,
            'dataType' => $dataType,
            'dataTypeContent' => $dataTypeContent
        ]);
        // return view('voyager::formfields.custom.money');
    }
}