<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'px_group';

	public $timestamps = false;

	public function users() {
		return $this->belongsToMany('App\Models\User', 'px_user_group');
	}

	public function permissions() {
		return $this->belongsToMany('App\Models\Permission', 'px_group_permission');
	}

}
