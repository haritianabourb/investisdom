<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddStuckingMissingFieldToThatXxxxProjet extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('cgps', function (Blueprint $table) {
          // TODO create a juridical_form table and model
          // {
          //   "options" : {
          //     "EI": "EI",
          //     "EURL": "EURL",
          //     "SA": "SA",
          //     "SARL": "SARL",
          //     "SAS": "SAS"
          //   }
          // }
           $table->integer('juridical_registration')->nullable();
           // TODO create a activity table and model
           // {
           //   "options": {
           //     "CGP":"CGP",
           //     "CIF":"CIF",
           //     "Banque": "Banque",
           //     "Expert comptable" : "Expert comptable",
           //     "Avocat" : "Avocat"
           //   }
           // }
           $table->integer('activity')->nullable();
           // TODO make it automaticaly if not input
           $table->string('identifiant')->nullable();
           // TODO create a contact_status table and model
           // {
           //   "options":{
           //     "Commercial": "Commercial",
           //     "Conseiller": "Conseiller",
           //     "Directeur commercial":"Directeur commercial",
           //     "Fournisseur": "Fournisseur",
           //     "Gérant": "Gérant",
           //     "Informaticien" : "Informaticien",
           //     "Président" : "Président",
           //     "Vice-Président" :"Vice-Président",
           //     "Secrétaire" : "Secrétaire",
           //     "Service entreprise" : "Service entreprise",
           //     "Autre fonction" : "Autre fonction"
           //   }
           // }
           $table->string('contact_status')->nullable();

           // XXX File upload, sorry about this,
           $table->string('convention')->nullable();
           $table->string('status')->nullable();
           $table->string('kbis')->nullable();
           $table->string('rib')->nullable();
           $table->string('cni')->nullable();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('cgps', function (Blueprint $table) {
            //
        });
    }
}
