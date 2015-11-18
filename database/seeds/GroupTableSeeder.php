<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_group CASCADE');

		Group::create(array(
			'name' => '超级管理员',
		));
		Group::create(array(
			'name' => '年级辅导员',
		));
		Group::create(array(
			'name' => '教学秘书',
		));
		Group::create(array(
			'name' => '学校领导',
		));
	}

}
