<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePjzbTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('px_pjzb', function (Blueprint $table) {
			$table->increments('id');
			$table->string('xh', 20)->nullable();
			$table->string('mc', 60);
			$table->text('ms')->nullable();
			$table->integer('px')->default(0);
			$table->timestamps();
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('px_pjzb');
	}

}
