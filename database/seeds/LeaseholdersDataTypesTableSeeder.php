<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class LeaseholdersDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'leaseholders');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'leaseholders',
                'display_name_singular' => 'Locataire',
                'display_name_plural'   => 'Locataires',
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
