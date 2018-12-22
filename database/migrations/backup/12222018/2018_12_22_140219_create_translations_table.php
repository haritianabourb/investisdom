<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTranslationsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('translations', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('table_name');
			$table->string('column_name');
			$table->integer('foreign_key');
			$table->string('locale');
			$table->text('value');
			$table->timestamps();
			$table->unique(['table_name','column_name','foreign_key','locale']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('translations');
	}

}
