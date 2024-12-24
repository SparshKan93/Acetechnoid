<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHindiPaperGeneratorsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('hindi_paper_generators', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('subject', 200)->nullable();
			$table->string('chapter', 200)->nullable();
			$table->integer('chapter_num')->nullable();
			$table->string('section', 100)->nullable();
			$table->string('que_type')->nullable();
			$table->mediumText('question')->nullable();
			$table->string('diagrams', 100)->nullable();
			$table->mediumText('answer')->nullable();
			$table->integer('company_id')->nullable();
			$table->integer('created_by');
			$table->integer('updated_by');
			$table->dateTime('created_at');
			$table->dateTime('updated_at');
			$table->softDeletes();
			$table->integer('ebook_id');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('hindi_paper_generators');
	}
}
