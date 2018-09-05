<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class SNCDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'sncs');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'sncs',
                'display_name_singular' => 'SNC',
                'display_name_plural'   => 'SNC',
                'icon'                  => 'voyager-person',
                'model_name'            => 'App\\SNC',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Société à Nomination Commune',
            ])->save();
        }
    }

    /**
     * [dataType description].
     *
     * @param [type] $field [description]
     * @param [type] $for   [description]
     *
     * @return [type] [description]
     */
    protected function dataType($field, $for)
    {
        return DataType::firstOrNew([$field => $for]);
    }
}
