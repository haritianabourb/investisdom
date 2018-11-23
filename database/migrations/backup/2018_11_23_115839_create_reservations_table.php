<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateReservationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('reservations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('identifiant')->nullable();
			$table->float('montant_reduction', 10, 0);
			$table->float('commission_cgp', 10, 0);
			$table->date('mandat_start_at');
			$table->date('mandat_finnish_at');
			$table->integer('type_contrats_id');
			$table->integer('cgps_id');
			$table->integer('investors_id');
			$table->integer('nbr_snc');
			$table->smallInteger('assistance_juridique');
			$table->string('secteurs_activite');
			$table->float('taux_rentabilite', 10, 0)->nullable();
			$table->float('apport', 10, 0)->nullable();
			$table->float('montant_commission_cgp', 10, 0)->nullable();
			$table->float('gain_brut', 10, 0)->nullable();
			$table->float('taux_reservation', 10, 0)->nullable();
			$table->timestamps();
			$table->string('type_aj')->nullable();
			$table->string('taux_ponctuel')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('reservations');
	}

}
