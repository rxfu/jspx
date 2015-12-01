<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pfdj extends Model {

	protected $table = 'px_pfdj';

	public $timestamps = false;

	public function pfjgs() {
		return $this->hasMany('App\Models\Pfjg');
	}

}
