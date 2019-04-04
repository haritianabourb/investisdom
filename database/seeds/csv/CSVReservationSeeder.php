<?php

use Illuminate\Database\Seeder;

class CSVReservationSeeder extends Seeder
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
        $this->command->comment('Seeding Reservation CGP Core');

        (new \App\Imports\Legacy\ReservationImport)
            ->withOutput($this->command->getOutput())
            ->import(storage_path("csv/reservations_2019.csv"), null, \Maatwebsite\Excel\Excel::CSV);

        $this->command->info('CSV ReservationsSeeds');
        $this->command->line("---");
    }
}
