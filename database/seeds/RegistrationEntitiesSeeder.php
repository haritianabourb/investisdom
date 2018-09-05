<?php

use Illuminate\Database\Seeder;
use App\RegistrationEntity;

class RegistrationEntitiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $names = [
        'CMA',
        'RC',
        'Exploitant Agricole',
      ];

      foreach ($names as $name) {
        $typeEntity = RegistrationEntity::create([
          'name'=> $name
        ]);
      }


    }
}
