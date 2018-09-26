<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateSocieties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        // Schema::create('entities', function (Blueprint $table) {
        //     $table->increments('id');
        //     $table->string('name');
        //     $table->string('registered_key');
        //     $table->string("address_1");
        //     $table->string("address_2")->nullable();
        //     $table->integer("postal_code")->nullable();
        //     $table->text("city")->nullable();
        //     // $table->boolean('have_tva');
        //     // $table->boolean('is_holding');
        //     $table->timestamp('started_at')->nullable();
        //     $table->timestamps();
        // });

        Schema::create('sncs', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code")->nullable();
            $table->text("city")->nullable();
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at')->nullable();
            $table->timestamps();
        });

        Schema::create('leaseholders', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code")->nullable();
            $table->text("city")->nullable();
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at')->nullable();
            // {
            //   "options" : {
            //     "industrie":"Industrie"
            //     "artisanat":"Artisanat"
            //     "tourisme":"Tourisme"
            //     "énergie":"Energie"
            //     "tp, transport, construction":"TP, Transport, Construction"
            //     "logement social":"Logement social"
            //     "indifférent":"Indifférent"
            //   }
            // }
            $table->timestamps();
        });

        Schema::create('investors', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code")->nullable();
            $table->text("city")->nullable();
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at')->nullable();
            $table->integer('cgp_id')->nullable();
            $table->timestamps();
        });

        Schema::create('cgps', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code")->nullable();
            $table->text("city")->nullable();
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at')->nullable();
            $table->timestamps();
        });

        Schema::create('intermediaries', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code")->nullable();
            $table->text("city")->nullable();
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at')->nullable();
            $table->timestamps();
        });

        Schema::create('suppliers', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code")->nullable();
            $table->text("city")->nullable();
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at')->nullable();
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
        Schema::dropIfExists('entities');
        Schema::dropIfExists('sncs');
        Schema::dropIfExists('leaseholders');
        Schema::dropIfExists('investors');
        Schema::dropIfExists('suppliers');
        Schema::dropIfExists('intermediaries');
        Schema::dropIfExists('cgps');
    }
}
