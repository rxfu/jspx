<?php namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends AdminController {

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function getEdit() {
		$setting = Setting::find(1);

		return view('setting.edit', ['title' => '系统设置', 'setting' => $setting]);
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param int     $id
	 * @return Response
	 */
	public function putUpdate(Request $request, $id) {
		$input = $request->all();

		$setting          = Setting::find($id);
		$setting->is_open = $input['is_open'];

		if ($setting->save()) {
			return redirect('setting/edit')->with('status', '系统设置成功');
		} else {
			return back()->withErrors('系统设置失败');
		}
	}

}