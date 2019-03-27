<?php
namespace App\FormFields;
use TCG\Voyager\FormFields\AbstractHandler;
class PercentageHandler extends AbstractHandler
{
    protected $codename = 'percentage';
    public function createContent($row, $dataType, $dataTypeContent, $options)
    {
        return view('voyager::formfields.percentage', compact('row', 'options', 'dataType', 'dataTypeContent'));
        // return view('voyager::formfields.custom.money');
    }
}
