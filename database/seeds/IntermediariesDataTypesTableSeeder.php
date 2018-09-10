<?php

class IntermediariesDataTypesTableSeeder extends InvestisSeeder
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
                'icon'                  => 'voyager-tag',
                'model_name'            => 'App\\Intermediary',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Apporteur d\'affaire et assimilés',
            ])->save();
        }
    }

}
