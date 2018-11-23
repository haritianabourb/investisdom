<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePagesTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('pages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('author_id');
			$table->string('title');
			$table->text('excerpt')->nullable();
			$table->text('body')->nullable();
			$table->string('image')->nullable();
			$table->string('slug')->unique();
			$table->text('meta_description')->nullable();
			$table->text('meta_keywords')->nullable();
			$table->text('status')->default('INACTIVE');
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
		Schema::drop('pages');
	}

}
