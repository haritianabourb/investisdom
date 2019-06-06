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
        $reservations = Reservation::all()->filter(function($item){
            return \Carbon\Carbon::createFromFormat("Y-m-d", $item->mandat_reserved_at)->year >= date('Y');
        });

        foreach ($reservations as $reservation) {
            $reservation->save();
        }
    }
}
