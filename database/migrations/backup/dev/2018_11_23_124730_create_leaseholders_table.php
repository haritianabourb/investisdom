<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateLeaseholdersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('leaseholders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('registered_key');
			$table->string('address_1');
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->dateTime('started_at')->nullable();
			$table->timestamps();
			$table->string('capital');
			$table->string('registration_city')->nullable();
			$table->string('type_immatriculation')->nullable();
			$table->string('forme_juridique')->nullable();
			$table->string('activity')->nullable();
			$table->string('depend_groupeco')->nullable();
			$table->string('type_operation')->nullable();
			$table->string('regime_impot')->nullable();
			$table->string('site_web')->nullable();
			$table->string('contact_id')->nullable();
			$table->string('name_bank')->nullable();
			$table->string('agence_bank')->nullable();
			$table->string('iban_bank')->nullable();
			$table->string('bic_bank')->nullable();
			$table->string('numero_compte')->nullable();
			$table->string('insee_upload')->nullable();
			$table->string('kbis_upload')->nullable();
			$table->string('attest_regul_soc_upload')->nullable();
			$table->string('regul_soc_ant_upload')->nullable();
			$table->string('attest_regul_fisc_upload')->nullable();
			$table->string('regul_fisc_ant_upload')->nullable();
			$table->string('depot_greffe_bilan_upload')->nullable();
			$table->string('depot_greffe_ant_upload')->nullable();
			$table->string('liasse_fisc_upload')->nullable();
			$table->string('liasse_fisc_ant_upload')->nullable();
			$table->string('avis_impot_upload')->nullable();
			$table->string('avis_impot_ant_upload')->nullable();
			$table->string('statut_ent_upload')->nullable();
			$table->string('cni_upload')->nullable();
			$table->string('rib_upload')->nullable();
			$table->string('extrait_compte_upload')->nullable();
			$table->string('decouvert_autorise_upload')->nullable();
			$table->string('aut_admin_exercer_upload')->nullable();
			$table->string('situation_patrimonial_dir_upload')->nullable();
			$table->string('permis_conduire_upload')->nullable();
			$table->string('assurance_resp_civile_upload')->nullable();
			$table->string('documents_divers_upload')->nullable();
			$table->string('vp_upload')->nullable();
			$table->boolean('exo_tva')->nullable();
			$table->string('key_ape')->nullable();
			$table->dateTime('fin_exercice')->nullable();
			$table->string('effectif_company')->nullable();
			$table->string('bank_code')->nullable();
			$table->string('bank_guichet')->nullable();
			$table->string('bank_clerib')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('leaseholders');
	}

}
