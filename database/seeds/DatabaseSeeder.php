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
        $this->command->info('Seeding Main Database');
        $this->command->line("---");

        // Application skeleton
        $this->call(BreadSeeder::class);
        // Application Users
        $this->call(UserSeeder::class);
        // Specific
        $this->call(InvestisSeeder::class);

        $this->call(ResetSequenceTableSeeder::class);

        $this->command->line("---");
        $this->command->comment('Investis Dom Seeded');
    }

    /**
     *
     * Do not remove this part!!!
     * Use of ISeed to generate some seeder
     * this is know in order to show seeding table configuration
     * Remove this figure of instability of Database
     *
     **/

    /*
        #iseed_start
        $this->call(AddressesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(ContactAddressesTableSeeder::class);
        $this->call(DataTypesTableSeeder::class);
        $this->call(CgpsTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(IntermediariesTableSeeder::class);
        $this->call(InvestorsTableSeeder::class);
        $this->call(CategoriesTableSeeder::class);
        $this->call(DataRowsTableSeeder::class);
        $this->call(LeaseholdersTableSeeder::class);
        $this->call(MandatTableSeeder::class);
        $this->call(MenusTableSeeder::class);
        $this->call(MenuItemsTableSeeder::class);
        $this->call(NatureEntitiesTableSeeder::class);
        $this->call(PagesTableSeeder::class);
        $this->call(PasswordResetsTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(RegistrationEntitiesTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(SettingsTableSeeder::class);
        $this->call(SncsTableSeeder::class);
        $this->call(PermissionsTableSeeder::class);
        $this->call(PermissionRoleTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(TauxCgpTableSeeder::class);
        $this->call(TranslationsTableSeeder::class);
        $this->call(TypeContratsTableSeeder::class);
        $this->call(TypeEntitiesTableSeeder::class);
        $this->call(VoyagerThemeOptionsTableSeeder::class);
        $this->call(UserRolesTableSeeder::class);
        $this->call(UsersTableSeeder::class);
        $this->call(RolesTableSeeder::class);
        $this->call(VoyagerThemesTableSeeder::class);
        #iseed_end
    */





}
