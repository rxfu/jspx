<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

	protected $table = 'xt_department';

	public $timestamps = false;

	public function users() {
		return $this->belongsToMany('App\Models\User', 'px_user');
	}

}
