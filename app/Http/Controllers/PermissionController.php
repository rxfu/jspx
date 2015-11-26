<?php namespace App\Http\Controllers;

use App\Models\Permission;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class PermissionController extends Controller {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {
		$permissions = Permission::orderBy('name', 'asc')->get();

		return view('permission.list', ['title' => '权限列表', 'permissions' => $permissions]);
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getAdd() {
		return view('permission.add', ['title' => '添加新权限']);
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave(Request $request) {
		$input = $request->all();

		$rules = array(
			'id'   => 'required|unique:px_permission',
			'name' => 'required',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$permission              = new Permission;
			$permission->id          = $input['id'];
			$permission->name        = $input['name'];
			$permission->description = nl2br($input['description']);

			if ($permission->save()) {
				return redirect('permission/list')->with('status', '权限 ' . $permission->name . ' 添加成功');
			} else {
				return back()->withErrors('权限添加失败');
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
		$permission = Permission::find($id);

		return view('permission.show', ['title' => '权限详细信息', 'permission' => $permission]);
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit($id) {
		$permission = Permission::find($id);

		return view('permission.edit', ['title' => '编辑权限', 'permission' => $permission]);
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
			'name'        => 'required',
			'description' => 'alpha_dash',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$permission              = Permission::find($id);
			$permission->name        = $input['name'];
			$permission->description = nl2br($input['description']);

			if ($permission->save()) {
				return redirect('permission/list')->with('status', '权限 ' . $permission->name . ' 修改成功');
			} else {
				return back()->withErrors('flash_error', '修改失败');
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
		$permission = Permission::find($id);

		if (is_null($permission)) {
			return back()->withErrors('没有找到权限');
		} elseif ($permission->delete()) {
			return redirect('permission/list')->with('status', '权限删除成功');
		} else {
			return back()->withErrors('权限删除失败');
		}
	}

}
