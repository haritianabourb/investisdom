<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCgpsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('cgps', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('registered_key');
			$table->string('address_1');
			$table->string('address_2')->nullable();
			$table->string('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->dateTime('started_at')->nullable();
			$table->timestamps();
			$table->string('capital');
			$table->string('registration_city')->nullable();
			$table->string('ape_key')->nullable();
			$table->string('etablishment_code')->nullable();
			$table->integer('contact_id')->nullable();
			$table->string('juridical_registration')->nullable();
			$table->string('activity')->nullable();
			$table->string('identifiant')->nullable();
			$table->string('contact_status')->nullable();
			$table->string('convention')->nullable();
			$table->string('status')->nullable();
			$table->string('kbis')->nullable();
			$table->string('rib')->nullable();
			$table->string('cni')->nullable();
			$table->string('type_registration')->nullable();
			$table->string('assurances')->nullable();
			$table->string('assurances_anterieures')->nullable();
			$table->string('remuneration')->nullable();
			$table->string('remu_fixe')->nullable();
			$table->string('network')->nullable();
			$table->string('network_yes')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cgps');
	}

}
