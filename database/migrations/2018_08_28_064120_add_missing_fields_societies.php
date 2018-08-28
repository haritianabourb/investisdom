<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingFieldsSocieties extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('entities', function (Blueprint $table) {
            $table->string('capital');
            $table->string('registration_city');
            $table->string('ape_key');
            $table->string('etablishment_code');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('entities', function (Blueprint $table) {
            $table->dropColumn('capital');
            $table->dropColumn('registration_city');
            $table->dropColumn('ape_key');
            $table->dropColumn('etablishment_code');
        });
    }
}
