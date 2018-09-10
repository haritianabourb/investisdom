<?php

use TCG\Voyager\Models\DataType;

class IntermediariesDataRowsTableSeeder extends InvestisSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $entititesDataType = DataType::where('slug', 'entities')->firstOrFail();
        $sncsDataType = DataType::where('slug', 'intermediaries')->firstOrFail();

        foreach ($entititesDataType->rows()->get() as $row) {
          $this
            ->dataRow($sncsDataType, collect($row->toArray())->except(['id', 'data_type_id']))
            ->save();

        }
    }

}
