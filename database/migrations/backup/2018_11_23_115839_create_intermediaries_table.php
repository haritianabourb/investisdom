<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateIntermediariesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('intermediaries', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->string('registered_key')->nullable();
			$table->string('address_1');
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->dateTime('started_at')->nullable();
			$table->timestamps();
			$table->string('capital')->nullable();
			$table->string('registration_city')->nullable();
			$table->string('forme_juridique')->nullable();
			$table->integer('contact_id');
			$table->string('type_immat')->nullable();
			$table->string('activity')->nullable();
			$table->string('date_creation')->nullable();
			$table->string('date_contrat')->nullable();
			$table->string('duree_contrat')->nullable();
			$table->string('tacite_reconduction')->nullable();
			$table->string('habilitation_mandat')->nullable();
			$table->string('remuneration')->nullable();
			$table->string('habilitation_dossier')->nullable();
			$table->string('taux_comm')->nullable();
			$table->string('mandat_sign')->nullable();
			$table->string('kbis')->nullable();
			$table->string('cni')->nullable();
			$table->string('rib')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_agency')->nullable();
			$table->string('bank_iban')->nullable();
			$table->string('bank_bic')->nullable();
			$table->string('bank_account')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('intermediaries');
	}

}
