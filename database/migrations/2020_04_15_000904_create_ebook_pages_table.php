<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEbookPagesTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ebook_pages', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('ebook_id');
			$table->string('url', 200)->nullable();
			$table->string('title', 200)->nullable();
			$table->integer('position')->nullable();
			$table->text('caption')->nullable();
			$table->integer('created_by');
			$table->integer('updated_by')->nullable();
			$table->timestamp('created_at')->useCurrent();
			$table->timestamp('updated_at')->nullable();
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
		Schema::drop('ebook_pages');
	}
}
