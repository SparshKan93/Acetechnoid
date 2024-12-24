<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateQuestionMastersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('question_masters', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ebook_id')->nullable();
			$table->text('chapter_name')->nullable();
			$table->string('question_type')->nullable();
			$table->integer('question_type_id')->nullable();
			$table->text('question')->nullable();
			$table->text('answer');
			$table->text('question_img')->nullable();
			$table->string('chapter_num')->nullable();
			$table->integer('created_by')->nullable();
			$table->integer('updated_by')->nullable();
			$table->timestamps();
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
		Schema::drop('question_masters');
	}
}
