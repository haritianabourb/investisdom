<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFinancialPartsToSncs extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('sncs', function (Blueprint $table) {
          $table->float("total_invest")->default(0);
          $table->float("tax_rate")->default(0);
          $table->float("total_amount_ri")->default(0);
          $table->float("total_net_intake")->default(0);
          $table->float("total_hono")->default(0);
          $table->float("total_comm_cgp")->default(0);
          $table->float("total_comm_app")->default(0);
          $table->float("total_get")->default(0);
          $table->float("investors_tax_reservation")->default(0);
          $table->float("investors_tax_proposition")->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('sncs', function (Blueprint $table) {
            //

            $table->dropColumn("total_invest");
            $table->dropColumn("tax_rate");
            $table->dropColumn("total_amount_ri");
            $table->dropColumn("total_net_intake");
            $table->dropColumn("total_hono");
            $table->dropColumn("total_comm_cgp");
            $table->dropColumn("total_comm_app");
            $table->dropColumn("total_get");
            $table->dropColumn("investors_tax_reservation");
            $table->dropColumn("investors_tax_proposition");
        });
    }
}
