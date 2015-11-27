<?php namespace App\Http\Controllers;

use App\Models\Pfdj;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PfdjController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {
		$pfdjs = Pfdj::orderBy('zdfz', 'asc')->get();

		return view('pfdj.list', ['title' => '评分等级列表', 'pfdjs' => $pfdjs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getAdd() {
		return view('pfdj.add', ['title' => '添加评分等级']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave(Request $request) {
		$input = $request->all();

		$rules = array(
			'mc'   => 'required|unique:px_pfdj',
			'zdfz' => 'numeric',
			'zgfz' => 'numeric',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$pfdj       = new Pfdj;
			$pfdj->mc   = $input['mc'];
			$pfdj->zdfz = $input['zdfz'];
			$pfdj->zgfz = $input['zgfz'];

			if ($pfdj->save()) {
				return redirect('pfdj/list')->with('status', '评分等级 ' . $pfdj->mc . ' 添加成功');
			} else {
				return back()->withErrors('评分等级添加失败');
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
		$pfdj = Pfdj::find($id);

		return view('pfdj.show', ['title' => '评分等级详细信息', 'pfdj' => $pfdj]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit($id) {
		$pfdj = Pfdj::find($id);

		return view('pfdj.edit', ['title' => '编辑评分等级', 'pfdj' => $pfdj]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function putUpdate(Request $request, $id) {
		$input = $request->all();

		$rules = array(
			'zdfz' => 'numeric',
			'zgfz' => 'numeric',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$pfdj       = Pfdj::find($id);
			$pfdj->zdfz = $input['zdfz'];
			$pfdj->zgfz = $input['zgfz'];

			if ($pfdj->save()) {
				return redirect('pfdj/list')->with('status', '评分等级 ' . $pfdj->mc . ' 修改成功');
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
		$pfdj = Pfdj::find($id);

		if (is_null($pfdj)) {
			return back()->withErrors('没有找到评分等级');
		} elseif ($pfdj->delete()) {
			return redirect('pfdj/list')->with('status', '评分等级删除成功');
		} else {
			return back()->withErrors('评分等级删除失败');
		}
	}

}
