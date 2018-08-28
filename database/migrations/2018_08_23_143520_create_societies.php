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
        Schema::create('entities', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('registered_key');
            $table->string("address_1");
            $table->string("address_2");
            $table->integer("postal_code");
            $table->text("city");
            // $table->boolean('have_tva');
            // $table->boolean('is_holding');
            $table->timestamp('started_at');
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
    }
}
