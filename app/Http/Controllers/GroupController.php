<?php

class GroupController extends AdminController {

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '组列表';
		$groups = Group::orderBy( 'id', 'asc' )->get();

		return View::make( 'group.list', array( 'title' => $title, 'groups' => $groups ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '添加新组';

		return View::make( 'group.new', array( 'title' => $title ) );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'name' => 'required|unique:groups',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$group = new Group;
			$group->name = Input::get( 'name' );
			$group->description = nl2br( Input::get( 'description' ) );

			if ( $group->save() ) {
				return Redirect::route( 'group.list' )->with( 'flash_success', '组 ' . $group->name . ' 添加成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '组添加失败' );
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

		$title = '组详细信息';
		$group = Group::find( $id );

		return View::make( 'group.show', array( 'title' => $title, 'group' => $group ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑组';
		$group = Group::find( $id );

		return View::make( 'group.edit', array( 'title' => $title, 'group' => $group )  );
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
			'description' => 'alpha_dash',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$group = Group::find( $id );
			$group->description = nl2br( Input::get( 'description' ) );

			if ( $group->save() ) {
				return Redirect::route( 'group.list' )->with( 'flash_success', '组 ' . $group->name . ' 修改成功' );
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

		$group = Group::find( $id );

		if ( is_null( $group ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到组' );
		} elseif ( $group->delete() ) {
			return Redirect::route( 'group.list' )->with( 'flash_success', '组删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '组删除失败' );
		}
	}

	public function getGrant( $id ) {

		$group = Group::find( $id );
		$title = '组 ' . $group->name . ' 权限设置';

		$permissions = array();
		$datas = Permission::all();
		foreach ( $datas as $data ) {

			$module = explode( '.', $data->identify );
			$permissions[$module[0]][$module[1]] = $data;
		}

		return View::make( 'group.grant', array( 'title' => $title, 'group' => $group, 'permissions' => $permissions ) );
	}

	public function postGrant( $id ) {

		$group = Group::find( $id );

		$group->permissions()->sync( Input::get( 'permissions' ) );

		return Redirect::back()->with( 'flash_success', '组 ' . $group->name . ' 权限修改成功' );
	}

}
