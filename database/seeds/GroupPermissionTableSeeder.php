<?php

use App\Models\GroupPermission;
use App\Models\Permission;
use Illuminate\Database\Seeder;

class GroupPermissionTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_group_permission CASCADE');

		for ($i = 1; $i <= 70; ++$i) {
			GroupPermission::create(array(
				'group_id'      => 1,
				'permission_id' => $i,
			));
		}

		$permissions = Permission::where('identify', 'like', 'entry.%')->get();
		foreach ($permissions as $permission) {
			GroupPermission::create(array(
				'group_id'      => 2,
				'permission_id' => $permission->id,
			));
		}
		$permissions = Permission::where('identify', 'like', 'audit.%')->get();
		foreach ($permissions as $permission) {
			GroupPermission::create(array(
				'group_id'      => 3,
				'permission_id' => $permission->id,
			));
		}

		for ($i = 2; $i <= 4; ++$i) {
			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'user.change')->first()->id,
			));
			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'user.saveChange')->first()->id,
			));
			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'user.profile')->first()->id,
			));

			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'index.statistics')->first()->id,
			));
			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'index.exportDepartmentStatistics')->first()->id,
			));
			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'index.compare')->first()->id,
			));
			GroupPermission::create(array(
				'group_id'      => $i,
				'permission_id' => Permission::where('identify', 'index.exportCompare')->first()->id,
			));
		}
	}

}
