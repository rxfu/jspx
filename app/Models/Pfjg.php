<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pfjg extends Model {

	protected $table = 'pfjg';

	public function pjbz() {
		return $this->belongsTo('Pjbz');
	}

}
