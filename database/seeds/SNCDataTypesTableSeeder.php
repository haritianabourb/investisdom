<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class SNCDataTypesTableSeeder extends InvestisSeeder
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
                'icon'                  => 'voyager-wallet',
                'model_name'            => 'App\\SNC',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Société à Nomination Commune',
            ])->save();
        }
    }

}
