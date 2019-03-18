<?php

use Illuminate\Database\Seeder;

class CSVContactSeeder extends Seeder
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
        $this->command->comment('Seeding CSV Contact Core');


        $this->call(ResetSequenceTableSeeder::class);

        $this->command->info('CSV Contacts Seeds');
        $this->command->line("---");
    }
}
