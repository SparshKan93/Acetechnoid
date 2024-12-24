<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSeriesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('series', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('name');
			$table->text('description')->nullable();
			$table->smallInteger('status')->default(1);
			$table->integer('created_at');
			$table->integer('updated_at');
			$table->dateTime('created_by');
			$table->dateTime('updated_by');
			$table->dateTime('deleted_at');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('series');
	}
}
