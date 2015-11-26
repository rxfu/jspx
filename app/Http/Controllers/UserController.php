<?php namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;
use App\Models\User;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller {

	public function __construct() {

		$this->middleware('auth');
	}

	public function getList() {
		$users = User::with('Department')->orderBy('id', 'asc')->get();

		return view('user.list', ['title' => '用户列表', 'users' => $users]);
	}

	public function getAdd() {
		$departments = Department::orderBy('mc', 'asc')->get();
		$groups      = Group::orderBy('id', 'asc')->get();

		return view('user.add', array('title' => '注册新用户', 'departments' => $departments, 'groups' => $groups));
	}

	public function postSave(Request $request) {
		$input = $request->all();

		$rules = array(
			'username' => 'required|unique:px_user',
			'email'    => 'email',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$user                = new User;
			$user->username      = $input['username'];
			$user->email         = $input['email'];
			$user->password      = Hash::make('5823396');
			$user->department_id = $input['department'];
			$user->activated     = $input['activated'];

			if ($user->save()) {
				$user->groups()->sync($input['group']);

				return redirect('user/list')->with('status', '用户 ' . $user->username . ' 注册成功');
			} else {
				return back()->withErrors('用户注册失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function getShow($id) {
		$user = User::find($id);

		return view('user.show', ['title' => '用户详细信息', 'user' => $user]);
	}

	public function getEdit($id) {

		$title       = '编辑用户';
		$user        = User::find($id);
		$departments = Department::orderBy('id', 'asc')->lists('name', 'id');
		$groups      = Group::orderBy('id', 'asc')->lists('name', 'id');

		return View::make('user.edit', array('title' => $title, 'user' => $user, 'departments' => $departments, 'groups' => $groups));
	}

	public function postUpdate($id) {

		$data = Input::all();

		$rules = array(
			'email' => 'email',
		);

		$validator = Validator::make($data, $rules);
		if ($validator->passes()) {

			$user        = User::find($id);
			$user->email = $request->input('email');
			// $user->realname = $request->input( 'realname' );
			$user->department_id = $request->input('department');
			$user->activated     = $request->input('activated');

			if ($user->save()) {

				$user->groups()->sync(array($request->input('group')));

				return Redirect::route('user.list')->with('flash_success', '用户 ' . $user->username . ' 修改成功');
			} else {
				return Redirect::back()->withInput()->with('flash_error', '修改失败');
			}
		} else {
			return Redirect::back()->withInput()->with('flash_error', $validator->messages());
		}
	}

	public function postDestroy($id) {

		$user = User::find($id);

		if (is_null($user)) {
			return Redirect::back()->with('flash_error', '没有找到用户');
		} elseif ($user->delete()) {
			return Redirect::route('user.list')->with('flash_success', '用户删除成功');
		} else {
			return Redirect::back()->with('flash_error', '用户删除失败');
		}
	}

	public function getChangePassword() {

		$title = '修改密码';

		return View::make('user.change_password', array('title' => $title));
	}

	public function getResetPassword($id) {

		$title = '重置密码';
		$user  = User::find($id);

		return View::make('user.reset_password', array('title' => $title, 'user' => $user));
	}

	public function postChangePassword() {

		$data = Input::all();

		if (!Hash::check($data['password_old'], Auth::user()->password)) {
			return Redirect::back()->withInput->with('flash_error', '原始密码错误');
		}

		$rules = array(
			'password' => 'alpha_dash|confirmed',
		);

		$validator = Validator::make($data, $rules);
		if ($validator->passes()) {

			$user           = Auth::user();
			$user->password = Hash::make($request->input('password'));
			if ($user->save()) {

				return Redirect::back()
					->with('flash_success', '密码修改成功');
			} else {
				return Redirect::back()
					->withInput()
					->with('flash_error', '密码修改失败。');
			}
		} else {
			return Redirect::back()->withInput()->with('flash_error', $validator->messages());
		}
	}

	public function postResetPassword($id) {
		/*
			$data = Input::all();

			$rules = array(
				'password' => 'alpha_dash|confirmed',
			);

			$validator = Validator::make( $data, $rules );
			if ( $validator->passes() ) {

				$user = User::find( $id );
				$user->password = Hash::make( $request->input( 'password' ) );
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
		$user           = User::find($id);
		$user->password = Hash::make(DEFAULT_PASSWORD);
		if ($user->save()) {
			return Redirect::back()->with('flash_success', '密码重置成功');
		} else {
			return Redirect::back()->withInput()->with('flash_error', '密码重置失败。');
		}
	}

	public function getDeny() {

		return View::make('user.denied');
	}

	public function getProfile() {
		$user = Auth::user();
		return view('user.profile', ['title' => '用户详细信息', 'user' => $user]);
	}

}
