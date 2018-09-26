<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContracts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('reservations', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifiant');
            $table->float('montant_reduction');
            $table->float('commission_cgp');
            $table->date('mandat_start_at');
            $table->date('mandat_finnish_at');
            $table->integer('type_contrats_id');
            $table->integer('cgps_id');
            $table->integer('investors_id');
            $table->integer('nbr_snc');
            $table->boolean('assistance_juridique');
            $table->string('secteurs_activite');
            $table->float('taux_rentabilite')->nullable();
            $table->float('apport')->nullable();
            $table->float('montant_commission_cgp')->nullable();
            $table->float('gain_brut')->nullable();
            $table->float('taux_reservation')->nullable();

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
        Schema::dropIfExists('contrats');
    }
}
