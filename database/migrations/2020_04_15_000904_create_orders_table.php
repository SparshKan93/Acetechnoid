<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrdersTable extends Migration
{
	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('orders', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->integer('company_id')->nullable();
			$table->string('invoice_no')->nullable();
			$table->date('entry_date')->nullable();
			$table->integer('client_id')->nullable();
			$table->string('ref')->nullable();
			$table->decimal('sub_total', 15)->nullable();
			$table->decimal('discount', 15)->nullable();
			$table->decimal('tax', 15)->nullable();
			$table->decimal('total', 15)->nullable();
			$table->string('sale_type');
			$table->decimal('amount_paid', 15)->nullable();
			$table->decimal('amount_deu', 15)->nullable();
			$table->string('remarks')->nullable();
			$table->string('unique_no')->nullable();
			$table->string('voucher_no')->nullable();
			$table->string('destination', 100)->nullable();
			$table->integer('term')->nullable();
			$table->string('sales_agent')->nullable();
			$table->integer('created_by')->nullable();
			$table->timestamps();
			$table->integer('updated_by')->nullable();
			$table->tinyInteger('status')->default(1)->comment('1 - Active, 0 - Deleted');
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
		Schema::drop('orders');
	}
}
