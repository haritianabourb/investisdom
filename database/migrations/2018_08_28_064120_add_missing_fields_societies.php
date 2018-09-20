<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingFieldsSocieties extends Migration
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
        // 'sncs',
        'leaseholders',
        'investors',
        'cgps',
        'intermediaries',
        'suppliers'
      ];
      foreach ($entities as $e) {
        Schema::table($e, function (Blueprint $table) {
            $table->string('capital');
            $table->string('registration_city')->nullable();
            $table->string('ape_key')->nullable();
            $table->string('etablishment_code')->nullable();
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
      $entities = [
        // 'entities',
        // 'sncs',
        'leaseholders',
        // 'investors',
        'cgps',
        'intermediaries',
        'suppliers'
      ];
      foreach ($entities as $e) {
        Schema::table($e, function (Blueprint $table) {
            $table->dropColumn('capital');
            $table->dropColumn('registration_city');
            $table->dropColumn('ape_key');
            $table->dropColumn('etablishment_code');
        });
      }
    }
}
