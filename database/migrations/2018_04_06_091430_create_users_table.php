<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUsersTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('users', function(Blueprint $table)
		{
			$table->increments('id');
			$table->string('company', 191)->unique();
			$table->string('nick_name', 30)->nullable();
			$table->string('apiuser', 191)->unique();
			$table->string('merchant_id', 12)->nullable()->unique('users_merchant_id_uindex');
			$table->string('wallet_id', 12)->nullable();
			$table->string('acc_number', 30)->nullable();
			$table->string('pass_code', 35)->nullable();
			$table->string('mcc', 12)->nullable();
			$table->string('email', 191);
			$table->string('password', 191)->default('y$kNl7EqlgSOxLizno7/rxOOV/gKtvW3bA3bOokCW.3jSANkJGPvZca');
			$table->string('contact', 191)->nullable()->default('Telephone');
			$table->string('address', 191)->nullable()->default('Address');
			$table->string('role', 191)->default('user');
			$table->integer('state')->default(0);
			$table->string('remember_token', 100)->nullable();
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
		Schema::drop('users');
	}

}
