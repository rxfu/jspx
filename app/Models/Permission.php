<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	protected $table = 'px_permission';

	public $timestamps = false;

	public function groups() {
		return $this->belongsToMany('App\Models\Group', 'px_group_permission');
	}

}
