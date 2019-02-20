<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePostsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('posts', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('author_id');
			$table->integer('category_id')->nullable();
			$table->string('title');
			$table->string('seo_title')->nullable();
			$table->text('excerpt')->nullable();
			$table->text('body');
			$table->string('image')->nullable();
			$table->string('slug')->unique();
			$table->text('meta_description')->nullable();
			$table->text('meta_keywords')->nullable();
			$table->text('status')->default('DRAFT');
			$table->boolean('featured')->default(0);
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
		Schema::drop('posts');
	}

}
