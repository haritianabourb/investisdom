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
      $table_name = [
        "addresses",
        "banks",
        "contact_addresses",
        "data_types",
        "cgps",
        "contacts",
        "intermediaries",
        "investors",
        "categories",
        "data_rows",
        "leaseholders",
        "mandat",
        "menus",
        "menu_items",
        "nature_entities",
        "pages",
        // "password_resets",
        "posts",
        "registration_entities",
        "reservations",
        "settings",
        "sncs",
        "permissions",
        // "permission_role",
        "suppliers",
        "taux_cgp",
        "translations",
        "type_contrats",
        "type_entities",
        "voyager_theme_options",
        // "user_roles",
        "users",
        "roles",
        "voyager_themes",
      ];

      foreach ($table_name as $k) {
        DB::statement("SELECT setval(pg_get_serial_sequence('{$k}', 'id'), MAX(id)) FROM {$k}");
      }
    }
}
