<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class SuppliersDataTypesTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'suppliers');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'suppliers',
                'display_name_singular' => 'Fournisseur',
                'display_name_plural'   => 'Fournisseurs',
                'icon'                  => 'voyager-person',
                'model_name'            => 'App\\Supplier',
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
