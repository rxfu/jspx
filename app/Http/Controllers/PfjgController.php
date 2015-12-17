<?php namespace App\Http\Controllers;

use App\Models\Pfdj;
use App\Models\System;
use App\Models\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class PfjgController extends AdminController {

	protected function retrieveMonitorResults($year, $term) {
		return DB::table('pk_jxrw')
			->join('pk_js', 'pk_jxrw.jsgh', '=', 'pk_js.jsgh')
			->join('xt_department', 'pk_js.xy', '=', 'xt_department.dw')
			->leftJoin('px_pfjg', function ($join) {
				$join->on('px_pfjg.jsgh', '=', 'pk_jxrw.jsgh')
					->on('px_pfjg.kcxh', '=', 'pk_jxrw.kcxh')
					->on('px_pfjg.nd', '=', 'pk_jxrw.nd')
					->on('px_pfjg.xq', '=', 'pk_jxrw.xq');
			})
			->where('pk_jxrw.nd', '=', $year)
			->where('pk_jxrw.xq', '=', $term)
			->select('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_jxrw.kcxh', 'pk_js.jsgh', 'pk_js.xm as jsxm', 'pk_js.xy as xyh', 'xt_department.mc as xymc')
			->addSelect(DB::raw('count(t_px_pfjg.pjbz_id) as count'))
			->groupBy('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_jxrw.kcxh', 'pk_js.jsgh', 'pk_js.xm', 'pk_js.xy', 'xt_department.mc')
			->orderBy('pk_js.jsgh', 'asc')
			->orderBy('count', 'asc')
			->get();
	}

	protected function retrieveStatisticsResults($year, $term) {
		return DB::table('pk_jxrw')
			->join('jx_kc', 'pk_jxrw.kch', '=', 'jx_kc.kch')
			->join('pk_kczy', function ($join) {
				$join->on('pk_jxrw.nd', '=', 'pk_kczy.nd')
					->on('pk_jxrw.xq', '=', 'pk_kczy.xq')
					->on('pk_jxrw.kcxh', '=', 'pk_kczy.kcxh');
			})
			->join('jx_zy', 'pk_kczy.zy', '=', 'jx_zy.zy')
			->join('xt_department', 'pk_kczy.kkxy', '=', 'xt_department.dw')
			->leftJoin('px_pfjg', function ($join) {
				$join->on('px_pfjg.jsgh', '=', 'pk_jxrw.jsgh')
					->on('px_pfjg.kcxh', '=', 'pk_jxrw.kcxh')
					->on('px_pfjg.nd', '=', 'pk_jxrw.nd')
					->on('px_pfjg.xq', '=', 'pk_jxrw.xq');
			})
			->where('pk_jxrw.nd', '=', $year)
			->where('pk_jxrw.xq', '=', $term)
			->where(function ($query) {
				if (!Auth::user()->groups[0]->permissions->contains('pfjg.statistics')) {
					if (!Auth::user()->groups[0]->permissions->contains('pfjg.departmentStatistics')) {
						if (!Auth::user()->groups[0]->permissions->contains('pfjg.majorStatistics')) {
							return redirect()->guest('auth/login');
						} else {
							$query->where('pk_kczy.kkxy', '=', Auth::user()->department_id)
								->where('pk_kczy.zy', '=', Auth::user()->major_id)
								->where('pk_kczy.nj', '=', Auth::user()->grade);
						}
					} else {
						$query->where('pk_kczy.kkxy', '=', Auth::user()->department_id);
					}
				}
			})
			->select('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_jxrw.kcxh', 'jx_kc.kcmc', 'pk_kczy.nj', 'pk_kczy.zy', 'jx_zy.mc as zymc', 'pk_kczy.kkxy', 'xt_department.mc as xymc')
			->addSelect(DB::raw('sum(t_px_pfjg.fz) / count(t_px_pfjg.jsgh) * count(distinct(t_px_pfjg.pjbz_id)) as total'))
			->groupBy('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_jxrw.kcxh', 'jx_kc.kcmc', 'pk_kczy.nj', 'pk_kczy.zy', 'jx_zy.mc', 'pk_kczy.kkxy', 'xt_department.mc')
			->orderBy('pk_jxrw.kcxh')
			->get();
	}

	protected function retrieveStatisticsResultsByMajor($year, $term) {
		return DB::table('pk_jxrw')
			->join('pk_kczy', function ($join) {
				$join->on('pk_jxrw.kcxh', '=', 'pk_kczy.kcxh')
					->on('pk_jxrw.nd', '=', 'pk_kczy.nd')
					->on('pk_jxrw.xq', '=', 'pk_kczy.xq');
			})
			->join('jx_zy', 'pk_kczy.zy', '=', 'jx_zy.zy')
			->leftJoin('px_pfjg', function ($join) {
				$join->on('px_pfjg.nd', '=', 'pk_jxrw.nd')
					->on('px_pfjg.xq', '=', 'px_pfjg.xq')
					->on('px_pfjg.zy', '=', 'pk_kczy.zy')
					->on('px_pfjg.nj', '=', 'pk_kczy.nj');
			})
			->where('pk_jxrw.nd', '=', $year)
			->where('pk_jxrw.xq', '=', $term)
			->where(function ($query) {
				if (!Auth::user()->groups[0]->permissions->contains('pfjg.statistics')) {
					if (!Auth::user()->groups[0]->permissions->contains('pfjg.departmentStatistics')) {
						if (!Auth::user()->groups[0]->permissions->contains('pfjg.majorStatistics')) {
							return redirect()->guest('auth/login');
						} else {
							$query->where('pk_kczy.kkxy', '=', Auth::user()->department_id)
								->where('pk_kczy.zy', '=', Auth::user()->major_id)
								->where('pk_kczy.nj', '=', Auth::user()->grade);
						}
					} else {
						$query->where('pk_kczy.kkxy', '=', Auth::user()->department_id);
					}
				}
			})
			->select('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_kczy.nj', 'pk_kczy.zy', 'jx_zy.mc as zymc')
			->addSelect(DB::raw('sum(t_px_pfjg.fz) / count(t_px_pfjg.kcxh) * count(distinct(t_px_pfjg.pjbz_id)) as total'))
			->groupBy('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_kczy.nj', 'pk_kczy.zy', 'jx_zy.mc')
			->orderBy('pk_kczy.zy')
			->get();
	}

	public function getMonitor() {
		$year    = System::find('CJ_WEB_ND')->value;
		$term    = System::find('CJ_WEB_XQ')->value;
		$title   = $year . '~' . ($year + 1) . '年度' . Term::find($term)->mc . '学期评价监控';
		$results = $this->retrieveMonitorResults($year, $term);

		return view('pfjg.monitor', ['title' => $title, 'results' => $results]);
	}

	public function getStatistics($year, $term) {
		if (!Auth::user()->groups[0]->permissions->contains('pfjg.statistics')) {
			if (!Auth::user()->groups[0]->permissions->contains('pfjg.departmentStatistics')) {
				if (!Auth::user()->groups[0]->permissions->contains('pfjg.majorStatistics')) {
					return redirect()->guest('auth/login');
				} else {
					$college = isset(Auth::user()->department) ? Auth::user()->department->mc : null;
					$major   = isset(Auth::user()->major) ? Auth::user()->major->mc : null;
					$grade   = isset(Auth::user()->grade) ? Auth::user()->grade : null;
				}
			} else {
				$college = Auth::user()->department->mc;
			}
		}
		$title = $year . '~' . ($year + 1) . '年度' . Term::find($term)->mc . '学期';
		$title .= (!isset($college) || is_null($college)) ? '' : $college;
		$title .= (!isset($major) || is_null($major)) ? '' : $major . '专业';
		$title .= (!isset($grade) || is_null($grade)) ? '' : $grade . '级';
		$title .= '教师评学统计表';
		$results = $this->retrieveStatisticsResults($year, $term);

		foreach ($results as &$result) {
			if (isset($result->total)) {
				$grade = Pfdj::where('zdfz', '<=', $result->total)
					->where('zgfz', '>=', $result->total)
					->first();
				$result->djmc = $grade->mc;
			}
		}

		return view('pfjg.statistics', ['title' => $title, 'year' => $year, 'term' => $term, 'results' => $results]);
	}

	public function getStatisticsByMajor($year, $term) {
		if (!Auth::user()->groups[0]->permissions->contains('pfjg.statistics')) {
			if (!Auth::user()->groups[0]->permissions->contains('pfjg.departmentStatistics')) {
				if (!Auth::user()->groups[0]->permissions->contains('pfjg.majorStatistics')) {
					return redirect()->guest('auth/login');
				} else {
					$college = isset(Auth::user()->department) ? Auth::user()->department->mc : null;
					$major   = isset(Auth::user()->major) ? Auth::user()->major->mc : null;
					$grade   = isset(Auth::user()->grade) ? Auth::user()->grade : null;
				}
			} else {
				$college = Auth::user()->department->mc;
			}
		}
		$title = $year . '~' . ($year + 1) . '年度' . Term::find($term)->mc . '学期';
		$title .= (!isset($college) || is_null($college)) ? '' : $college;
		$title .= (!isset($major) || is_null($major)) ? '' : $major . '专业';
		$title .= (!isset($grade) || is_null($grade)) ? '' : $grade . '级';
		$title .= '教师评学分专业统计表';
		$results = $this->retrieveStatisticsResultsByMajor($year, $term);

		return view('pfjg.statistics-major', ['title' => $title, 'year' => $year, 'term' => $term, 'results' => $results]);
	}

	public function getExportMonitor() {
		$year      = System::find('CJ_WEB_ND')->value;
		$term      = System::find('CJ_WEB_XQ')->value;
		$results   = $this->retrieveMonitorResults($year, $term);
		$sheetName = $year . '~' . ($year + 1) . '学年度' . Term::find($term)->mc . '学期教师评学监控表';

		$datas[0] = ['教师工号', '教师姓名', '所在学院', '课程序号', '已评数量'];
		foreach ($results as $result) {
			$row   = array();
			$row[] = $result->jsgh;
			$row[] = $result->jsxm;
			$row[] = $result->xymc;
			$row[] = $result->kcxh;
			$row[] = $result->count;

			$datas[] = $row;
		}

		Excel::create('export', function ($excel) use ($sheetName, $datas) {
			$excel->setTitle('Guangxi Normal University Teacher Evaludate Students Monitor Report');
			$excel->setCreator('Dean')->setCompany('Guangxi Normal University');

			$excel->sheet($sheetName, function ($sheet) use ($datas) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($datas, null, 'A1', false, false);
			});
		})->export('xls');
	}

	public function getExportStatistics($year, $term) {
		$results   = $this->retrieveStatisticsResults($year, $term);
		$sheetName = $year . '~' . ($year + 1) . '学年度' . Term::find($term)->mc . '学期教师评学统计表';

		$datas[0] = ['课程序号', '课程名称', '开课学院', '专业', '年级', '总分'];
		foreach ($results as $result) {
			$row   = array();
			$row[] = $result->kcxh;
			$row[] = $result->kcmc;
			$row[] = $result->xymc;
			$row[] = $result->zymc;
			$row[] = $result->nj;
			$row[] = number_format($result->total, 2);

			$datas[] = $row;
		}

		Excel::create('export', function ($excel) use ($sheetName, $datas) {
			$excel->setTitle('Guangxi Normal University Teacher Evaludate Students Statistics Report');
			$excel->setCreator('Dean')->setCompany('Guangxi Normal University');

			$excel->sheet($sheetName, function ($sheet) use ($datas) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($datas, null, 'A1', false, false);
			});
		})->export('xls');
	}

	public function getExportStatisticsByMajor($year, $term) {
		$results   = $this->retrieveStatisticsResultsByMajor($year, $term);
		$sheetName = $year . '~' . ($year + 1) . '学年度' . Term::find($term)->mc . '学期教师评学分专业统计表';

		$datas[0] = ['专业', '年级', '总分'];
		foreach ($results as $result) {
			$row   = array();
			$row[] = $result->zymc;
			$row[] = $result->nj;
			$row[] = number_format($result->total, 2);

			$datas[] = $row;
		}

		Excel::create('export', function ($excel) use ($sheetName, $datas) {
			$excel->setTitle('Guangxi Normal University Teacher Evaludate Students Statistics Report');
			$excel->setCreator('Dean')->setCompany('Guangxi Normal University');

			$excel->sheet($sheetName, function ($sheet) use ($datas) {
				$sheet->setOrientation('landscape');
				$sheet->fromArray($datas, null, 'A1', false, false);
			});
		})->export('xls');
	}

}
