<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateBanksTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('banks', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('capital');
			$table->string('address_1');
			$table->string('address_2')->nullable();
			$table->integer('postal_code')->nullable();
			$table->text('city')->nullable();
			$table->integer('registration_entities_id')->nullable();
			$table->string('registered_key');
			$table->string('registration_city')->nullable();
			$table->dateTime('registered_at')->nullable();
			$table->integer('entities_id');
			$table->smallInteger('default');
			$table->integer('represantant_id');
			$table->integer('contacts_id');
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
		Schema::drop('banks');
	}

}
