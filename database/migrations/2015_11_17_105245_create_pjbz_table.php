<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePjbzTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('pjbz', function (Blueprint $table) {
			$table->increments('id');
			$table->string('xh', 20)->nullable();
			$table->string('mc', 60);
			$table->integer('fz')->default(0);
			$table->text('ms')->nullable();
			$table->integer('px')->default(0);
			$table->integer('pjzb_id');
			$table->string('zt', 1)->default('1');
			$table->timestamps();

			$table->foreign('pjzb_id')->references('id')->on('pjzb')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('pjbz');
	}

}
