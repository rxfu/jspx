<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pjbz extends Model {

	protected $table = 'px_pjbz';

	public function pjzb() {
		return $this->belongsTo('App\Models\Pjzb');
	}

	public function pfjgs() {
		return $this->hasMany('App\Models\Pfjg');
	}

}
