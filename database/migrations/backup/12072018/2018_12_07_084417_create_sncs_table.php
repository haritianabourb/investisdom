<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSncsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('sncs', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('registered_key')->nullable();
			$table->string('address_1')->nullable();
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->dateTime('started_at')->nullable();
			$table->timestamps();
			$table->integer('type_entities_id');
			$table->integer('registration_entities_id')->nullable()->default(1);
			$table->float('total_invest', 10, 0)->default('0');
			$table->float('tax_rate', 10, 0)->default('0');
			$table->float('total_amount_ri', 10, 0)->default('0');
			$table->float('total_net_intake', 10, 0)->default('0');
			$table->float('total_hono', 10, 0)->default('0');
			$table->float('total_comm_cgp', 10, 0)->default('0');
			$table->float('total_comm_app', 10, 0)->default('0');
			$table->float('total_get', 10, 0)->default('0');
			$table->float('investors_tax_reservation', 10, 0)->default('0');
			$table->float('investors_tax_proposition', 10, 0)->default('0');
			$table->string('gerant_id')->nullable();
			$table->string('associe_first')->nullable();
			$table->string('associe_second')->nullable();
			$table->string('part_asso_first')->nullable();
			$table->string('part_asso_second')->nullable();
			$table->string('nbre_part_total')->nullable();
			$table->string('capital')->nullable();
			$table->string('forme_juridique')->nullable();
			$table->string('versement_capital')->nullable();
			$table->date('date_crea')->nullable();
			$table->string('type_snc')->nullable();
			$table->string('status')->default('IN_STOCK');
			$table->string('nic')->nullable();
			$table->string('statuts')->nullable();
			$table->string('agrement')->nullable();
			$table->string('attest_domiciliation')->nullable();
			$table->string('kbis')->nullable();
			$table->string('rib')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_agency')->nullable();
			$table->string('bank_code')->nullable();
			$table->string('bank_guichet')->nullable();
			$table->string('bank_compte')->nullable();
			$table->string('bank_rib')->nullable();
			$table->string('bank_iban')->nullable();
			$table->string('bank_bic')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('sncs');
	}

}
