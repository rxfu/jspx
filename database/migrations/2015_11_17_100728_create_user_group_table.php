<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateUserGroupTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('px_user_group', function (Blueprint $table) {
			$table->integer('user_id');
			$table->integer('group_id');

			$table->primary(['user_id', 'group_id']);
			$table->foreign('user_id')->references('id')->on('px_user')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('group_id')->references('id')->on('px_group')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('px_user_group');
	}

}
