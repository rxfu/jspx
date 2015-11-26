<?php namespace App\Http\Controllers;

use App\Models\Group;
use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class GroupController extends Controller {

	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {
		$groups = Group::orderBy('id', 'asc')->get();

		return view('group.list', ['title' => '组列表', 'groups' => $groups]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getAdd() {
		$title = '添加新组';

		return view('group.add', ['title' => '添加新组']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave(Request $request) {
		$input = $request->all();

		$rules = array(
			'name' => 'required|unique:px_group',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$group              = new Group;
			$group->name        = $input['name'];
			$group->description = nl2br($input['description']);

			if ($group->save()) {
				return redirect('group/list')->with('status', '组 ' . $group->name . ' 添加成功');
			} else {
				return back()->withErrors('组添加失败');
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
		$group = Group::find($id);

		return view('group.show', ['title' => '组详细信息', 'group' => $group]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit($id) {
		$group = Group::find($id);

		return view('group.edit', ['title' => '编辑组', 'group' => $group]);
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
			'description' => 'alpha_dash',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$group              = Group::find($id);
			$group->description = nl2br($input['description']);

			if ($group->save()) {
				return redirect('group/list')->with('status', '组 ' . $group->name . ' 修改成功');
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
		$group = Group::find($id);

		if (is_null($group)) {
			return back()->withErrors('没有找到组');
		} elseif ($group->delete()) {
			return redirect('group/list')->with('status', '组删除成功');
		} else {
			return back()->withErrors('组删除失败');
		}
	}

	public function getGrant($id) {
		$group = Group::find($id);

		$permissions = array();
		$datas       = Permission::all();
		foreach ($datas as $data) {
			$module                              = explode('.', $data->id);
			$permissions[$module[0]][$module[1]] = $data;
		}

		return view('group.grant', ['title' => '组 ' . $group->name . ' 权限设置', 'group' => $group, 'permissions' => $permissions]);
	}

	public function putGrant(Request $request, $id) {
		$group = Group::find($id);
		$group->permissions()->sync($request->input('permissions'));

		return back()->with('status', '组 ' . $group->name . ' 权限修改成功');
	}

}
