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
        $this->call(DevInvestisAddressesTableSeeder::class);
        $this->call(DevInvestisBanksTableSeeder::class);
        $this->call(DevInvestisCategoriesTableSeeder::class);
        $this->call(DevInvestisContactAddressesTableSeeder::class);
        $this->call(DevInvestisContactsTableSeeder::class);
        $this->call(DevInvestisDataTypesTableSeeder::class);
        $this->call(DevInvestisDataRowsTableSeeder::class);
        $this->call(DevInvestisMenusTableSeeder::class);
        $this->call(DevInvestisIntermediariesTableSeeder::class);
        $this->call(DevInvestisMenuItemsTableSeeder::class);
        $this->call(DevInvestisNatureEntitiesTableSeeder::class);
        $this->call(DevInvestisPagesTableSeeder::class);
        $this->call(DevInvestisLeaseholdersTableSeeder::class);
        $this->call(DevInvestisInvestorsTableSeeder::class);
        $this->call(DevInvestisPasswordResetsTableSeeder::class);
        $this->call(DevInvestisPostsTableSeeder::class);
        $this->call(DevInvestisRegistrationEntitiesTableSeeder::class);
        $this->call(DevInvestisSettingsTableSeeder::class);
        $this->call(DevInvestisSuppliersTableSeeder::class);
        $this->call(DevInvestisTauxCgpTableSeeder::class);
        $this->call(DevInvestisReservationsTableSeeder::class);
        $this->call(DevInvestisTranslationsTableSeeder::class);
        $this->call(DevInvestisTypeContratsTableSeeder::class);
        $this->call(DevInvestisTypeEntitiesTableSeeder::class);
        $this->call(DevInvestisPermissionsTableSeeder::class);
        $this->call(DevInvestisRolesTableSeeder::class);
        $this->call(DevInvestisPermissionRoleTableSeeder::class);
        $this->call(DevInvestisUsersTableSeeder::class);
        $this->call(DevInvestisUserRolesTableSeeder::class);
        $this->call(DevInvestisVoyagerThemesTableSeeder::class);
        $this->call(DevInvestisVoyagerThemeOptionsTableSeeder::class);
        $this->call(DevInvestisCgpsTableSeeder::class);
        $this->call(DevInvestisSncsTableSeeder::class);
        // $this->call(DevInvestisMandatTableSeeder::class);
        $this->call(ResetSequenceTableSeeder::class);
    }
}
