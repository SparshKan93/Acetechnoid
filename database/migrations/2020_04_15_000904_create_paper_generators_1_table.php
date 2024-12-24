<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperGenerators1Table extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paper_generators_1', function(Blueprint $table)
		{
			$table->integer('id');
			$table->string('subject', 100);
			$table->string('section', 100);
			$table->text('question');
			$table->string('diagrams', 100)->nullable();
			$table->text('opt_a')->nullable();
			$table->text('opt_b')->nullable();
			$table->text('opt_c')->nullable();
			$table->text('opt_d')->nullable();
			$table->text('answer')->nullable();
			$table->integer('company_id')->nullable();
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
		Schema::drop('paper_generators_1');
	}
}
