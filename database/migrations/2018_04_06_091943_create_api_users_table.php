<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateApiUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('api_users', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->string('user_name', 100)->unique('user_name');
			$table->string('api_key', 100);
			$table->timestamp('created_on')->default(DB::raw('CURRENT_TIMESTAMP'));
			$table->integer('status')->default(1);
			$table->string('actions', 30);
			$table->float('amount_limit', 10, 0)->default(500);
			$table->primary(['id','user_name']);
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('api_users');
	}

}
