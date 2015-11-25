<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

	protected $table = 'xt_department';

	public $timestamps = false;

	public function users() {
		return $this->hasMany('App\Models\User', 'department_id', 'dw');
	}

}
