<?php

use Illuminate\Database\Seeder;

class InvestisSeeder extends Seeder
{
//    use Seedable;

//    protected $seedersPath = 'database/investis/seeds/';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $this->command->line("---");
        $this->command->comment('Seeding Investis Core');

        $this->call(AddressesTableSeeder::class);
        $this->call(BanksTableSeeder::class);
        $this->call(ContactAddressesTableSeeder::class);
        $this->call(ContactsTableSeeder::class);
        $this->call(IntermediariesTableSeeder::class);
        $this->call(NatureEntitiesTableSeeder::class);
        $this->call(LeaseholdersTableSeeder::class);
        $this->call(InvestorsTableSeeder::class);
        $this->call(RegistrationEntitiesTableSeeder::class);
        $this->call(SuppliersTableSeeder::class);
        $this->call(TauxCgpTableSeeder::class);
        $this->call(ReservationsTableSeeder::class);
        $this->call(TypeContratsTableSeeder::class);
        $this->call(TypeEntitiesTableSeeder::class);

        $this->call(CgpsTableSeeder::class);
        $this->call(SncsTableSeeder::class);
        $this->call(MandatTableSeeder::class);

        $this->call(ResetSequenceTableSeeder::class);

        $this->command->info(get_class($this).' Seeds');
        $this->command->line("---");
    }
}
