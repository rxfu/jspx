<?php namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Group;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
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
				$user->groups()->sync([$input['group']]);

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
		$user        = User::find($id);
		$departments = Department::orderBy('mc', 'asc')->get();
		$groups      = Group::orderBy('id', 'asc')->get();

		return view('user.edit', ['title' => '编辑用户', 'user' => $user, 'departments' => $departments, 'groups' => $groups]);
	}

	public function putUpdate(Request $request, $id) {
		$input = $request->all();

		$rules = array(
			'email' => 'email',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$user                = User::find($id);
			$user->email         = $input['email'];
			$user->department_id = $input['department'];
			$user->activated     = $input['activated'];

			if ($user->save()) {
				$user->groups()->sync([$input['group']]);

				return redirect('user/list')->with('status', '用户 ' . $user->username . ' 修改成功');
			} else {
				return back()->withErrors('修改失败');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function deleteDelete($id) {
		$user = User::find($id);

		if (is_null($user)) {
			return back()->withErrors('没有找到用户');
		} elseif ($user->delete()) {
			return redirect('user/list')->with('status', '用户删除成功');
		} else {
			return back()->withErrors('用户删除失败');
		}
	}

	public function getResetPassword($id) {
		$user = User::find($id);

		return View::make('user.reset_password', ['title' => '重置密码', 'user' => $user]);
	}

	public function getChangePassword() {
		return view('user.change_password', ['title' => '修改密码']);
	}

	public function putChangePassword(Request $request) {
		$input = $request->all();
		$user  = Auth::user();

		if (!Hash::check($input['password_old'], $user->password)) {
			return back()->withErrors('原始密码错误');
		}

		$rules = array(
			'password' => 'alpha_dash|confirmed',
		);

		$validator = Validator::make($input, $rules);
		if ($validator->passes()) {
			$user->password = Hash::make($input['password']);
			if ($user->save()) {
				return back()->with('status', '密码修改成功');
			} else {
				return back()->withErrors('密码修改失败。');
			}
		} else {
			return back()->withErrors($validator);
		}
	}

	public function putResetPassword($id) {
		$user           = User::find($id);
		$user->password = Hash::make('5823396');
		if ($user->save()) {
			return back()->with('status', '密码重置成功');
		} else {
			return back()->withErrors('密码重置失败。');
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
