<?php

use App\TypeContrat;
use Illuminate\Database\Seeder;

class TypeEntitiesSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
      $names = [
        'Confort',
        'Serenité',
      ];

      foreach ($names as $name) {
        $typeEntity = TypeContrat::create([
          'name'=> $name
        ]);
      }


    }
}
