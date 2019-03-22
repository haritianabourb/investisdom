<?php

use Illuminate\Database\Seeder;

class BreadSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->command->line("---");
        $this->command->comment('Seeding BREAD Generator');

        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);

        $this->call(ResetSequenceTableSeeder::class);

        $this->command->info(get_class($this).' Seeds');
        $this->command->line("---");

    }
}
