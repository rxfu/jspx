<?php

use App\Models\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_user CASCADE');

		User::create(array(
			'username'      => 'admin',
			'email'         => 'admin@test.com',
			'password'      => Hash::make('admin888'),
			'realname'      => '超级管理员',
			'department_id' => '28',
			'activated'     => '1',
		));
		User::create(array(
			'username'      => 'tester01',
			'email'         => 'tester01@test.com',
			'password'      => Hash::make('tester'),
			'realname'      => '年级辅导员',
			'department_id' => '01',
			'activated'     => '0',
		));
		User::create(array(
			'username'      => 'tester02',
			'email'         => 'tester02@test.com',
			'password'      => Hash::make('tester'),
			'realname'      => '教学秘书',
			'department_id' => '01',
			'activated'     => '0',
		));
		User::create(array(
			'username'      => 'tester03',
			'email'         => 'tester03@test.com',
			'password'      => Hash::make('tester'),
			'realname'      => '普通管理员',
			'department_id' => '20',
			'activated'     => '0',
		));
	}

}
