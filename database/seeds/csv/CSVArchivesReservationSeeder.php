<?php

use App\Reservation;
use Illuminate\Database\Seeder;

class CSVArchivesReservationSeeder extends Seeder
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
        Reservation::truncate();
        $this->command->line("---");
        $this->command->comment('Seeding Reservation CGP Core');
        Reservation::unsetEventDispatcher();

        (new \App\Imports\Legacy\ArchivesReservationImport)
            ->withOutput($this->command->getOutput())
            ->import(storage_path("csv/archives_reservations.csv"), null, \Maatwebsite\Excel\Excel::CSV);

        $this->command->info('CSV ReservationsSeeds');
        $this->command->line("---");
    }
}
