<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\DataType;

class LeaseholdersDataTypesTableSeeder extends InvestisSeeder
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
                'icon'                  => 'voyager-archive',
                'model_name'            => 'App\\Leaseholder',
                'policy_name'           => '',
                'controller'            => '',
                'generate_permissions'  => 1,
                'description'           => 'Locataires',
            ])->save();
        }
    }

}
