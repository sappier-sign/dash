<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTtmTerminalsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('ttm_terminals', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('t_id', 8)->nullable()->default('null');
			$table->string('merchant_id')->index('terminals_merchant_id_index');
			$table->string('imei')->nullable();
			$table->string('pin');
			$table->boolean('signed_up')->default(0);
			$table->timestamps();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('ttm_terminals');
	}

}
