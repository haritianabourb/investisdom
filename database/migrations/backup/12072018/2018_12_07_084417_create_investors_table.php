<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateInvestorsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('investors', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name')->nullable();
			$table->string('registered_key')->nullable();
			$table->string('address_1');
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->dateTime('started_at')->nullable();
			$table->integer('cgp_id')->nullable();
			$table->timestamps();
			$table->integer('type_entities_id');
			$table->integer('nature_entities_id');
			$table->integer('registration_entities_id')->nullable();
			$table->string('capital')->nullable();
			$table->string('registration_city')->nullable();
			$table->string('cgp_attached')->nullable();
			$table->string('contact_attached')->nullable();
			$table->string('civilite')->nullable();
			$table->string('prenom_invest')->nullable();
			$table->string('name_invest')->nullable();
			$table->string('birth_date')->nullable();
			$table->string('birth_location')->nullable();
			$table->string('birth_cp')->nullable();
			$table->string('name_jeunefille_invest')->nullable();
			$table->string('email_invest')->nullable();
			$table->string('country_invest')->nullable();
			$table->string('fixe_invest')->nullable();
			$table->string('gsm_invest')->nullable();
			$table->string('fax_invest')->nullable();
			$table->string('regime_mat_invest')->nullable();
			$table->string('father_invest')->nullable();
			$table->string('madre_invest')->nullable();
			$table->string('profession_invest')->nullable();
			$table->string('prenom_conjoint')->nullable();
			$table->string('nom_conjoint')->nullable();
			$table->string('nom_jeunefille_conjoint')->nullable();
			$table->string('birth_conjoint')->nullable();
			$table->string('cni')->nullable();
			$table->string('justificatif_adress')->nullable();
			$table->string('kbis')->nullable();
			$table->string('avis_impot')->nullable();
			$table->string('rib')->nullable();
			$table->string('check_resa')->nullable();
			$table->string('check_frais')->nullable();
			$table->string('bank_name')->nullable();
			$table->string('bank_agency')->nullable();
			$table->string('bank_code')->nullable();
			$table->string('bank_guichet')->nullable();
			$table->string('bank_compte')->nullable();
			$table->string('bank_cle_rib')->nullable();
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
		Schema::drop('investors');
	}

}
