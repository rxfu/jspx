<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Group extends Model {

	protected $table = 'group';

	public $timestamps = false;

	public function users() {
		return $this->belongsToMany('App\Models\User', 'user_group');
	}

	public function permissions() {
		return $this->belongsToMany('App\Models\Permission', 'group_permission');
	}

}
