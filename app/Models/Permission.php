<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Permission extends Model {

	protected $table = 'permission';

	public $timestamps = false;

	public function getKey() {
		return $this->attributes['identify'];
	}

	public function groups() {
		return $this->belongsToMay('App\Models\Group', 'group_permission');
	}

}
