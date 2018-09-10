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
        // $this->call(TypeEntitiesSeeder::class);
        // $this->call(NatureEntitiesSeeder::class);
        // $this->call(RegistrationEntitiesSeeder::class);
        //
        // // Voyager Specific
        // // Banks
        // $this->call(BanksDataTypesTableSeeder::class);
        // $this->call(BanksDataRowsTableSeeder::class);
        // $this->call(BanksPermissionsTableSeeder::class);
        // // CGP
        // $this->call(CGPDataTypesTableSeeder::class);
        // $this->call(CGPDataRowsTableSeeder::class);
        // $this->call(CGPPermissionsTableSeeder::class);
        // // Intermediaries
        // $this->call(IntermediariesDataTypesTableSeeder::class);
        // $this->call(IntermediariesDataRowsTableSeeder::class);
        // $this->call(IntermediariesPermissionsTableSeeder::class);
        // // Investors
        // $this->call(InvestorsDataTypesTableSeeder::class);
        // $this->call(InvestorsDataRowsTableSeeder::class);
        // $this->call(InvestorsPermissionsTableSeeder::class);
        // // Leaseholders
        // $this->call(LeaseholdersDataTypesTableSeeder::class);
        // $this->call(LeaseholdersDataRowsTableSeeder::class);
        // $this->call(LeaseholdersPermissionsTableSeeder::class);
        // // SNC
        // $this->call(SNCDataTypesTableSeeder::class);
        $this->call(SNCDataRowsTableSeeder::class);
        $this->call(SNCPermissionsTableSeeder::class);
        // Suppliers
        $this->call(SuppliersDataTypesTableSeeder::class);
        $this->call(SuppliersDataRowsTableSeeder::class);
        $this->call(SuppliersPermissionsTableSeeder::class);
    }
}
