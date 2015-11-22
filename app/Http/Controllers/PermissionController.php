<?php

class PermissionController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '权限列表';
		$permissions = Permission::orderBy( 'name', 'asc' )->get();

		return View::make( 'permission.list', array( 'title' => $title, 'permissions' => $permissions ) );
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '添加新权限';

		return View::make( 'permission.new', array( 'title' => $title ) );
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'identify' => 'required|unique:permissions',
			'name' => 'required',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$permission = new Permission;
			$permission->identify = Input::get( 'identify' );
			$permission->name = Input::get( 'name' );
			$permission->description = nl2br( Input::get( 'description' ) );

			if ( $permission->save() ) {
				return Redirect::route( 'permission.list' )->with( 'flash_success', '权限 ' . $permission->name . ' 添加成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '权限添加失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

	/**
	 * Display the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getShow( $id ) {

		$title = '权限详细信息';
		$permission = Permission::find( $id );

		return View::make( 'permission.show', array( 'title' => $title, 'permission' => $permission ) );
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑权限';
		$permission = Permission::find( $id );

		return View::make( 'permission.edit', array( 'title' => $title, 'permission' => $permission )  );
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postUpdate( $id ) {

		$data = Input::all();

		$rules = array(
			'name' => 'required',
			'description' => 'alpha_dash',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$permission = Permission::find( $id );
			$permission->name = Input::get( 'name' );
			$permission->description = nl2br( Input::get( 'description' ) );

			if ( $permission->save() ) {
				return Redirect::route( 'permission.list' )->with( 'flash_success', '权限 ' . $permission->name . ' 修改成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '修改失败' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function postDestroy( $id ) {

		$permission = Permission::find( $id );

		if ( is_null( $permission ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到权限' );
		} elseif ( $permission->delete() ) {
			return Redirect::route( 'permission.list' )->with( 'flash_success', '权限删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '权限删除失败' );
		}
	}

}
