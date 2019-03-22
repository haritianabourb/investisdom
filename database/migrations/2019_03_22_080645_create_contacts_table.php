<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('contacts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('fistname');
			$table->string('lastname');
			$table->string('address_1')->nullable();
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->date('born_on')->nullable();
			$table->text('born_in')->nullable();
			$table->text('born_in_postal')->nullable();
			$table->timestamps();
			$table->string('civilite')->nullable();
			$table->string('function')->nullable();
			$table->string('tel_fixe')->nullable();
			$table->string('gsm');
			$table->string('fax')->nullable();
			$table->string('email');
			$table->integer('user_id')->nullable();
			$table->text('slug')->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('contacts');
	}

}
