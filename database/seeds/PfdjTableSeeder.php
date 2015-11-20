<?php

use App\Models\Pfdj;
use Illuminate\Database\Seeder;

class PfdjTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_Pfdj CASCADE');

		Pfdj::create(array(
			'mc'   => '优秀',
			'zdfz' => 90,
			'zgfz' => 100,
		));
		Pfdj::create(array(
			'mc'   => '良好',
			'zdfz' => 80,
			'zgfz' => 89,
		));
		Pfdj::create(array(
			'mc'   => '中等',
			'zdfz' => 70,
			'zgfz' => 79,
		));
		Pfdj::create(array(
			'mc'   => '合格',
			'zdfz' => 60,
			'zgfz' => 69,
		));
		Pfdj::create(array(
			'mc'   => '不合格',
			'zdfz' => 0,
			'zgfz' => 59,
		));
	}

}
