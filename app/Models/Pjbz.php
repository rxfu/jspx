<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pjbz extends Model {

	protected $table = 'pjbz';

	public function pjzb() {
		return $this->belongsTo('Pjzb');
	}

}
