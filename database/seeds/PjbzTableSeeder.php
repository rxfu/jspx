<?php

use App\Models\Pjbz;
use Illuminate\Database\Seeder;

class PjbzTableSeeder extends Seeder {

	public function run() {
		DB::statement('TRUNCATE TABLE t_px_pjbz CASCADE');

		Pjbz::create(array(
			'xh'      => '1',
			'mc'      => '尊师重教，遵守大学生行为规范',
			'fz'      => 10,
			'px'      => 1,
			'pjzb_id' => 1,
		));
		Pjbz::create(array(
			'xh'      => '2',
			'mc'      => '课堂纪律好，无迟到、早退及旷课现象',
			'fz'      => 10,
			'px'      => 2,
			'pjzb_id' => 1,
		));
		Pjbz::create(array(
			'xh'      => '3',
			'mc'      => '学习目的明确，态度端正，积极参与教学活动',
			'fz'      => 10,
			'px'      => 3,
			'pjzb_id' => 1,
		));
		Pjbz::create(array(
			'xh'      => '4',
			'mc'      => '认真听课，勤记笔记，主动提问，积极答问',
			'fz'      => 10,
			'px'      => 4,
			'pjzb_id' => 2,
		));
		Pjbz::create(array(
			'xh'      => '5',
			'mc'      => '能认真组织与课程相关的学习活动与创新实践',
			'fz'      => 10,
			'px'      => 5,
			'pjzb_id' => 2,
		));
		Pjbz::create(array(
			'xh'      => '6',
			'mc'      => '作业完成情况好，无抄袭等现象',
			'fz'      => 10,
			'px'      => 6,
			'pjzb_id' => 2,
		));
		Pjbz::create(array(
			'xh'      => '7',
			'mc'      => '能根据教师指导，认真查阅读课程参考文献与资料',
			'fz'      => 10,
			'px'      => 7,
			'pjzb_id' => 2,
		));
		Pjbz::create(array(
			'xh'      => '8',
			'mc'      => '整体学习成绩优良，学习效果好',
			'fz'      => 10,
			'px'      => 8,
			'pjzb_id' => 3,
		));
		Pjbz::create(array(
			'xh'      => '9',
			'mc'      => '能熟练掌握本门课程的基本理论与技能',
			'fz'      => 10,
			'px'      => 9,
			'pjzb_id' => 3,
		));
		Pjbz::create(array(
			'xh'      => '10',
			'mc'      => '能较好地运用所学到的知识分析和解决问题',
			'fz'      => 10,
			'px'      => 10,
			'pjzb_id' => 3,
		));
	}

}
