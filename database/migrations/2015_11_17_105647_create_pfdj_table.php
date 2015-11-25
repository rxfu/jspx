<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePfdjTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('px_pfdj', function (Blueprint $table) {
			$table->increments('id');
			$table->string('mc', 20)->unique();
			$table->integer('zdfz')->default(0);
			$table->integer('zgfz')->default(0);
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('px_pfdj');
	}

}
