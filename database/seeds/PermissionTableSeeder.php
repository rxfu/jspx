<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_permission CASCADE');

		Permission::create(array(
			'id'   => 'user.add',
			'name' => '创建用户',
		));
		Permission::create(array(
			'id'   => 'user.edit',
			'name' => '修改用户',
		));
		Permission::create(array(
			'id'   => 'user.show',
			'name' => '查看用户',
		));
		Permission::create(array(
			'id'   => 'user.list',
			'name' => '列出用户',
		));
		Permission::create(array(
			'id'   => 'user.save',
			'name' => '保存用户',
		));
		Permission::create(array(
			'id'   => 'user.update',
			'name' => '更新用户',
		));
		Permission::create(array(
			'id'   => 'user.delete',
			'name' => '删除用户',
		));
		Permission::create(array(
			'id'   => 'user.reset',
			'name' => '重置密码',
		));
		Permission::create(array(
			'id'   => 'user.change',
			'name' => '修改密码',
		));
		Permission::create(array(
			'id'   => 'user.saveChange',
			'name' => '保存修改密码',
		));
		Permission::create(array(
			'id'   => 'user.profile',
			'name' => '查看个人资料',
		));

		Permission::create(array(
			'id'   => 'group.add',
			'name' => '创建组',
		));
		Permission::create(array(
			'id'   => 'group.edit',
			'name' => '修改组',
		));
		Permission::create(array(
			'id'   => 'group.show',
			'name' => '查看组',
		));
		Permission::create(array(
			'id'   => 'group.list',
			'name' => '列出组',
		));
		Permission::create(array(
			'id'   => 'group.save',
			'name' => '保存组',
		));
		Permission::create(array(
			'id'   => 'group.update',
			'name' => '更新组',
		));
		Permission::create(array(
			'id'   => 'group.delete',
			'name' => '删除组',
		));
		Permission::create(array(
			'id'   => 'group.grant',
			'name' => '授予组权限',
		));
		Permission::create(array(
			'id'   => 'group.saveGrant',
			'name' => '保存组权限',
		));

		Permission::create(array(
			'id'   => 'permission.add',
			'name' => '创建权限',
		));
		Permission::create(array(
			'id'   => 'permission.edit',
			'name' => '修改权限',
		));
		Permission::create(array(
			'id'   => 'permission.show',
			'name' => '查看权限',
		));
		Permission::create(array(
			'id'   => 'permission.list',
			'name' => '列出权限',
		));
		Permission::create(array(
			'id'   => 'permission.save',
			'name' => '保存权限',
		));
		Permission::create(array(
			'id'   => 'permission.update',
			'name' => '更新权限',
		));
		Permission::create(array(
			'id'   => 'permission.delete',
			'name' => '删除权限',
		));

		Permission::create(array(
			'id'   => 'pjzb.add',
			'name' => '创建评价指标',
		));
		Permission::create(array(
			'id'   => 'pjzb.edit',
			'name' => '修改评价指标',
		));
		Permission::create(array(
			'id'   => 'pjzb.show',
			'name' => '查看评价指标',
		));
		Permission::create(array(
			'id'   => 'pjzb.list',
			'name' => '列出评价指标',
		));
		Permission::create(array(
			'id'   => 'pjzb.save',
			'name' => '保存评价指标',
		));
		Permission::create(array(
			'id'   => 'pjzb.update',
			'name' => '更新评价指标',
		));
		Permission::create(array(
			'id'   => 'pjzb.delete',
			'name' => '删除评价指标',
		));

		Permission::create(array(
			'id'   => 'pjbz.add',
			'name' => '创建评价标准',
		));
		Permission::create(array(
			'id'   => 'pjbz.edit',
			'name' => '修改评价标准',
		));
		Permission::create(array(
			'id'   => 'pjbz.show',
			'name' => '查看评价标准',
		));
		Permission::create(array(
			'id'   => 'pjbz.list',
			'name' => '列出评价标准',
		));
		Permission::create(array(
			'id'   => 'pjbz.save',
			'name' => '保存评价标准',
		));
		Permission::create(array(
			'id'   => 'pjbz.update',
			'name' => '更新评价标准',
		));
		Permission::create(array(
			'id'   => 'pjbz.delete',
			'name' => '删除评价标准',
		));

		Permission::create(array(
			'id'   => 'pfdj.add',
			'name' => '创建评分等级',
		));
		Permission::create(array(
			'id'   => 'pfdj.edit',
			'name' => '修改评分等级',
		));
		Permission::create(array(
			'id'   => 'pfdj.show',
			'name' => '查看评分等级',
		));
		Permission::create(array(
			'id'   => 'pfdj.list',
			'name' => '列出评分等级',
		));
		Permission::create(array(
			'id'   => 'pfdj.save',
			'name' => '保存评分等级',
		));
		Permission::create(array(
			'id'   => 'pfdj.update',
			'name' => '更新评分等级',
		));
		Permission::create(array(
			'id'   => 'pfdj.delete',
			'name' => '删除评分等级',
		));

		Permission::create(array(
			'id'   => 'pfjg.monitor',
			'name' => '评价监控',
		));
		Permission::create(array(
			'id'   => 'pfjg.statistics',
			'name' => '查看评价统计表',
		));
		Permission::create(array(
			'id'   => 'pfjg.compare',
			'name' => '查看评价对比表',
		));
		Permission::create(array(
			'id'   => 'pfjg.exportMonitor',
			'name' => '导出监控数据',
		));
		Permission::create(array(
			'id'   => 'pfjg.exportStatistics',
			'name' => '导出统计数据',
		));
		Permission::create(array(
			'id'   => 'pfjg.exportDepartmentStatistics',
			'name' => '导出本学院统计数据',
		));
		Permission::create(array(
			'id'   => 'pfjg.exportMajorStatistics',
			'name' => '导出本学院本年级本专业统计数据',
		));
	}

}
