<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class InvestorsDataTypesTableSeeder extends InvestisSeeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        $dataType = $this->dataType('slug', 'investors');
        if (!$dataType->exists) {
            $dataType->fill([
              'name'                  => 'investors',
                'display_name_singular' => 'Investisseur',
                'display_name_plural'   => 'Investisseurs',
                'icon'                  => 'voyager-medal-rank-star',
                'model_name'            => 'App\\Investor',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Investisseurs',
            ])->save();
        }
    }

}
