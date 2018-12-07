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
        $this->call(12072018AddressesTableSeeder::class);
        $this->call(12072018BanksTableSeeder::class);
        $this->call(12072018CategoriesTableSeeder::class);
        $this->call(12072018ContactAddressesTableSeeder::class);
        $this->call(12072018ContactsTableSeeder::class);
        $this->call(12072018DataTypesTableSeeder::class);
        $this->call(12072018DataRowsTableSeeder::class);
        $this->call(12072018MenusTableSeeder::class);
        $this->call(12072018IntermediariesTableSeeder::class);
        $this->call(12072018MenuItemsTableSeeder::class);
        $this->call(12072018NatureEntitiesTableSeeder::class);
        $this->call(12072018PagesTableSeeder::class);
        $this->call(12072018LeaseholdersTableSeeder::class);
        $this->call(12072018InvestorsTableSeeder::class);
        $this->call(12072018PasswordResetsTableSeeder::class);
        $this->call(12072018PostsTableSeeder::class);
        $this->call(12072018RegistrationEntitiesTableSeeder::class);
        $this->call(12072018SettingsTableSeeder::class);
        $this->call(12072018SuppliersTableSeeder::class);
        $this->call(12072018TauxCgpTableSeeder::class);
        $this->call(12072018ReservationsTableSeeder::class);
        $this->call(12072018TranslationsTableSeeder::class);
        $this->call(12072018TypeContratsTableSeeder::class);
        $this->call(12072018TypeEntitiesTableSeeder::class);
        $this->call(12072018PermissionsTableSeeder::class);
        $this->call(12072018RolesTableSeeder::class);
        $this->call(12072018PermissionRoleTableSeeder::class);
        $this->call(12072018UsersTableSeeder::class);
        $this->call(12072018UserRolesTableSeeder::class);
        $this->call(12072018VoyagerThemesTableSeeder::class);
        $this->call(12072018VoyagerThemeOptionsTableSeeder::class);
        $this->call(12072018CgpsTableSeeder::class);
        $this->call(12072018SncsTableSeeder::class);
        $this->call(12072018MandatTableSeeder::class);
    }
}
