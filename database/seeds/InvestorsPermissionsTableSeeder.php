<?php

use Illuminate\Database\Seeder;
use TCG\Voyager\Models\Permission;

class InvestorsPermissionsTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     */
    public function run()
    {
        Permission::generateFor('investors');

    }
}
