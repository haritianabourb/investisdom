<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class IntermediariesDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'intermediaries');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'intermediaries',
                'display_name_singular' => 'Apporteur d\'Affaire',
                'display_name_plural'   => 'Apporteurs d\'Affaire',
                'icon'                  => 'voyager-person',
                'model_name'            => 'App\\Intermediary',
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
