<?php

class BanksDataTypesTableSeeder extends InvestisSeeder
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
                'icon'                  => 'voyager-treasure',
                'model_name'            => 'App\\Bank',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Banques et Assimilés',
            ])->save();
        }
    }

}
