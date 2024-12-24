<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionTypesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_types', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('name');
			$table->string('marks', 100)->nullable();
			$table->text('description')->nullable();
			$table->integer('company_id')->nullable();
			$table->integer('status');
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
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
		Schema::drop('question_types');
	}
}
