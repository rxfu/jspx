<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreatePfjgTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('px_pfjg', function (Blueprint $table) {
			$table->string('jsgh', 10);
			$table->string('kcxh', 12);
			$table->string('kch', 8);
			$table->integer('pjbz_id');
			$table->string('kkxy', 2);
			$table->string('zy', 7);
			$table->string('nj', 4);
			$table->string('nd', 4);
			$table->string('xq', 1);
			$table->decimal('fz', 5, 2)->default(0);
			$table->integer('pfdj_id');
			$table->timestamps();

			$table->primary(['jsgh', 'kcxh', 'pjbz_id', 'nd', 'xq']);
			$table->foreign('pjbz_id')->references('id')->on('px_pjbz')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('pfdj_id')->references('id')->on('px_pfdj')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('px_pfjg');
	}

}
