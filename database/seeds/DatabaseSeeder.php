<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // InvestisSpecific
        $this->call(TypeEntitiesSeeder::class);
        $this->call(NatureEntitiesSeeder::class);
        // $this->call(RegistrationEntitiesSeeder::class);

        // Voyager Specific
        // SNC
        $this->call(SNCDataTypesTableSeeder::class);
        $this->call(SNCDataRowsTableSeeder::class);
        $this->call(SNCPermissionsTableSeeder::class);
    }
}
