<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class UpdateReservationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('reservations', function (Blueprint $table) {
            $table->string('part')->nullable();
            $table->string('cr')->nullable();
            $table->string('rc')->nullable();
            $table->string('mr')->nullable();
            $table->string('res')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('reservations', function($table) {
            $table->dropColumn('part');
            $table->dropColumn('cr');
            $table->dropColumn('rc');
            $table->dropColumn('mr');
            $table->dropColumn('res');
        });
    }
}
