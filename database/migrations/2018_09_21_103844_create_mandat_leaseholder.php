<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateMandatLeaseholder extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mandat', function (Blueprint $table) {
            $table->increments('id');
            $table->string('identifiant');
            // Locataire
            $table->integer('leaseholder_id');

             // Referencement proposition commerciale
            // DONE [SIMPLIFIE, STANDARD]
            $table->string('nature_mandat');
            // [48, 60]
            $table->integer('duree_mandat');
            // XXX [199_UNDECIES_B, CREDIT_IMPOT]
            $table->string('type_defiscalisation');
            // TODO type taux reduction d'import (obligatoire!!!!)
            $table->integer('ri_amount_type_id');
            // XXX [0 => NON, 1 => SIMPLE, 2 => MOTIVE]
            $table->string('renouvellement');
            // XXX [LOAN, CASH]
            $table->string('complement_financement');
            // XXX [0=>NON_SOUMIS, 1=>SOUMIS]
            $table->boolean('agrement');
            $table->boolean('groupement');
            $table->boolean('referencement_valid');

            // Fournisseur
            // TODO territorialite du Fournisseur
            $table->integer('supplier_id')->nullable();

            // Materiel
            // description
            $table->integer('segment_materiel')->nullable();
            $table->boolean('emission_co2_materiel')->nullable();
            $table->text('divers_materiel')->nullable();
            $table->string('immatriculation_materiel')->nullable();
            $table->text('description_materiel')->nullable();
            $table->boolean('materiel_valid');
            // prix du materiel
            $table->float('montant_ht')->default(0);
            $table->float('carte_grise')->default(0);
            $table->float('fraix_defiscalisable')->default(0);
            $table->float('fraix_non_defiscalisable')->default(0);
            $table->float('tva_npr')->default(0);
            //tva perçue
            $table->float('tva_investissement')->default(0);
            $table->boolean('is_remplacement')->default(false);
            $table->float('montant_remplacement')->default(0);
            $table->boolean('is_assurance')->default(false);
            $table->boolean('is_reprise_fournisseur')->default(false);
            $table->float('montant_reprise_fournisseur')->default(0);
            $table->date('prevision_livraison')->nullable();

            $table->float('apport_locataire')->default(0);
            $table->float('apport_snc')->default(0);
            $table->boolean('is_subvention')->default(false);
            // XXX [FEDER, FEADER, ADEME, AUTRE]
            $table->string('type_subvention')->default('');
            $table->float('montant_frais_tenue_compte')->default(75);
            // TODO banque
            $table->integer('nombre_periode')->default(1);
            // XXX [MENSUELLE, ANNUEL]
            $table->string('periodicite')->default('MENSUELLE');
            $table->integer('duree_pret')->default(60);
            $table->float('taux_pret')->default(5.6);
            $table->integer('duree_pret_periode')->default(60);
            $table->boolean('is_assurance_invalidite')->default(false);

            // XXX scheduler
            $table->json('resultats');
            $table->json('van_paiement');
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
        Schema::dropIfExists('mandat');
    }
}
