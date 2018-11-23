<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateMandatTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('mandat', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('identifiant', 191);
			$table->integer('leaseholder_id');
			$table->string('nature_mandat', 191);
			$table->string('duree_mandat');
			$table->string('type_defiscalisation', 191);
			$table->decimal('ri_amount_type_id', 10, 0);
			$table->string('renouvellement', 191);
			$table->string('complement_financement', 191);
			$table->boolean('agrement');
			$table->boolean('referencement_valid');
			$table->integer('supplier_id')->nullable();
			$table->integer('segment_materiel')->nullable();
			$table->boolean('emission_co2_materiel')->nullable();
			$table->text('divers_materiel')->nullable();
			$table->string('immatriculation_materiel', 191)->nullable();
			$table->text('description_materiel')->nullable();
			$table->boolean('materiel_valid');
			$table->float('montant_ht', 10, 0)->default(0);
			$table->float('carte_grise', 10, 0)->default(0);
			$table->float('fraix_defiscalisable', 10, 0)->default(0);
			$table->float('fraix_non_defiscalisable', 10, 0)->default(0);
			$table->float('tva_npr', 10, 0)->default(0);
			$table->float('tva_investissement', 10, 0)->default(0);
			$table->boolean('is_remplacement')->default(0);
			$table->float('montant_remplacement', 10, 0)->nullable()->default(0);
			$table->boolean('is_assurance')->default(0);
			$table->boolean('is_reprise_fournisseur')->default(0);
			$table->float('montant_reprise_fournisseur', 10, 0)->nullable()->default(0);
			$table->date('prevision_livraison')->nullable();
			$table->float('apport_locataire', 10, 0)->default(0);
			$table->float('apport_snc', 10, 0)->default(0);
			$table->boolean('is_subvention')->default(0);
			$table->string('type_subvention', 191)->nullable()->default('');
			$table->float('montant_frais_tenue_compte', 10, 0)->default(75);
			$table->integer('nombre_periode')->default(1);
			$table->string('periodicite', 191)->default('MENSUELLE');
			$table->integer('duree_pret')->default(60);
			$table->float('taux_pret', 10, 0)->default(5.59999999999999964);
			$table->integer('duree_pret_periode')->default(60);
			$table->boolean('is_assurance_invalidite')->default(0);
			$table->text('resultats');
			$table->text('van_paiement');
			$table->timestamps();
			$table->string('genre_vehicle')->nullable();
			$table->string('marque_vehicle')->nullable();
			$table->string('type_vehicle')->nullable();
			$table->decimal('montant_subvention', 10, 0)->nullable();
			$table->string('other_subvention')->nullable();
			$table->string('motivation')->nullable();
			$table->string('autre_duree_mandat')->nullable();
			$table->string('ape_locataire')->nullable();
			$table->string('marque_divers')->nullable();
			$table->string('type_divers')->nullable();
			$table->string('bank')->nullable();
			$table->string('montant_compl_fin')->nullable();
			$table->string('taux_retro')->nullable();
			$table->string('montant_echeance')->nullable();
			$table->string('ouverture_compte_bank')->nullable();
			$table->string('tva_loyer')->nullable();
			$table->string('fact_loyer')->nullable();
			$table->string('frais_enreg')->nullable();
			$table->string('methode_payment')->nullable();
			$table->string('hono_jur')->nullable();
			$table->string('remise_jur')->nullable();
			$table->string('cfe_tax')->nullable();
			$table->string('cfe_remise')->nullable();
			$table->string('base_defiscalisable')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('mandat');
	}

}
