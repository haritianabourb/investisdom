<?php

use App\Reservation;
use Illuminate\Database\Seeder;


class UpdatePartsSeeder_2019_05_09 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $reservations = Reservation::all();

        foreach ($reservations as $reservation) {
            $reservation->save();
        }
    }
}
