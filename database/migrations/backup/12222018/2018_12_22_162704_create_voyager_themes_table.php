<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateVoyagerThemesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('voyager_themes', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->string('folder')->unique();
			$table->smallInteger('active')->default(0);
			$table->string('version')->default(0);
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
		Schema::drop('voyager_themes');
	}

}
