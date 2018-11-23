<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSuppliersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('suppliers', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('address_1');
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->timestamps();
			$table->string('capital');
			$table->string('siren')->nullable();
			$table->string('purpose_creation')->nullable();
			$table->string('dom_agency')->nullable();
			$table->string('juridical_registration')->nullable();
			$table->date('end_exercise')->nullable();
			$table->string('activity')->nullable();
			$table->string('rib', 191)->nullable();
			$table->string('kbis', 191)->nullable();
			$table->string('bilan', 191)->nullable();
			$table->string('divers_documents', 191)->nullable();
			$table->string('preloan_convention', 191)->nullable();
			$table->string('tresorery_convention_file', 191)->nullable();
			$table->string('free_scale_convention_file', 191)->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_agency')->nullable();
			$table->string('iban')->nullable();
			$table->string('bic')->nullable();
			$table->string('bank_account_number')->nullable();
			$table->smallInteger('pre_loan')->nullable();
			$table->smallInteger('tresorery_convention')->nullable();
			$table->smallInteger('free_scale_convention')->nullable();
			$table->smallInteger('programme_adherent')->nullable();
			$table->string('type_registration')->nullable();
			$table->string('date_registration')->nullable();
			$table->integer('contact_id')->nullable();
			$table->string('lieu_immat')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('suppliers');
	}

}
