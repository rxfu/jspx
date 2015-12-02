<?php

use App\Models\Group;
use Illuminate\Database\Seeder;

class GroupTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_group CASCADE');

		$group = Group::create(array(
			'name' => '超级管理员',
		));
		$group->permissions()->sync([
			'user.add', 'user.edit', 'user.show', 'user.list', 'user.save', 'user.update', 'user.delete', 'user.reset', 'user.change', 'user.saveChange', 'user.profile',
			'group.add', 'group.edit', 'group.show', 'group.list', 'group.save', 'group.update', 'group.delete', 'group.grant', 'group.saveGrant',
			'permission.add', 'permission.edit', 'permission.show', 'permission.list', 'permission.save', 'permission.update', 'permission.delete',
			'pjzb.add', 'pjzb.edit', 'pjzb.show', 'pjzb.list', 'pjzb.save', 'pjzb.update', 'pjzb.delete',
			'pjbz.add', 'pjbz.edit', 'pjbz.show', 'pjbz.list', 'pjbz.save', 'pjbz.update', 'pjbz.delete',
			'pfdj.add', 'pfdj.edit', 'pfdj.show', 'pfdj.list', 'pfdj.save', 'pfdj.update', 'pfdj.delete',
			'pfjg.monitor', 'pfjg.statistics', 'pfjg.departmentStatistics', 'pfjg.majorStatistics', 'pfjg.exportMonitor', 'pfjg.exportStatistics', 'pfjg.exportDepartmentStatistics', 'pfjg.exportMajorStatistics',
		]);

		$group = Group::create(array(
			'name' => '年级辅导员',
		));
		$group->permissions()->sync(['user.change', 'user.saveChange', 'user.profile', 'pfjg.majorStatistics', 'pfjg.exportMajorStatistics']);

		$group = Group::create(array(
			'name' => '教学秘书',
		));
		$group->permissions()->sync(['user.change', 'user.saveChange', 'user.profile', 'pfjg.departmentStatistics', 'pfjg.exportDepartmentStatistics']);

		$group = Group::create(array(
			'name' => '学校领导',
		));
		$group->permissions()->sync(['user.change', 'user.saveChange', 'user.profile', 'pfjg.statistics', 'pfjg.exportStatistics']);
	}

}
