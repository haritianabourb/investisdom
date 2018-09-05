<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class LeaseholdersPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::generateFor('leaseholders');

    }
}
