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
        $this->call(AddressesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(ContactAddressesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(IntermediariesTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(NatureEntitiesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(LeaseholdersTableSeeder::class);
        $this->call(InvestorsTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RegistrationEntitiesTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(TauxCgpTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(TypeContratsTableSeeder::class);
        $this->call(TypeEntitiesTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(VoyagerThemesTableSeeder::class);
        $this->call(VoyagerThemeOptionsTableSeeder::class);
        $this->call(CgpsTableSeeder::class);
        $this->call(SncsTableSeeder::class);
        $this->call(MandatTableSeeder::class);
        $this->call(ResetSequenceTableSeeder::class);
        $this->call(bcktestintAddressesTableSeeder::class);
    }
}
