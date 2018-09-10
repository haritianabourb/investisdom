<?php

use TCG\Voyager\Models\DataType;

class SNCDataRowsTableSeeder extends InvestisSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $entititesDataType = DataType::where('slug', 'entities')->firstOrFail();
        $sncsDataType = DataType::where('slug', 'sncs')->firstOrFail();

        foreach ($entititesDataType->rows()->get() as $row) {
          $this
            ->dataRow($sncsDataType, collect($row->toArray())->except(['id', 'data_type_id']))
            ->save();

        }
    }

    /**
     * [dataRow description].
     *
     * @param [type] $type  [description]
     * @param [type] $field [description]
     *
     * @return [type] [description]
     */
    protected function dataRow($type, $fields)
    {
        return new DataRow($fields->put('data_type_id', $type->id)->toArray());
    }
}
