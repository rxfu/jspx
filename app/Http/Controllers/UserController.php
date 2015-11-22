<?php

class UserController extends AdminController {

	public function __construct() {

		$this->beforeFilter( 'auth', array( 'except' => array( 'getLogin', 'postLogin' ) ) );
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function getList() {

		$title = '用户列表';
		$users = User::with( 'Department' )->orderBy( 'id', 'asc' )->get();

		return View::make( 'user.list', array( 'title' => $title, 'users' => $users ) );
	}


	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function getNew() {

		$title = '注册新用户';
		$departments = Department::orderBy( 'name', 'asc' )->lists( 'name', 'id' );
		$groups = Group::orderBy( 'id', 'asc' )->lists( 'name', 'id' );

		return View::make( 'user.new', array( 'title' => $title, 'departments' => $departments, 'groups' => $groups ) );
	}


	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function postSave() {

		$data = Input::all();

		$rules = array(
			'username' => 'required|unique:users',
			'email' => 'email',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$user = new User;
			$user->username = Input::get( 'username' );
			$user->email = Input::get( 'email' );
			$user->password = Hash::make( DEFAULT_PASSWORD );
			// $user->realname = Input::get( 'realname' );
			$user->department_id = Input::get( 'department' );
			$user->activated = Input::get( 'activated' );

			if ( $user->save() ) {

				$user->groups()->sync( array( Input::get( 'group' ) ) );

				return Redirect::route( 'user.list' )->with( 'flash_success', '用户 ' . $user->username . ' 注册成功' );
			} else {
				return Redirect::back()->withInput()->with( 'flash_error', '用户注册失败' );
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

		$title = '用户详细信息';
		$user = User::find( $id );

		return View::make( 'user.show', array( 'title' => $title, 'user' => $user ) );
	}


	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit( $id ) {

		$title = '编辑用户';
		$user = User::find( $id );
		$departments = Department::orderBy( 'id', 'asc' )->lists( 'name', 'id' );
		$groups = Group::orderBy( 'id', 'asc' )->lists( 'name', 'id' );

		return View::make( 'user.edit', array( 'title' => $title, 'user' => $user, 'departments' => $departments, 'groups' => $groups )  );
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
			'email' => 'email',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$user = User::find( $id );
			$user->email = Input::get( 'email' );
			// $user->realname = Input::get( 'realname' );
			$user->department_id = Input::get( 'department' );
			$user->activated = Input::get( 'activated' );

			if ( $user->save() ) {

				$user->groups()->sync( array( Input::get( 'group' ) ) );

				return Redirect::route( 'user.list' )->with( 'flash_success', '用户 ' . $user->username . ' 修改成功' );
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

		$user = User::find( $id );

		if ( is_null( $user ) ) {
			return Redirect::back()->with( 'flash_error', '没有找到用户' );
		} elseif ( $user->delete() ) {
			return Redirect::route( 'user.list' )->with( 'flash_success', '用户删除成功' );
		} else {
			return Redirect::back()->with( 'flash_error', '用户删除失败' );
		}
	}

	public function getLogin() {

		return View::make( 'login' )->with( 'title', '登录系统' );
	}

	public function postLogin() {

		$credentials = array(
			'username' => Input::get( 'username' ),
			'password' => Input::get( 'password' ),
			'activated' => 1,
		);
		$rules = array(
			'username' => 'required',
			'password' => 'required',
		);

		$validator = Validator::make( $credentials, $rules );

		if ( $validator->passes() ) {
			if ( Auth::attempt( $credentials ) ) {

				$user = User::find( Auth::user()->id );
				$user->login_at = date( 'Y-m-d H:i:s' );
				$user->save();

				return Redirect::to( '/' )->with( 'flash_notice', '欢迎' . $credentials['username'] . '登录系统' );
			}
			return Redirect::back()->withInput()->with( 'flash_error', '用户名或密码无效！' );
		} else {
			return Redirect::back()->withErrors( $validator )->withInput();
		}
	}

	public function getLogout() {

		Auth::logout();
		return Redirect::to( '/' )->with( 'flash_notice', '你已登出系统' );
	}

	public function getChangePassword() {

		$title = '修改密码';

		return View::make( 'user.change_password', array( 'title' => $title ) );
	}

	public function getResetPassword( $id ) {

		$title = '重置密码';
		$user = User::find( $id );

		return View::make( 'user.reset_password', array( 'title' => $title, 'user' => $user ) );
	}

	public function postChangePassword() {

		$data = Input::all();

		if ( ! Hash::check( $data['password_old'], Auth::user()->password ) )
			return Redirect::back()->withInput->with( 'flash_error', '原始密码错误' );

		$rules = array(
			'password' => 'alpha_dash|confirmed',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$user = Auth::user();
			$user->password = Hash::make( Input::get( 'password' ) );
			if ( $user->save() ) {

				return Redirect::back()
				->with( 'flash_success', '密码修改成功' );
			} else {
				return Redirect::back()
				->withInput()
				->with( 'flash_error', '密码修改失败。' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
	}

	public function postResetPassword( $id ) {
		/*
		$data = Input::all();

		$rules = array(
			'password' => 'alpha_dash|confirmed',
		);

		$validator = Validator::make( $data, $rules );
		if ( $validator->passes() ) {

			$user = User::find( $id );
			$user->password = Hash::make( Input::get( 'password' ) );
			if ( $user->save() ) {

				return Redirect::back()
				->with( 'flash_success', '密码重置成功' );
			} else {
				return Redirect::back()
				->withInput()
				->with( 'flash_error', '密码重置失败。' );
			}
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', $validator->messages() );
		}
		*/
		$user = User::find( $id );
		$user->password = Hash::make( DEFAULT_PASSWORD );
		if ( $user->save() ) {
			return Redirect::back()->with( 'flash_success', '密码重置成功' );
		} else {
			return Redirect::back()->withInput()->with( 'flash_error', '密码重置失败。' );
		}
	}

	public function getDeny() {

		return View::make( 'user.denied' );
	}

	public function getProfile() {

		$title = '用户详细信息';
		$user = User::find( Auth::user()->id );

		return View::make( 'user.profile', array( 'title' => $title, 'user' => $user ) );
	}

}
