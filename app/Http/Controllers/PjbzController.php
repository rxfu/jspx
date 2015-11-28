<?php namespace App\Http\Controllers;

use App\Models\Pjbz;
use App\Models\Pjzb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PjbzController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {
		$pjbzs = Pjbz::orderBy('px', 'asc')->get();

		return view('pjbz/list', ['title' => '评价标准列表', 'pjbzs' => $pjbzs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getAdd() {
		$pjzbs = Pjzb::orderBy('mc', 'asc')->get();

		return view('pjbz/add', ['title' => '添加评价标准', 'pjzbs' => $pjzbs]);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave(Request $request) {
		$input = $request->all();

		$rules = [
			'mc' => 'required|unique:px_pjbz',
			'fz' => 'numeric',
			'px' => 'numeric',
		];

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$pjbz          = new Pjbz;
			$pjbz->xh      = $input['xh'];
			$pjbz->mc      = $input['mc'];
			$pjbz->fz      = $input['fz'];
			$pjbz->ms      = nl2br($input['ms']);
			$pjbz->px      = $input['px'];
			$pjbz->pjzb_id = $input['pjzb'];
			$pjbz->zt      = $input['zt'];

			if ($pjbz->save()) {
				return url('pjbz/list')->with('status', '评价标准 ' . $pjbz->mc . ' 添加成功');
			} else {
				return back()->withErrors('评价标准添加失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getShow($id) {
		$pjbz = Pjbz::find($id);

		return view('pjbz/show', ['title' => '评价标准详细信息', 'pjbz' => $pjbz]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit($id) {
		$pjbz  = Pjbz::find($id);
		$pjzbs = Pjzb::orderBy('mc', 'asc')->get();

		return view('pjbz/edit', ['title' => '编辑评价标准', 'pjbz' => $pjbz, 'pjzbs' => $pjzbs]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function putUpdate(Request $request, $id) {
		$input = $request->all();

		$rules = [
			'fz' => 'numeric',
			'px' => 'numeric',
		];

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$pjbz          = Pjbz::find($id);
			$pjbz->xh      = $input['xh'];
			$pjbz->mc      = $input['mc'];
			$pjbz->fz      = $input['fz'];
			$pjbz->ms      = nl2br($input['ms']);
			$pjbz->px      = $input['px'];
			$pjbz->pjzb_id = $input['pjzb'];
			$pjbz->zt      = $input['zt'];

			if ($pjbz->save()) {
				return url('pjbz/list')->with('status', '评价标准 ' . $pjbz->mc . ' 修改成功');
			} else {
				return back()->withErrors('修改失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function deleteDelete($id) {
		$pjbz = Pjbz::find($id);

		if (is_null($pjbz)) {
			return back()->withErrors('没有找到评价标准');
		} elseif ($pjbz->delete()) {
			return url('pjbz/list')->with('status', '评价标准删除成功');
		} else {
			return back()->withErrors('评价标准删除失败');
		}
	}

}
