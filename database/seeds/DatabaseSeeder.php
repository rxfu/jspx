<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run() {
		Model::unguard();

		$this->call('UserTableSeeder');
		$this->call('GroupTableSeeder');
		$this->call('UserGroupTableSeeder');
		$this->call('PermissionTableSeeder');
		$this->call('GroupPermissionTableSeeder');
		$this->call('PjzbTableSeeder');
		$this->call('PjbzTableSeeder');
	}

}
