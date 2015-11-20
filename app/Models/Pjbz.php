<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pjbz extends Model {

	protected $table = 'pjbz';

	public function pjzb() {
		return $this->belongsTo('Pjzb');
	}

	public function pfjgs() {
		return $this->hasMany('Pfjg');
	}

}
