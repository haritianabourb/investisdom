<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('role_id')->nullable()->index('users_role_id_foreign');
			$table->string('name');
			$table->string('email')->unique();
			$table->string('avatar')->nullable()->default('users/default.png');
			$table->string('password');
			$table->string('remember_token', 100)->nullable();
			$table->text('settings')->nullable();
			$table->timestamps();
			$table->dateTime('activated_at')->nullable();
			$table->softDeletes();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('users');
	}

}
