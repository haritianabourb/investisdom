<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTauxCgpTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('taux_cgp', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('cgps_id');
			$table->integer('type_contrat_id');
			$table->float('mois_1', 10, 0);
			$table->float('mois_2', 10, 0);
			$table->float('mois_3', 10, 0);
			$table->float('mois_4', 10, 0);
			$table->float('mois_5', 10, 0);
			$table->float('mois_6', 10, 0);
			$table->float('mois_7', 10, 0);
			$table->float('mois_8', 10, 0);
			$table->float('mois_9', 10, 0);
			$table->float('mois_10', 10, 0);
			$table->float('mois_11', 10, 0);
			$table->float('mois_12', 10, 0);
			$table->float('reduction_aj', 10, 0);
			$table->smallInteger('year');
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
		Schema::drop('taux_cgp');
	}

}
