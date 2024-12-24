<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePaperGenerators4Table extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('paper_generators_4', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ebook_id');
			$table->string('subject', 200)->nullable();
			$table->string('section', 100)->nullable();
			$table->integer('chapter_num')->nullable();
			$table->string('chapter', 200)->nullable();
			$table->integer('que_type')->nullable();
			$table->text('question')->nullable();
			$table->string('diagrams', 100)->nullable();
			$table->text('answer')->nullable();
			$table->integer('company_id')->nullable()->default(1);
			$table->integer('created_by')->default(1);
			$table->integer('updated_by')->default(1);
			$table->dateTime('created_at')->useCurrent();
			$table->dateTime('updated_at')->useCurrent();
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
		Schema::drop('paper_generators_4');
	}
}
