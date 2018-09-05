<?php

use Illuminate\Database\Seeder;
use App\NatureEntity;

class NatureEntitiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $names = [
        'Individuel',
        'Société',
      ];

      foreach ($names as $name) {
        $typeEntity = NatureEntity::create([
          'name'=> $name
        ]);
      }


    }
}
