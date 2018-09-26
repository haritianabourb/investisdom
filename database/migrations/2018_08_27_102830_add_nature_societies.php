<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddNatureSocieties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {

      $entities = [
        // 'entities',
        'sncs',
        'leaseholders',
        'investors',
        'cgps',
        'intermediaries',
        'suppliers'
      ];
      foreach ($entities as $e) {
        Schema::table($e, function (Blueprint $table) {
            $table->integer("nature_entities_id");
        });
      }
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
      // $entities = [
      //   // 'entities',
      //   'sncs',
      //   'leaseholders',
      //   'investors',
      //   'cgps',
      //   'intermediaries',
      //   'suppliers'
      // ];
      // foreach ($entities as $e) {
      //   Schema::table('entities', function (Blueprint $table) {
      //       $table->dropColumn('nature_entities_id');
      //   });
      // }
    }
}
