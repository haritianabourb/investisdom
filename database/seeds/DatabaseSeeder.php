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
        // $this->call(SNCDataRowsTableSeeder::class);
        // $this->call(SNCPermissionsTableSeeder::class);
        // Suppliers
        // $this->call(SuppliersDataTypesTableSeeder::class);
        // $this->call(SuppliersDataRowsTableSeeder::class);
        // $this->call(SuppliersPermissionsTableSeeder::class);
        $this->call(bcktestintAddressesTableSeeder::class);
        $this->call(bcktestintBanksTableSeeder::class);
        $this->call(bcktestintContactAddressesTableSeeder::class);
        $this->call(bcktestintDataTypesTableSeeder::class);
        $this->call(bcktestintCgpsTableSeeder::class);
        $this->call(bcktestintContactsTableSeeder::class);
        $this->call(bcktestintIntermediariesTableSeeder::class);
        $this->call(bcktestintInvestorsTableSeeder::class);
        $this->call(bcktestintCategoriesTableSeeder::class);
        $this->call(bcktestintDataRowsTableSeeder::class);
        $this->call(bcktestintLeaseholdersTableSeeder::class);
        $this->call(bcktestintMandatTableSeeder::class);
        $this->call(bcktestintMenusTableSeeder::class);
        $this->call(bcktestintMenuItemsTableSeeder::class);
        $this->call(bcktestintNatureEntitiesTableSeeder::class);
        $this->call(bcktestintPagesTableSeeder::class);
        $this->call(bcktestintPasswordResetsTableSeeder::class);
        $this->call(bcktestintPostsTableSeeder::class);
        $this->call(bcktestintRegistrationEntitiesTableSeeder::class);
        $this->call(bcktestintReservationsTableSeeder::class);
        $this->call(bcktestintSettingsTableSeeder::class);
        $this->call(bcktestintSncsTableSeeder::class);
        $this->call(bcktestintPermissionsTableSeeder::class);
        $this->call(bcktestintSuppliersTableSeeder::class);
        $this->call(bcktestintTauxCgpTableSeeder::class);
        $this->call(bcktestintTranslationsTableSeeder::class);
        $this->call(bcktestintTypeContratsTableSeeder::class);
        $this->call(bcktestintTypeEntitiesTableSeeder::class);
        $this->call(bcktestintVoyagerThemeOptionsTableSeeder::class);
        $this->call(bcktestintRolesTableSeeder::class);
        $this->call(bcktestintUsersTableSeeder::class);
        $this->call(bcktestintVoyagerThemesTableSeeder::class);
        $this->call(bcktestintUserRolesTableSeeder::class);
        $this->call(bcktestintPermissionRoleTableSeeder::class);
    }
}
