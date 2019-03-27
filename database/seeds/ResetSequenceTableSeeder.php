<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ResetSequenceTableSeeder extends Seeder
{

    /**
     * Auto generated seed file
     *
     * @return void
     */
    public function run()
    {
        $table_excluded = [
            "cgp_contacts",
            "datatype_contacts",
            "password_resets",
            "user_roles",
            "permission_role",
        ];

        $tables = DB::connection()->getDoctrineSchemaManager()->listTableNames();

        collect($tables)->filter(function ($item) use ($table_excluded) {
            return !in_array($item, $table_excluded);
        })->each(function ($item) {
            DB::statement("SELECT setval(pg_get_serial_sequence('{$item}', 'id'), MAX(id)) FROM {$item}");
        });

//        collect($table_name)->filter(function($item) use ($tables){
//            return in_array($item, $tables);
//        })->each(function($item){
//          DB::statement("SELECT setval(pg_get_serial_sequence('{$item}', 'id'), MAX(id)) FROM {$item}");
//        });

    }
}
