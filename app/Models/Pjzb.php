<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pjzb extends Model {

	protected $table = 'px_pjzb';

	public function pjbzs() {
		return $this->hasMany('App\Models\Pjbz');
	}
}
