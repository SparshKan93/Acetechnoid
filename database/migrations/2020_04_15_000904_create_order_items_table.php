<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderItemsTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('order_items', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('parent_id')->nullable();
			$table->string('item_name', 200)->nullable();
			$table->integer('quantity')->nullable();
			$table->decimal('rate', 15)->nullable();
			$table->decimal('amount', 15)->nullable();
			$table->string('barcode')->nullable();
			$table->decimal('disc_per', 15)->nullable();
			$table->decimal('disc_amt', 15)->nullable();
			$table->date('expiry_date')->nullable();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('order_items');
	}
}
