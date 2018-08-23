<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateContact extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('contacts', function (Blueprint $table) {
            $table->increments('id');
            $table->string("fistname");
            $table->string("lastname");
            $table->string("address_1");
            $table->string("address_2")->nullable();
            $table->integer("postal_code");
            $table->text("city");
            $table->timestamp("born_on")->nullable();
            $table->text("born_in")->nullable();
            $table->text("born_in_postal")->nullable();
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
        Schema::dropIfExists('contact');
    }
}
