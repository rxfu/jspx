<?php

use App\Models\UserGroup;
use Illuminate\Database\Seeder;

class UserGroupTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_user_group CASCADE');

		UserGroup::create(array(
			'user_id'  => 1,
			'group_id' => 1,
		));
		UserGroup::create(array(
			'user_id'  => 2,
			'group_id' => 2,
		));
		UserGroup::create(array(
			'user_id'  => 3,
			'group_id' => 3,
		));
		UserGroup::create(array(
			'user_id'  => 4,
			'group_id' => 4,
		));
	}

}
