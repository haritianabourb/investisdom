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
        $this->call(ResetSequenceTableSeeder::class);
    }
}
