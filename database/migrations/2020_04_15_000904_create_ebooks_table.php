<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbooksTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ebooks', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('name', 100)->nullable();
			$table->string('publication', 100)->nullable();
			$table->string('series', 100)->nullable();
			$table->string('author', 100)->nullable();
			$table->string('standard', 100)->nullable();
			$table->string('subject', 100)->nullable();
			$table->string('ref_id', 100)->nullable();
			$table->string('uid', 100)->nullable();
			$table->decimal('cost', 10)->nullable();
			$table->text('key_link')->nullable();
			$table->string('key_code')->nullable();
			$table->string('file_name', 100)->nullable();
			$table->text('remark')->nullable();
			$table->integer('group_id')->nullable();
			$table->integer('company_id')->nullable();
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
		Schema::drop('ebooks');
	}
}
