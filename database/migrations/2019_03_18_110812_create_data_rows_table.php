<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateDataRowsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('data_rows', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('data_type_id')->index('data_rows_data_type_id_foreign');
			$table->string('field');
			$table->string('type');
			$table->string('display_name');
			$table->smallInteger('required')->default(0);
			$table->smallInteger('browse')->default(1);
			$table->smallInteger('read')->default(1);
			$table->smallInteger('edit')->default(1);
			$table->smallInteger('add')->default(1);
			$table->smallInteger('delete')->default(1);
			$table->text('details')->nullable();
			$table->integer('order')->default(1);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('data_rows');
	}

}
