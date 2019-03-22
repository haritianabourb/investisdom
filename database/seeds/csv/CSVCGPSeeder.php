<?php

use Illuminate\Database\Seeder;

class CSVCGPSeeder extends Seeder
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
        $this->command->comment('Seeding CSV CGP Core');

        (new \App\Imports\Legacy\CGPImport)
            ->withOutput($this->command->getOutput())
            ->import(storage_path("csv/cgps.csv"), null, \Maatwebsite\Excel\Excel::CSV);

        $this->command->info('CSV CGP Seeds');
        $this->command->line("---");
    }
}
