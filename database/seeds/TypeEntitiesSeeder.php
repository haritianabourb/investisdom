<?php

use Illuminate\Database\Seeder;
use App\TypeEntity;

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
        'Investis Dom',
        'SNC',
        'CGP',
        'Investisseur',
        'Apporteur Affaire',
        'Fournisseur',
        'Locataire',
        'Banque',
      ];

      foreach ($names as $name) {
        $typeEntity = TypeEntity::create([
          'name'=> $name
        ]);
      }


    }
}
