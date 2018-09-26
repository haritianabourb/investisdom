<?php

class CGPDataTypesTableSeeder extends InvestisSeeder
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
                'icon'                  => 'voyager-bookmark',
                'model_name'            => 'App\\CGP',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Conseiller en Gestion de Patrimoine',
            ])->save();
        }
    }

}
