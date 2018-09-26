<?php


class SuppliersDataTypesTableSeeder extends InvestisSeeder
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
                'icon'                  => 'voyager-truck',
                'model_name'            => 'App\\Supplier',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Fournisseurs',
            ])->save();
        }
    }

}
