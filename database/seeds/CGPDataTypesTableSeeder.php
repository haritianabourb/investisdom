<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class CGPDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'cgps');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'cgps',
                'display_name_singular' => 'CGP',
                'display_name_plural'   => 'CGP',
                'icon'                  => 'voyager-person',
                'model_name'            => 'App\\CGP',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Conseiller en Gestion de Patrimoine',
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
