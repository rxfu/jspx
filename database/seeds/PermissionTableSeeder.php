<?php

use App\Models\Permission;
use Illuminate\Database\Seeder;

class PermissionTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_permission CASCADE');

		Permission::create(array(
			'identify' => 'user.new',
			'name'     => '创建用户',
		));
		Permission::create(array(
			'identify' => 'user.edit',
			'name'     => '修改用户',
		));
		Permission::create(array(
			'identify' => 'user.show',
			'name'     => '查看用户',
		));
		Permission::create(array(
			'identify' => 'user.list',
			'name'     => '列出用户',
		));
		Permission::create(array(
			'identify' => 'user.save',
			'name'     => '保存用户',
		));
		Permission::create(array(
			'identify' => 'user.update',
			'name'     => '更新用户',
		));
		Permission::create(array(
			'identify' => 'user.delete',
			'name'     => '删除用户',
		));
		Permission::create(array(
			'identify' => 'user.reset',
			'name'     => '重置密码',
		));
		Permission::create(array(
			'identify' => 'user.change',
			'name'     => '修改密码',
		));
		Permission::create(array(
			'identify' => 'user.saveChange',
			'name'     => '保存修改密码',
		));
		Permission::create(array(
			'identify' => 'user.profile',
			'name'     => '查看个人资料',
		));

		Permission::create(array(
			'identify' => 'department.new',
			'name'     => '创建部门',
		));
		Permission::create(array(
			'identify' => 'department.edit',
			'name'     => '修改部门',
		));
		Permission::create(array(
			'identify' => 'department.show',
			'name'     => '查看部门',
		));
		Permission::create(array(
			'identify' => 'department.list',
			'name'     => '列出部门',
		));
		Permission::create(array(
			'identify' => 'department.save',
			'name'     => '保存部门',
		));
		Permission::create(array(
			'identify' => 'department.update',
			'name'     => '更新部门',
		));
		Permission::create(array(
			'identify' => 'department.delete',
			'name'     => '删除部门',
		));

		Permission::create(array(
			'identify' => 'group.new',
			'name'     => '创建组',
		));
		Permission::create(array(
			'identify' => 'group.edit',
			'name'     => '修改组',
		));
		Permission::create(array(
			'identify' => 'group.show',
			'name'     => '查看组',
		));
		Permission::create(array(
			'identify' => 'group.list',
			'name'     => '列出组',
		));
		Permission::create(array(
			'identify' => 'group.save',
			'name'     => '保存组',
		));
		Permission::create(array(
			'identify' => 'group.update',
			'name'     => '更新组',
		));
		Permission::create(array(
			'identify' => 'group.delete',
			'name'     => '删除组',
		));
		Permission::create(array(
			'identify' => 'group.grant',
			'name'     => '授予组权限',
		));
		Permission::create(array(
			'identify' => 'group.saveGrant',
			'name'     => '保存组权限',
		));

		Permission::create(array(
			'identify' => 'permission.new',
			'name'     => '创建权限',
		));
		Permission::create(array(
			'identify' => 'permission.edit',
			'name'     => '修改权限',
		));
		Permission::create(array(
			'identify' => 'permission.show',
			'name'     => '查看权限',
		));
		Permission::create(array(
			'identify' => 'permission.list',
			'name'     => '列出权限',
		));
		Permission::create(array(
			'identify' => 'permission.save',
			'name'     => '保存权限',
		));
		Permission::create(array(
			'identify' => 'permission.update',
			'name'     => '更新权限',
		));
		Permission::create(array(
			'identify' => 'permission.delete',
			'name'     => '删除权限',
		));

		Permission::create(array(
			'identify' => 'category.new',
			'name'     => '创建一级指标',
		));
		Permission::create(array(
			'identify' => 'category.edit',
			'name'     => '修改一级指标',
		));
		Permission::create(array(
			'identify' => 'category.show',
			'name'     => '查看一级指标',
		));
		Permission::create(array(
			'identify' => 'category.list',
			'name'     => '列出一级指标',
		));
		Permission::create(array(
			'identify' => 'category.save',
			'name'     => '保存一级指标',
		));
		Permission::create(array(
			'identify' => 'category.update',
			'name'     => '更新一级指标',
		));
		Permission::create(array(
			'identify' => 'category.delete',
			'name'     => '删除一级指标',
		));

		Permission::create(array(
			'identify' => 'index.new',
			'name'     => '创建二级指标',
		));
		Permission::create(array(
			'identify' => 'index.edit',
			'name'     => '修改二级指标',
		));
		Permission::create(array(
			'identify' => 'index.show',
			'name'     => '查看二级指标',
		));
		Permission::create(array(
			'identify' => 'index.list',
			'name'     => '列出二级指标',
		));
		Permission::create(array(
			'identify' => 'index.save',
			'name'     => '保存二级指标',
		));
		Permission::create(array(
			'identify' => 'index.update',
			'name'     => '更新二级指标',
		));
		Permission::create(array(
			'identify' => 'index.delete',
			'name'     => '删除二级指标',
		));
		Permission::create(array(
			'identify' => 'index.monitor',
			'name'     => '指标监控',
		));
		Permission::create(array(
			'identify' => 'index.statistics',
			'name'     => '查看指标统计表',
		));
		Permission::create(array(
			'identify' => 'index.compare',
			'name'     => '查看指标对比表',
		));
		Permission::create(array(
			'identify' => 'index.exportCompare',
			'name'     => '导出单指标对比数据',
		));
		Permission::create(array(
			'identify' => 'index.exportStatistics',
			'name'     => '导出统计数据',
		));
		Permission::create(array(
			'identify' => 'index.exportMonitor',
			'name'     => '导出监控数据',
		));
		Permission::create(array(
			'identify' => 'index.exportDepartmentStatistics',
			'name'     => '导出本学院统计数据',
		));
		Permission::create(array(
			'identify' => 'entry.list',
			'name'     => '录入指标',
		));
		Permission::create(array(
			'identify' => 'entry.update',
			'name'     => '保存录入数据',
		));
		Permission::create(array(
			'identify' => 'entry.upload',
			'name'     => '上传文件',
		));
		Permission::create(array(
			'identify' => 'entry.deleteFile',
			'name'     => '删除文件',
		));
		Permission::create(array(
			'identify' => 'entry.download',
			'name'     => '下载文件',
		));

		Permission::create(array(
			'identify' => 'audit.list',
			'name'     => '审核指标',
		));
		Permission::create(array(
			'identify' => 'audit.update',
			'name'     => '保存审核数据',
		));
		Permission::create(array(
			'identify' => 'audit.check',
			'name'     => '标记审核',
		));
		Permission::create(array(
			'identify' => 'audit.pass',
			'name'     => '通过审核',
		));

		Permission::create(array(
			'identify' => 'system.edit',
			'name'     => '设置系统参数',
		));
		Permission::create(array(
			'identify' => 'system.update',
			'name'     => '保存系统设置',
		));

		Permission::create(array(
			'identify' => 'setting.edit',
			'name'     => '设置采集参数',
		));
		Permission::create(array(
			'identify' => 'setting.update',
			'name'     => '保存采集设置',
		));
		Permission::create(array(
			'identify' => 'setting.init',
			'name'     => '初始化系统',
		));
		Permission::create(array(
			'identify' => 'setting.clean',
			'name'     => '清理系统',
		));
	}

}
