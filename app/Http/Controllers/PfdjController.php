<?php namespace App\Http\Controllers;

use App\Models\Pfdj;

class PfdjController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {
		$pfdjs = Pfdj::orderBy('zdfz', 'asc')->get();

		return view('Pfdj.list', ['title' => '评分等级列表', 'pfdjs' => $pfdjs]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getAdd() {
		return view('Pfdj.add', ['title' => '添加评分等级']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave(Request $request) {

		$data = Input::all();

		$rules = array(
			'name'  => 'required|unique:categories',
			'order' => 'numeric',
		);

		$validator = Validator::make($data, $rules);
		if ($validator->passes()) {

			$Pfdj              = new Pfdj;
			$Pfdj->seq         = Input::get('seq');
			$Pfdj->name        = Input::get('name');
			$Pfdj->description = nl2br(Input::get('description'));
			$Pfdj->order       = Input::get('order');

			if ($Pfdj->save()) {
				return Redirect::route('Pfdj.list')->with('flash_success', '一级指标 ' . $Pfdj->name . ' 添加成功');
			} else {
				return Redirect::back()->withInput()->with('flash_error', '一级指标添加失败');
			}
		} else {
			return Redirect::back()->withInput()->with('flash_error', $validator->messages());
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getShow($id) {

		$title = '一级指标详细信息';
		$Pfdj  = Pfdj::find($id);

		return View::make('Pfdj.show', array('title' => $title, 'Pfdj' => $Pfdj));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit($id) {

		$title = '编辑一级指标';
		$Pfdj  = Pfdj::find($id);

		return View::make('Pfdj.edit', array('title' => $title, 'Pfdj' => $Pfdj));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postUpdate($id) {

		$data = Input::all();

		$rules = array(
			'order' => 'numeric',
		);

		$validator = Validator::make($data, $rules);
		if ($validator->passes()) {

			$Pfdj              = Pfdj::find($id);
			$Pfdj->seq         = Input::get('seq');
			$Pfdj->name        = Input::get('name');
			$Pfdj->description = nl2br(Input::get('description'));
			$Pfdj->order       = Input::get('order');

			if ($Pfdj->save()) {
				return Redirect::route('Pfdj.list')->with('flash_success', '一级指标 ' . $Pfdj->name . ' 修改成功');
			} else {
				return Redirect::back()->withInput()->with('flash_error', '修改失败');
			}
		} else {
			return Redirect::back()->withInput()->with('flash_error', $validator->messages());
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postDestroy($id) {

		$Pfdj = Pfdj::find($id);

		if (is_null($Pfdj)) {
			return Redirect::back()->with('flash_error', '没有找到一级指标');
		} elseif ($Pfdj->delete()) {
			return Redirect::route('Pfdj.list')->with('flash_success', '一级指标删除成功');
		} else {
			return Redirect::back()->with('flash_error', '一级指标删除失败');
		}
	}

}
