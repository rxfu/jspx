<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('user', function (Blueprint $table) {
			$table->increments('id');
			$table->string('username', 60)->unique();
			$table->string('email', 255)->unique()->nullable();
			$table->string('password', 255);
			$table->string('realname')->nullable();
			$table->string('department_id', 30);
			$table->string('activated')->default('0');
			$table->rememberToken();
			$table->timestamp('login_at')->nullable();
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('user');
	}

}
