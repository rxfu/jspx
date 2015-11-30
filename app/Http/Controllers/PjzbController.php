<?php namespace App\Http\Controllers;

use App\Models\Pjzb;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PjzbController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {
		$pjzbs = Pjzb::orderBy('px', 'asc')->get();

		return view('pjzb/list', ['title' => '评价指标列表', 'pjzbs' => $pjzbs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getAdd() {
		return view('pjzb/add', ['title' => '添加评价指标']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave(Request $request) {
		$input = $request->all();

		$rules = [
			'mc' => 'required|unique:px_pjzb',
			'px' => 'numeric',
		];

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$pjzb     = new Pjzb;
			$pjzb->xh = $input['xh'];
			$pjzb->mc = $input['mc'];
			$pjzb->ms = nl2br($input['ms']);
			$pjzb->px = $input['px'];

			if ($pjzb->save()) {
				return redirect('pjzb/list')->with('status', '评价指标 ' . $pjzb->mc . ' 添加成功');
			} else {
				return back()->withErrors('评价指标添加失败');
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
		$pjzb = Pjzb::find($id);

		return view('pjzb/show', ['title' => '评价指标详细信息', 'pjzb' => $pjzb]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit($id) {
		$pjzb = Pjzb::find($id);

		return view('pjzb/edit', ['title' => '编辑评价指标', 'pjzb' => $pjzb]);
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
			'px' => 'numeric',
		];

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$pjzb     = Pjzb::find($id);
			$pjzb->xh = $input['xh'];
			$pjzb->mc = $input['mc'];
			$pjzb->ms = nl2br($input['ms']);
			$pjzb->px = $input['px'];

			if ($pjzb->save()) {
				return redirect('pjzb/list')->with('status', '评价指标 ' . $pjzb->mc . ' 修改成功');
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
		$pjzb = Pjzb::find($id);

		if (is_null($pjzb)) {
			return back()->withErrors('没有找到评价指标');
		} elseif ($pjzb->delete()) {
			return redirect('pjzb/list')->with('status', '评价指标删除成功');
		} else {
			return back()->withErrors('评价指标删除失败');
		}
	}

}
