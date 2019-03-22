<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDatatypeContactsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('datatype_contacts', function(Blueprint $table)
		{
			$table->integer('contact_id')->index();
			$table->integer('datatype_id')->index();
			$table->integer('data_id')->index();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('datatype_contacts');
	}

}
