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
        Schema::create('contrats', function (Blueprint $table) {
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
