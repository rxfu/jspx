<?php namespace App\Http\Controllers;

use App\Models\System;
use App\Models\Term;
use Illuminate\Support\Facades\DB;

class PfjgController extends AdminController {

	public function getMonitor() {
		$year = System::find('CJ_WEB_ND')->value;
		$term = System::find('CJ_WEB_XQ')->value;

		$results = DB::table('pk_jxrw')
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
			->select('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_jxrw.kcxh', 'pk_js.jsgh', 'pk_js.xm', 'pk_js.xy as xyh', 'xt_department.mc as xymc')
			->addSelect(DB::raw('count(t_px_pfjg.pjbz_id) as count'))
			->groupBy('pk_jxrw.nd', 'pk_jxrw.xq', 'pk_jxrw.kcxh', 'pk_js.jsgh', 'pk_js.xm', 'pk_js.xy', 'xt_department.mc', 'px_pfjg.pjbz_id')
			->get();

		return view('pfjg.monitor', ['title' => $year . '~' . ($year + 1) . '年度' . Term::find($term)->mc . '学期' . '评价监控', 'results' => $results]);
	}

}
