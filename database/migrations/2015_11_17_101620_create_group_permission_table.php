<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateGroupPermissionTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up() {
		Schema::create('px_group_permission', function (Blueprint $table) {
			$table->integer('group_id');
			$table->string('permission_id', 60);

			$table->primary(['group_id', 'permission_id']);
			$table->foreign('group_id')->references('id')->on('px_group')->onDelete('cascade')->onUpdate('cascade');
			$table->foreign('permission_id')->references('id')->on('px_permission')->onDelete('cascade')->onUpdate('cascade');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down() {
		Schema::drop('px_group_permission');
	}

}
