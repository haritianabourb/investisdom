<?php

use Illuminate\Database\Seeder;

class CSVInvestorsSeeder extends Seeder
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
        $this->command->comment('Seeding CSV Investors Core');

        (new \App\Imports\Legacy\InvestorImport)
            ->withOutput($this->command->getOutput())
            ->import(storage_path("csv/investors.csv"), null, \Maatwebsite\Excel\Excel::CSV);

        $this->command->info('CSV Investors Seeds');
        $this->command->line("---");
    }
}
