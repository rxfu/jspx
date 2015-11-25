<?php

use App\Models\User;

class ModelTest extends TestCase {

	public function testDepartment() {
		$user = User::find(1);
		dd($user->department->mc);
	}
}