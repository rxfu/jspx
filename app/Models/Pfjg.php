<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Pfjg extends Model {

	protected $table = 'px_pfjg';

	public function pjbz() {
		return $this->belongsTo('App\Models\Pjbz', 'pjbz_id');
	}

	public function pfdj() {
		return $this->belongsTo('App\Models\Pfdj', 'pfdj_id');
	}

}
