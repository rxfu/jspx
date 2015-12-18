<?php

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_setting CASCADE');

		Setting::create([
			'is_open' => 1,
		]);
	}

}
