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

		$this->call('SettingTableSeeder');
		$this->call('PermissionTableSeeder');
		$this->call('GroupTableSeeder');
		$this->call('UserTableSeeder');
		$this->call('PjzbTableSeeder');
		$this->call('PjbzTableSeeder');
		$this->call('PfdjTableSeeder');
	}

}
