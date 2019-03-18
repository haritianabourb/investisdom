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

        (new \App\Imports\Legacy\ContactImport)
            ->withOutput($this->command->getOutput())
            ->import(storage_path("csv/contacts_cgp.csv"), null, \Maatwebsite\Excel\Excel::CSV);

        $this->command->info('CSV Contacts Seeds');
        $this->command->line("---");
    }
}
