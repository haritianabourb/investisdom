<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class BanksDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'banks');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'banks',
                'display_name_singular' => 'Banque',
                'display_name_plural'   => 'Banques',
                'icon'                  => 'voyager-person',
                'model_name'            => 'App\\Leaseholder',
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
