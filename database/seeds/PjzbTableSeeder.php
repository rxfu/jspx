<?php

use App\Models\Pjzb;
use Illuminate\Database\Seeder;

class PjzbTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_pjzb CASCADE');

		Pjzb::create(array(
			'xh' => '一',
			'mc' => '学习态度',
			'px' => 1,
		));
		Pjzb::create(array(
			'xh' => '二',
			'mc' => '学习过程',
			'px' => 2,
		));
		Pjzb::create(array(
			'xh' => '三',
			'mc' => '学习效果',
			'px' => 3,
		));
	}

}
