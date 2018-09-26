<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTauxCgp extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('taux_cgp', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('cgps_id');
            $table->integer('type_contrat_id');
            $table->float('mois_1');
            $table->float('mois_2');
            $table->float('mois_3');
            $table->float('mois_4');
            $table->float('mois_5');
            $table->float('mois_6');
            $table->float('mois_7');
            $table->float('mois_8');
            $table->float('mois_9');
            $table->float('mois_10');
            $table->float('mois_11');
            $table->float('mois_12');
            $table->float('reduction_aj');
            $table->year('year');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('taux_cgp');
    }
}
